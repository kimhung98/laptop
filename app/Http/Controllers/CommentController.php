<?php

namespace App\Http\Controllers;

use App\Comment;
use App\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function getDanhsach()
    {
        $comment = Comment::all();
        return view('admin.comment.danhsach',compact('comment'));
    }

    public function getXoa($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('admin/comment/danhsach')->with('thongbao','Bạn xóa comment thành công');
    }

    public function postCm($id, Request $request)
    {
        $comment = new Comment();
        $comment->idSanPham = $id;
        $comment->idUser = Auth::user()->id;
        $comment->NoiDung = $request->NoiDung;
        $comment->save();

        return redirect('sanpham/'.$id)->with('thongbao','Bạn comment thành công');
    }
}
