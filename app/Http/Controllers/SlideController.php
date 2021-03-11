<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function getDanhsach()
    {
        $slide = Slide::all();
        return view('admin.slide.danhsach',compact('slide'));
    }

    public function getThem()
    {
        return view('admin.slide.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'Ten'=>'required',
                'NoiDung'=>'required'
            ],
            [
                'Ten.required'=>'Bạn chưa nhập tên slide',
                'NoiDung.required'=>'Bạn chưa nhập nội dung slide'
            ]);
        $slide = new Slide();
        $slide->Ten = $request->Ten;
        $slide->NoiDung = $request->NoiDung;
        if($request->has('link'))
            $slide->link = $request->link;
        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png')
            {
                return redirect('admin/slide/them')->with('loi','Bạn chỉ được chọn file có đuôi png,jpg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = random_int(1,1000)."_".$name;
            while (file_exists('upload/slide/'.$Hinh))
            {
                $Hinh = random_int(1,1000)."_".$name;
            }
            $file->move('upload/slide',$Hinh);
            $slide->Hinh = $Hinh;
        }
        else
        {
            $slide->Hinh = "";
        }
        $slide->save();
        return redirect('admin/slide/them')->with('thongbao','Thêm thành công.');
    }

    public function getSua($id)
    {
        $slide = Slide::find($id);
        return view('admin.slide.sua',compact('slide'));
    }

    public function postSua(Request $request,$id)
    {
        $this->validate($request,
            [
                'Ten'=>'required',
                'NoiDung'=>'required',
                'link'=>'required'
            ],
            [
                'Ten.required'=>'Bạn chưa nhập tên slide',
                'NoiDung.required'=>'Bạn chưa nhập nội dung slide',
                'link.required'=>'Bạn chưa nhập link'
            ]);
        $slide = Slide::find($id);
        $slide->Ten = $request->Ten;
        $slide->NoiDung = $request->NoiDung;
        if($request->has('link'))
            $slide->link = $request->link;
        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png')
            {
                return redirect('admin/slide/them')->with('loi','Bạn chỉ được chọn file có đuôi png,jpg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = random_int(1,1000)."_".$name;
            while (file_exists('upload/slide/'.$Hinh))
            {
                $Hinh = random_int(1,1000)."_".$name;
            }
            if($slide->Hinh != '')
            unlink("upload/slide/".$slide->Hinh);
            $file->move('upload/slide',$Hinh);
            $slide->Hinh = $Hinh;
        }

        $slide->save();
        return redirect('admin/slide/danhsach')->with('thongbao','Sửa thành công.');
    }

    public function getXoa($id)
    {
        $slide = Slide::find($id);
        $slide->delete();
        return redirect('admin/slide/danhsach')->with('thongbao','Xóa thành công.');
    }
}
