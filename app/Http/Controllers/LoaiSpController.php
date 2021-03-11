<?php

namespace App\Http\Controllers;

use App\LoaiSp;
use App\TheLoai;
use Illuminate\Http\Request;

class LoaiSpController extends Controller
{
    public function getDanhsach()
    {
        $loaisp = LoaiSp::all();
        return view('admin.loaisp.danhsach',compact('loaisp'));
    }

    public function getThem()
    {
        $theloai = TheLoai::all();
        return view('admin.loaisp.them',compact('theloai'));
    }

    public  function postThem(Request $request){
        $this->validate($request,
            [
                'Ten'=>'required|unique:TheLoai,Ten|min:2|max:100',
                'TheLoai'=>'required'
            ],
            [
                'Ten.required'=>'Bạn chưa nhập tên thể loại',
                'Ten.min'=>"Tên thể loại phải có độ dài từ 2 đến 100 ký tự",
                'Ten.max'=>"Tên thể loại phải có độ dài từ 2 đến 100 ký tự",
                'Ten.unique'=>'Tên thể loại đã tồn tại',
                'TheLoai.required'=>'Bạn chưa chọn thể loại'
            ]);
        $loaisp = new LoaiSp();
        $loaisp->Ten = $request->Ten;
        $loaisp->idTheLoai = $request->TheLoai;
        $loaisp->save();

        return redirect('admin/loaisanpham/them')->with('thongbao','Thêm thành công.');

    }

    public  function getSua($id){
        $theloai = TheLoai::all();
        $loaisp = LoaiSp::find($id);
        return view('admin.loaisp.sua',compact('theloai','loaisp'));
    }

    public  function postSua(Request $request,$id){
        $loaisp = LoaiSp::find($id);
        $this->validate($request,
            [
                'Ten'=>'required|unique:Loaisp,Ten|min:2|max:100',
                'TheLoai'=>'required'
            ],
            [
                'Ten.required'=>'Bạn chưa nhập tên thể loại',
                'Ten.min'=>"Tên thể loại phải có độ dài từ 2 đến 100 ký tự",
                'Ten.max'=>"Tên thể loại phải có độ dài từ 2 đến 100 ký tự",
                'Ten.unique'=>'Tên thể loại đã tồn tại',
                'TheLoai.required'=>'Bạn chưa chọn thể loại'
            ]);

        $loaisp->Ten = $request->Ten;
        $loaisp->idTheLoai = $request->TheLoai;
        $loaisp->save();

        return redirect('admin/loaisanpham/sua/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }

    public function getXoa($id)
    {
        $loaisp=LoaiSp::find($id);
        $loaisp->delete();

        return redirect('admin/loaisanpham/danhsach')->with('thongbao','Bạn đã xóa loại tin thành công');
    }
}
