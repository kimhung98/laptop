<?php

namespace App\Http\Controllers;

use App\Order;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function home(){
        $order = DB::table('order')
            ->select(DB::raw('SUM(TongTien) as Tong'))
            ->where('TrangThai','=','Completed')
            ->get();
        $tien = $order[0]->Tong;

        $order1 = DB::table('order')
            ->select(DB::raw('COUNT(*) as So_Don'))
            ->where('TrangThai','Pending')
            ->groupBy('TrangThai')
            ->get();
        if(isset($order1[0]))
            $ds = $order1[0]->So_Don;
        else
            $ds = 0;

        $order2 = DB::table('order')
            ->select(DB::raw('COUNT(*) as So_Don'))
            ->where('TrangThai','Completed')
            ->groupBy('TrangThai')
            ->get();
        $ds2 = $order2[0]->So_Don;


        $custom = DB::table('customers')
            ->select(DB::raw('Email'))
            ->groupBy('email')
            ->get();
        $custom1 = count($custom);

        $order3 = Order::orderBy('id','ASC')->where('TrangThai','pending')->take(5)->get();
        if(!isset($order3[0]))
        {
            $order3 = Order::orderBy('id','DESC')->where('TrangThai','Completed')->take(5)->get();
        }

        $range = \Carbon\Carbon::now()->subDays(7);
        $orderDay = DB::table('order')
            ->select(DB::raw('day(created_at) as getDay'), DB::raw('COUNT(*) as So_Don'))
            ->where('created_at', '>=', $range)
            ->groupBy('getDay')
            ->orderBy('getDay', 'ASC')
            ->get();

        return view('admin.dashboard',compact('tien','ds','ds2','custom1','order3','orderDay'));
    }

    public function baocao(){

        $range = \Carbon\Carbon::now()->subMonth(1);
        $orderDay = DB::table('order')
            ->select(DB::raw('month(created_at) as getMonth'), DB::raw('COUNT(*) as So_Don'), DB::raw('SUM(TongTien) as Tong'))
            ->where('created_at', '>=', $range)
            ->where('TrangThai','Completed')
            ->groupBy('getMonth')
            ->get();
        $thang = $orderDay[0]->getMonth;
        $sodon = $orderDay[0]->So_Don;
        $tong = $orderDay[0]->Tong;

        $orderDay1 = DB::table('order_ct')
            ->select( DB::raw('SUM(SoLuong) as SoLuong'))
            ->where('created_at', '>=', $range)
            ->get();

        $SoLuong = $orderDay1[0]->SoLuong;

        return view('admin.baocao', compact('thang','sodon','tong','SoLuong'));
    }

}
