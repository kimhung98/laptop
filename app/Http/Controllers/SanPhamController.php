<?php

namespace App\Http\Controllers;

use App\LoaiSp;
use App\SanPham;
use App\TheLoai;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function getDanhsach()
    {
        $sanpham = SanPham::all();
        return view('admin.sanpham.danhsach',compact('sanpham'));
    }

    public function getThem()
    {
        $theloai = TheLoai::all();
        $loaisp = LoaiSp::all();
        return view('admin.sanpham.them',compact('theloai','loaisp'));
    }

    public  function postThem(Request $request){
        $this->validate($request,
            [
                'LoaiSp'=>'required',
                'TenSp'=>'required|min:3|unique:SanPham,TenSp',
                'GiaTien'=> 'required',
                'SoLuong'=> 'required',
                'MoTa'=>'required'
            ],
            [
                'TenSp.required'=>'Bạn chưa điền tên sản phẩm',
                'TenSp.min'=>'Tên sản phẩm phải có ít nhất 3 ký tự',
                'TenSp.unique'=>'Tên sản phẩm đã tồn tại',
                'GiaTien.required'=>'Bọn chưa nhập giá tiền',
                'SoLuong.required'=>'Bọn chưa nhập số lượng sản phẩm',
                'LoaiSp'=>'Bạn chưa chọn loại sản phẩm',
                'MoTa.required'=>'Bạn chưa nhập mô tả'
            ]);
        $sanpham = new SanPham();
        $sanpham->TenSp = $request->TenSp;
        $sanpham->GiaTien = $request->GiaTien;
        $sanpham->GiamGia = $request->GiamGia;
        $sanpham->MoTa = $request->MoTa;
        $sanpham->SoLuong = $request->SoLuong;
        $sanpham->NoiBat = $request->NoiBat;
        $sanpham->idLoaiSp = $request->LoaiSp;

        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png')
            {
                return redirect('admin/sanpham/them')->with('loi','Bạn chỉ được chọn file có đuôi png,jpg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = random_int(1,1000)."_".$name;
            while (file_exists('upload/sanpham/'.$Hinh))
            {
                $Hinh = random_int(1,1000)."_".$name;
            }
            $file->move('upload/sanpham',$Hinh);
            $sanpham->Hinh = $Hinh;
        }
        else
        {
            $sanpham->Hinh = "";
        }
        $sanpham->save();
        if($request->TheLoai == 02){
            return redirect('admin/sanpham/them')->with('thongbao','Thêm thành công');
        }
        else
        {
            return redirect('admin/chitiet/them')->with('thongbao','Thêm sản phẩm thành công bạn vui lòng nhập thêm chi tiết sản phẩm');
        }


    }

    public  function getSua($id){
        $theloai = TheLoai::all();
        $loaisp = LoaiSp::all();
        $sanpham = SanPham::find($id);

        return view('admin.sanpham.sua',compact('theloai','loaisp','sanpham'));
    }

    public  function postSua(Request $request,$id){
        $sanpham = SanPham::find($id);
        $this->validate($request,
            [
                'LoaiSp'=>'required',
                'TenSp'=>'required',
                'GiaTien'=> 'required',
                'GiamGia'=>'required',
                'SoLuong'=> 'required',
                'MoTa'=>'required'
            ],
            [
                'TenSp.required'=>'Bạn chưa điền tên sản phẩm',
                'GiaTien.required'=>'Bọn chưa điền giá tiền',
                'LoaiSp'=>'Bạn chưa chọn loại sản phẩm',
                'MoTa.required'=>'Bạn chưa điền mô tả',
                'SoLuong.required'=>'Bọn chưa nhập số lượng sản phẩm',
                'GiamGia.required'=>'Bọn chưa điền giảm giá'
            ]);
        $sanpham->TenSp = $request->TenSp;
        $sanpham->GiaTien = $request->GiaTien;
        $sanpham->GiamGia = $request->GiamGia;
        $sanpham->MoTa = $request->MoTa;
        $sanpham->SoLuong = $request->SoLuong;
        $sanpham->NoiBat = $request->NoiBat;
        $sanpham->idLoaiSp = $request->LoaiSp;

        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png')
            {
                return redirect('admin/sanpham/sua/'.$id)->with('loi','Bạn chỉ được chọn file có đuôi png,jpg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = random_int(1,1000)."_".$name;
            while (file_exists('upload/sanpham/'.$Hinh))
            {
                $Hinh = random_int(1,1000)."_".$name;
            }
            $file->move('upload/sanpham',$Hinh);
            if($sanpham->Hinh != "")
            unlink("upload/sanpham/".$sanpham->Hinh);
            $sanpham->Hinh = $Hinh;
        }

        $sanpham->save();
        return redirect('admin/sanpham/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public  function getXoa($id){
        $sanpham = SanPham::find($id);
        $sanpham->delete();
        return redirect('admin/sanpham/danhsach')->with('thongbao',"Bạn đã xóa thành công");
    }
}
