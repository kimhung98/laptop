@extends('client.layout.index')
@section('content')
    <div class="view-cart">
        <div class="container">
            <div class="row justify-content-center"
                @if(Cart::Subtotal($decimals = 0) == 0)
                    style="margin-bottom: 131px"
                @endif>
                <div class="mx-auto col-sm-12 col-md-10 col-lg-8 col-xl-7" style="margin-bottom: 100px">
                    <div class="titlepay">
                        <span>
                            <a href="home"> <i style="font-size: 20px"><</i> Mua thêm sản phẩm khác </a>
                        </span>
                        <span class="rightcart">Giỏ hàng của bạn</span>
                    </div>
                    <div class="cart">
                        <div class="row">
                            @foreach (Cart::content() as $item)
                                <div class="col-md-2">
                                    <img width="90" height="70" style="margin-top: 6px" src="upload/sanpham/{{$item->options->image}}">
                                    <form action="remove-item-cart/{{$item->rowId}}" method="post">
                                        <button class="del">
                                            <i class="fas fa-times-circle"></i>Xóa
                                        </button>
                                        {{csrf_field()}}
                                    </form>
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-9 pricename">
                                            <a href="sanpham/{{$item->id}}" style="color: red">
                                                {{$item->name}}
                                            </a>
                                            <p style="color: #0c0c0c">Bạn đã mua {{$item->qty}} sản phẩm</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p>Thành tiền: {{number_format ($item->options->gia*$item->qty,0,'',',')}}₫</p>
                                        </div>
                                    </div>
                                    <div class="discountpromotion">
                                        <span>Giảm
                                            <strong class="discountbox">({{number_format ($item->options->product_sale_price*$item->qty,0,'',',')}}₫)</strong>
                                            còn
                                            <strong class="discountbox">{{number_format ($item->options->gia*$item->qty - $item->options->product_sale_price*$item->qty,0,'',',')}}₫</strong>
                                        </span>
                                    </div>
                                    <div class="total-1">
                                        <span>Tổng: </span>
                                        <span>{{number_format ($item->options->gia*$item->qty - $item->options->product_sale_price*$item->qty,0)}}₫</span>
                                    </div>
                                    <hr>
                                </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-10">
                                <div class="payend">

                                    <div class="price">
                                        <b>Cần thanh toán:</b>
                                        <strong>{{number_format (Cart::Subtotal($decimals = 0),0,'',',')}}₫</strong>
                                    </div>
                                </div>
                                <div class="freeship">
                                    <i class="fas fa-check-circle"></i>
                                    Đơn hàng được <b>miễn phí</b> giao hàng
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="pull-right">
                                <a class="btn btn-primary" href="thanh-toan">Thông tin cơ bản</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
