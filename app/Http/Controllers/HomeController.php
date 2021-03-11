<?php

namespace App\Http\Controllers;

use App\ChiTiet;
use App\LoaiSp;

use App\SanPham;
use App\Slide;
use App\TheLoai;
use App\User;
use Illuminate\Http\Request;
use \Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Comment;
use Mail;

class HomeController extends Controller
{
    function __construct()
    {
        $theloai = TheLoai::all();
        $slide = Slide::all();
        $comment = Comment::all();
        view()->share('theloai',$theloai);
        view()->share('slide',$slide);
        view()->share('comment',$comment);
    }

    public function getHome()
    {
        $chitiet = ChiTiet::all();
        $chitiet1 = ChiTiet::orderBy('id','DESC')->take(8)->get();
        $sanpham =SanPham::all();
        $sanpham1 = SanPham::orderBy('GiamGia','DESC')->get();
        return view('client.home',compact('chitiet','sanpham','chitiet1','sanpham1'));
    }

    public function getLoaisp($id)
    {
        $loaisp = LoaiSp::find($id);
        $sanpham = SanPham::all();
//        dd(SanPham::chitiet()->get());
        return view('client.loaisp',compact('loaisp','sanpham'));
    }
    public function getLoaisp_lk($id)
    {
        $loaisp = LoaiSp::find($id);
        $sanpham = SanPham::all();
        return view('client.loaisp_lk',compact('loaisp','sanpham'));

    }

    public function getLinhKien()
    {
        $sanpham = SanPham::orderBy('id','DESC')->get();
        return view('client.linhkien',compact('sanpham'));
    }

    public function getSanPham($id)
    {
        $sanpham = SanPham::find($id);
        return view('client.sanpham', compact('sanpham'));
    }


    public function getDangnhap()
    {
        return view('client.nguoidung.login');
    }
    public function postDangnhap(Request $request)
    {
        $this->validate($request,
            [
                'email'=>'required',
                'password'=>'required|min:3|max:32'
            ],
            [
                'email.required'=>'Bạn chưa nhập email',
                'password.required'=>'Bạn chưa nhập password',
                'password.min'=>'Password phải từ 3 đến 32 ký tự',
                'password.max'=>'Password phải từ 3 đến 32 ký tự'
            ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            $user = Auth::user();
            if($user->quyen == 1)
                return redirect('admin/home');
            else
                return redirect('home');
        }
        else
        {
            return redirect('dangnhap')->with('thongbao','Đăng nhập không thành công');
        }
    }

    public function getDangxuat()
    {
        Auth::logout();
        return redirect('home');
    }

    public function getTK($id)
    {
        $user = User::find($id);
        return view('client.nguoidung.taikhoan', compact('user'));
    }

    public  function postTK(Request $request,$id){
        $this->validate($request,
            [
                'name'=>'required|min:3'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên người dùng',
                'name.min'=>'Tên người dùng phải có ít nhất 3 ký tự'

            ]);
        $user = User::find($id);
        $user->name = $request->name;
        if($request->changePassword == "on")
        {
            $this->validate($request,
                [
                    'password'=>'required|min:3|max:32',
                    'passwordAgain'=>'required|same:password'
                ],
                [
                    'password.required'=>'Bạn chưa nhập mật khẩu',
                    'password.min'=>'Mật khẩu có ít nhất 3 ký tự',
                    'password.max'=>'mật khẩu có tối đa 32 ký tự',
                    'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                    'passwordAgain.same'=>'Mật khẩu không khớp'
                ]);
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect('taikhoan/'.$id)->with('thongbao','Bạn đã sửa thành công');

    }

    public function getDangKy()
    {
        return view('client.nguoidung.dangky');
    }

    public function postDangKy(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required|min:2',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:3|max:32',
                'passwordAgain'=>'required|same:password'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên người dùng',
                'name.min'=>'Tên người dùng phải có ít nhất 3 ký tự',
                'email.required'=>'Bạn chưa nhập địa chỉ email',
                'email.email'=>'Bạn chưa nhập đúng định dạng email',
                'email.unique'=>'Email đã tồn tại',
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu có ít nhất 3 ký tự',
                'password.max'=>'mật khẩu có tối đa 32 ký tự',
                'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same'=>'Mật khẩu không khớp'
            ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->Quyen = 0;
        $user->save();

        return redirect('dangnhap')->with('thongbao','Bạn đã đăng ký thành công');
    }
}
