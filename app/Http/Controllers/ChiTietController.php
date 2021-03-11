<?php

namespace App\Http\Controllers;

use App\ChiTiet;
use App\SanPham;
use Illuminate\Http\Request;

class ChiTietController extends Controller
{
    public function getDanhsach(){
        $chitiet = ChiTiet::all();
        return view('admin.chitiet.danhsach',compact('chitiet'));
    }

    public function getThem(){
        $sanpham = SanPham::all();

        return view('admin.chitiet.them',compact('sanpham'));
    }

    public function postThem(Request $request){
        $this->validate($request,
            [
                'SanPham'=>'required|unique:chitiet,idSanPham',
                'CPU'=>'required',
                'RAM'=>'required',
                'OCung'=>'required',
                'ManHinh'=>'required',
                'ThietKe'=>'required',
                'KichThuoc'=>'required',
                'NamRaMat'=>'required'
            ],
            [
                'CPU.required' =>'Bạn chưa điền thông tin về CPU',
                'RAM.required' =>'Bạn chưa điền thông tin về RAM',
                'OCung.required' =>'Bạn chưa điền thông tin về ổ cứng',
                'ManHinh.required' =>'Bạn chưa điền thông tin về màn hình',
                'ThietKe.required' =>'Bạn chưa điền thông tin về thiết kế',
                'KichThuoc.required' =>'Bạn chưa điền thông tin về kích thước',
                'NamRaMat.required' =>'Bạn chưa điền thông tin về năm ra mắt',
                'SanPham.unique'=>'Chi tiết của sản phẩm đã tồn tại'
            ]);

        $chitiet= new ChiTiet();
        $chitiet->idSanPham = $request->SanPham;
        $chitiet->CPU = $request->CPU;
        $chitiet->RAM = $request->RAM;
        $chitiet->OCung = $request->OCung;
        $chitiet->ManHinh = $request->ManHinh;
        $chitiet->ThietKe = $request->ThietKe;
        $chitiet->KichThuoc = $request->KichThuoc;
        $chitiet->NamRaMat = $request->NamRaMat;
        if($request->hasFile('Hinh1'))
        {
            $file = $request->file('Hinh1');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png')
            {
                return redirect('admin/chitiet/them')->with('loi','Bạn chỉ được chọn file có đuôi png,jpg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = random_int(1,1000)."_".$name;
            while (file_exists('upload/chitiet/'.$Hinh))
            {
                $Hinh = random_int(1,1000)."_".$name;
            }
            $file->move('upload/chitiet',$Hinh);
            $chitiet->Hinh1 = $Hinh;
        }
        else
        {
            $chitiet->Hinh1 = "";
        }

        if($request->hasFile('Hinh2'))
        {
            $file = $request->file('Hinh2');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png')
            {
                return redirect('admin/chitiet/them')->with('loi','Bạn chỉ được chọn file có đuôi png,jpg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = random_int(1,1000)."_".$name;
            while (file_exists('upload/chitiet/'.$Hinh))
            {
                $Hinh = random_int(1,1000)."_".$name;
            }
            $file->move('upload/chitiet',$Hinh);
            $chitiet->Hinh2 = $Hinh;
        }
        else
        {
            $chitiet->Hinh2 = "";
        }

        if($request->hasFile('Hinh3'))
        {
            $file = $request->file('Hinh3');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png')
            {
                return redirect('admin/chitiet/them')->with('loi','Bạn chỉ được chọn file có đuôi png,jpg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = random_int(1,1000)."_".$name;
            while (file_exists('upload/chitiet/'.$Hinh))
            {
                $Hinh = random_int(1,1000)."_".$name;
            }
            $file->move('upload/chitiet',$Hinh);
            $chitiet->Hinh3 = $Hinh;
        }
        else
        {
            $chitiet->Hinh3 = "";
        }

        if($request->hasFile('Hinh4'))
        {
            $file = $request->file('Hinh4');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png')
            {
                return redirect('admin/chitiet/them')->with('loi','Bạn chỉ được chọn file có đuôi png,jpg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = random_int(1,1000)."_".$name;
            while (file_exists('upload/chitiet/'.$Hinh))
            {
                $Hinh = random_int(1,1000)."_".$name;
            }
            $file->move('upload/chitiet',$Hinh);
            $chitiet->Hinh4 = $Hinh;
        }
        else
        {
            $chitiet->Hinh4 = "";
        }


        $chitiet->save();
        return redirect('admin/chitiet/them')->with('thongbao','Bạn thêm chi tiết sản phẩm thành công');
    }

    public function getSua($id){
        $chitiet = ChiTiet::find($id);
        $sanpham = SanPham::all();
        return view('admin.chitiet.sua',compact('chitiet','sanpham'));
    }

    public function postSua(Request $request, $id){
        $chitiet = ChiTiet::find($id);
        $this->validate($request,
            [
                'CPU'=>'required',
                'RAM'=>'required',
                'OCung'=>'required',
                'ManHinh'=>'required',
                'ThietKe'=>'required',
                'KichThuoc'=>'required',
                'NamRaMat'=>'required'
            ],
            [
                'CPU.required' =>'Bạn chưa điền thông tin về CPU',
                'RAM.required' =>'Bạn chưa điền thông tin về RAM',
                'OCung.required' =>'Bạn chưa điền thông tin về ổ cứng',
                'ManHinh.required' =>'Bạn chưa điền thông tin về màn hình',
                'ThietKe.required' =>'Bạn chưa điền thông tin về thiết kế',
                'KichThuoc.required' =>'Bạn chưa điền thông tin về kích thước',
                'NamRaMat.required' =>'Bạn chưa điền thông tin về năm ra mắt'

            ]);

        $chitiet->idSanPham = $request->SanPham;
        $chitiet->CPU = $request->CPU;
        $chitiet->RAM = $request->RAM;
        $chitiet->OCung = $request->OCung;
        $chitiet->ManHinh = $request->ManHinh;
        $chitiet->ThietKe = $request->ThietKe;
        $chitiet->KichThuoc = $request->KichThuoc;
        $chitiet->NamRaMat = $request->NamRaMat;
        if($request->hasFile('Hinh1'))
        {
            $file = $request->file('Hinh1');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png')
            {
                return redirect('admin/chitiet/sua/'.$id)->with('loi','Bạn chỉ được chọn file có đuôi png,jpg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = random_int(1,1000)."_".$name;
            while (file_exists('upload/chitiet/'.$Hinh))
            {
                $Hinh = random_int(1,1000)."_".$name;
            }
            $file->move('upload/chitiet',$Hinh);
            if($chitiet->Hinh1 != "")
            unlink("upload/chitiet/".$chitiet->Hinh1);
            $chitiet->Hinh1 = $Hinh;
        }

        if($request->hasFile('Hinh2'))
        {
            $file = $request->file('Hinh2');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png')
            {
                return redirect('admin/chitiet/sua/'.$id)->with('loi','Bạn chỉ được chọn file có đuôi png,jpg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = random_int(1,1000)."_".$name;
            while (file_exists('upload/chitiet/'.$Hinh))
            {
                $Hinh = random_int(1,1000)."_".$name;
            }
            $file->move('upload/chitiet',$Hinh);
            if($chitiet->Hinh2 != "")
            unlink("upload/chitiet/".$chitiet->Hinh2);
            $chitiet->Hinh2 = $Hinh;
        }

        if($request->hasFile('Hinh3'))
        {
            $file = $request->file('Hinh3');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png')
            {
                return redirect('admin/chitiet/sua/'.$id)->with('loi','Bạn chỉ được chọn file có đuôi png,jpg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = random_int(1,1000)."_".$name;
            while (file_exists('upload/chitiet/'.$Hinh))
            {
                $Hinh = random_int(1,1000)."_".$name;
            }
            $file->move('upload/chitiet',$Hinh);
            if($chitiet->Hinh3 != "")
            unlink("upload/chitiet/".$chitiet->Hinh3);
            $chitiet->Hinh3 = $Hinh;
        }

        if($request->hasFile('Hinh4'))
        {
            $file = $request->file('Hinh4');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png')
            {
                return redirect('admin/chitiet/sua/'.$id)->with('loi','Bạn chỉ được chọn file có đuôi png,jpg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = random_int(1,1000)."_".$name;
            while (file_exists('upload/chitiet/'.$Hinh))
            {
                $Hinh = random_int(1,1000)."_".$name;
            }
            $file->move('upload/chitiet',$Hinh);
            if($chitiet->Hinh4 != "")
            unlink("upload/chitiet/".$chitiet->Hinh4);
            $chitiet->Hinh4 = $Hinh;
        }

        $chitiet->save();
        return redirect('admin/chitiet/sua/'.$id)->with('thongbao','Bạn thêm chi tiết sản phẩm thành công');
    }

    public function getXoa($id){
        $chitiet = ChiTiet::find($id);
        $chitiet->delete();
        return redirect('admin/chitiet/danhsach')->with('thongbao','Bạn xóa thành công');
    }
}
