<?php

namespace App\Http\Controllers;

use App\Customers;
use App\Order;
use App\Order_CT;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getDanhsach()
    {
        $customer = Customers::all();
        return view('admin.order.danhsach',compact('customer'));
    }

    public function getOrder()
    {
        $order = Order::all();
        return view('admin.order.order',compact('order'));
    }

    public function getOrderct($id)
    {
        $order_ct = Order_CT::where('idOrder','=',$id)->get();
        return view('admin.order.ct', compact('order_ct'));
    }

    public function getSua($id)
    {
        $order = Order::find($id);
        return view('admin.order.sua',compact('order'));
    }

    public function postSua(Request $request,$id)
    {
        $order = Order::find($id);
        $order->idCustomer = $request->KhachHang;
        $order->TongTien = $request->TongTien;
        $order->TrangThai= $request->TrangThai;
        $order->save ();

        return redirect('admin/customer/order')->with('thongbao','Bạn đã cập nhật đơn hàng thành công');
    }
}
