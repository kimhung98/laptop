<?php

namespace App\Http\Controllers;

use App\TheLoai;
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{

    public function getHome()
    {
        return view('admin.homeAdmin');
    }
    public function getDanhsach()
    {
        $theloai = TheLoai::all();
        return view('admin.theloai.danhsach',compact('theloai'));
    }

    public function getThem()
    {
        return view('admin.theloai.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'Ten' => 'required|unique:TheLoai,Ten|min:3|max:100',
            ],
            [
                'Ten.required'=>'Bạn chưa nhập tên thể loại',
                'Ten.min'=>"Tên thể loại phải có độ dài từ 3 đến 100 ký tự",
                'Ten.max'=>"Tên thể loại phải có độ dài từ 3 đến 100 ký tự",
                'Ten.unique'=>'Tên thể loại đã tồn tại',
            ]);

        $theloai = new TheLoai();
        $theloai->Ten = $request->Ten;
        $theloai->save();

        return redirect('admin/theloai/them')->with('thongbao','Thêm thành công.');
    }

    public function getSua($id)
    {
        $theloai = TheLoai::find($id);
        return view('admin.theloai.sua',compact('theloai'));
    }

    public function postSua(Request $request,$id)
    {
        $theloai = TheLoai::find($id);
        $this->validate($request,
            [
                'Ten' => 'required|unique:TheLoai,Ten|min:3|max:100',
            ],
            [
                'Ten.required'=>'Bạn chưa nhập tên thể loại',
                'Ten.min'=>"Tên thể loại phải có độ dài từ 3 đến 100 ký tự",
                'Ten.max'=>"Tên thể loại phải có độ dài từ 3 đến 100 ký tự",
                'Ten.unique'=>'Tên thể loại đã tồn tại',
            ]);
        $theloai->Ten = $request->Ten;
        $theloai->save();
        return redirect('admin/theloai/sua/'.$id)->with('thongbao','Sửa thành công.');
    }

    public function getXoa($id)
    {
        $theloai = TheLoai::find($id);
        $theloai->delete();

        return redirect('admin/theloai/danhsach')->with('thongbao','Xóa thành công.');
    }
}
