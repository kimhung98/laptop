<?php

namespace App\Http\Controllers;

use App\Customers;
use App\Mail\ShoppingMail;
use App\Order;
use App\Order_CT;
use App\SanPham;
use Illuminate\Http\Request;
use \Cart;
use Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function getGiohang()
    {
        return view('client.cart');
    }

    public function postAddTocart($id,Request $request){
        $sanpham = SanPham::find($id);
        $post = $request->all ();
        $price = ($sanpham->GiaTien - $sanpham->GiamGia);
        $sale_price = $sanpham->GiamGia;
        $gia = $sanpham->GiaTien;
        $image = $sanpham->Hinh;
        if($sanpham->SoLuong >= $post['quality'])
        {
            Cart::add($id, $sanpham->TenSp, $post['quality'],$price, ['product_sale_price' => $sale_price,'image' => $image,'gia'=>$gia]);

            return redirect('gio-hang');
        }
        else
            return  redirect('sanpham/'.$id)->with('baocao','Số lượng sản phẩm trong kho không đủ!');

    }

    public function removeItemCart($id,Request $request){
        Cart::remove($id);
        return redirect('gio-hang');
    }


    public function getThanhtoan()
    {
        return view ('client.checkout');
    }

    public function postThanhtoan(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gioi_tinh' => 'required',
            'phone_number' => 'required',
            'address' => 'required'
        ],
            [
                'first_name.required'=>'Bạn chưa nhập  Họ',
                'last_name.required'=>'Bạn chưa nhập Tên',
                'gioi_tinh.required'=>'Bạn chưa chọn giới tính',
                'phone_number.required'=>'Bạn chưa nhập SDT',
                'address.required'=>'Bạn chưa nhập Địa chỉ'


            ]);

        $post=$request->all();
        $customers = new Customers();
        $customers->Ho = $post['first_name'];
        $customers->Ten = $post['last_name'];
        $customers->GioiTinh = $post['gioi_tinh'];
        $customers->Email = $post['email'];
        $customers->DiaChi = $post['address'];
        $customers->SDT = $post['phone_number'];
        $customers->save();

        $order = new Order();
        $order->idCustomer = $customers->id;
        $order->TongTien = Cart::Subtotal($decimals = 0);
        $order->TrangThai="Pending";
        $order->save();

        foreach (Cart::content() as $item){
            $order_ct = new Order_CT();
            $order_ct->idOrder = $order->id;
            $order_ct->idSanPham = $item->id;
            $order_ct->TenSp = $item->name;
            $order_ct->SoLuong = $item->qty;
            $order_ct->save();

            $sanpham = SanPham::find($order_ct->idSanPham);
            $sanpham->SoLuong = ($sanpham->SoLuong - $order_ct->SoLuong);
            $sanpham->save();
        }

        Session::put('price',Cart::Subtotal($decimals = 0));
        Mail::to($request->email)->send(new ShoppingMail());
        Cart::destroy();
        return redirect('home')->with('thongbao','Bạn đạt hàng thành công!');
    }

}
