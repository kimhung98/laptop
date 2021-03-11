<?php

namespace App\Http\Controllers;


use App\LoaiSp;
use App\SanPham;
use App\Slide;
use Illuminate\Http\Request;
use App\Theloai;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    function __construct()
    {
        $theloai = TheLoai::all();
        $slide = Slide::all();
        view()->share('theloai',$theloai);
        view()->share('slide',$slide);
    }
    public function getLoaiSp($idTheLoai){
        $loaisp = LoaiSp::where('idTheLoai',$idTheLoai)->get();
        foreach ($loaisp as $lsp)
        {
            echo "<option value='".$lsp->id."'>".$lsp->Ten."</option>";
        }
    }


    public function getSearch(Request $request)
    {
        $key = $request->key;
        $sanpham = SanPham::where('TenSp','like','%'.$key.'%')->get();

        return view('client.search',compact('sanpham','key'));

    }
    public function home()
    {
        return view('admin.home');
    }

    public function orderByYear($ts)
    {
        if($ts == 12)
        {
            $range = \Carbon\Carbon::now()->subYears($ts);
            $orderDay = DB::table('order')
                ->select(DB::raw('year(created_at) as getDay'), DB::raw('COUNT(*) as So_Don'))
                ->where('created_at', '>=', $range)
                ->groupBy('getDay')
                ->orderBy('getDay', 'ASC')
                ->get();
        }
        else
        {
            $range = \Carbon\Carbon::now()->subDays($ts);
            $orderDay = DB::table('order')
                ->select(DB::raw('day(created_at) as getDay'), DB::raw('COUNT(*) as So_Don'))
                ->where('created_at', '>=', $range)
                ->groupBy('getDay')
                ->orderBy('getDay', 'ASC')
                ->get();
        }
        return view('admin.thongke', compact('orderDay'));

    }
}
