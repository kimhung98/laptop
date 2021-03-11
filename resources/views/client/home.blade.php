@extends('client.layout.index')
@include('client.layout.slide')
@section('content')
    <div class="container">
        <div class="col-6 col-md-12 laptopmanu" style="margin-top: -5px">
            <a href="loaisanpham/1" style="padding:0">
                <img src="https://cdn.tgdd.vn/Brand/2/Macbook---iMac44-s_55.png">
                <input type="hidden" name="manu_203" value="0">
            </a>
            <a href="loaisanpham/2" style="padding:0">
                <img src="https://cdn.tgdd.vn/Brand/2/HP-Compaq44-s_56.png">
                <input type="hidden" name="manu_122" value="0">
            </a>
            <a href="loaisanpham/3" style="padding:0">
                <img src="https://cdn.tgdd.vn/Brand/2/Asus44-s_56.png">
                <input type="hidden" name="manu_128" value="0">
            </a>
            <a href="loaisanpham/4" style="padding:0">
                <img src="https://cdn.tgdd.vn/Brand/2/Dell44-s_56.png">
                <input type="hidden" name="manu_118" value="0">
            </a>
            <a href="loaisanpham/5" style="padding:0">
                <img src="https://cdn.tgdd.vn/Brand/2/Lenovo44-s_57.png">
                <input type="hidden" name="manu_120" value="0">
            </a>
            <a href="loaisanpham/6" style="padding:0">
                <img src="https://cdn.tgdd.vn/Brand/2/Acer44-s_57.png">
                <input type="hidden" name="manu_119" value="0">
            </a>
            <a href="loaisanpham/7" style="padding:0">
                <img src="https://cdn.tgdd.vn/Brand/2/MSI44-s_0.png">
                <input type="hidden" name="manu_133" value="0">
            </a>
        </div>
    </div>
    <div class="container" style="margin-top: 5px">
        <div class="list-shock ">
            <div class="head-title">
                <img src="https://cdn.tgdd.vn/dmx2016/Content/images/2019/Laptop/desktop/laptopgiasoc-desk.png">
                <h3 style="margin: 0 auto">Sản phẩm khuyễn mãi</h3>
            </div>
            <div class="lstlaptop">
                <div class="cate owl-carousel owl-theme" style="opacity: 1; display: block;">
                    <div class="owl-wrapper-outer row">
                        <?php $i=0; ?>
                        @foreach($sanpham1 as $sp)
                            @if($sp->loaisp->theloai->id == 1 and $sp->NoiBat == 1 and $sp->SoLuong > 0 and $i<4)
                                <div class="col-6 col-md-3 owl-item" style="width: 239px; height: 500px; border: 1px solid #e3e3e3;"  data-aos="fade-up">
                                    <div>
                                        <a href="sanpham/{{$sp->id}}">
                                            <div class="ava">
                                                <img width="100" height="100" src="upload/sanpham/{{$sp->Hinh}}">
                                            </div>
                                            <label class="lbldiscount lbl" style="text-align: center; font-size: 13px; margin-top: 40px; width: 130px"><i class="fas fa-bolt" style="float: left; margin-top: 3px"></i>GIẢM {{number_format($sp->GiamGia,0)}}₫</label>

                                            <h3 style="margin-top: 8px;">{{$sp->TenSp}}</h3>
                                            <strong> {{number_format($sp->GiaTien,0)}}₫</strong>
                                        </a>
                                        <div class="props">
                                            <span class="dotted">RAM {{$sp->chitiet->RAM}}</span>
                                            <span class="dotted">Ổ CỨNG {{$sp->chitiet->OCung}}</span>
                                        </div>
                                    </div>
                                    <div class="promotion">
                                        <div class="imgpromotion">
                                                <span>
                                                    <img src="https://cdn.tgdd.vn/Products/Images/2102/73874/balo-acer-khuyen-mai-200x200.jpg" width="50" height="50">
                                                </span>
                                        </div>
                                        <div class="promotion-text">
                                            <span>Tặng Balo Acer và <b>1 K.mãi</b> khác</span>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="laptopprice container">
        <h1>Sản phẩm nổi bật</h1>
    </div>

    <div class="container">
        <aside class="leftcate">
            <div id="product-list" data-cate="laptop" class="lstlaptop">
                <div class="cate mo-tl row">
                    @foreach($chitiet1 as $ct)
                        @if($ct->sanpham->NoiBat == 1 and $ct->sanpham->SoLuong > 0)
                            <div class="col-6 col-md-3 owl-item" style="width: 239px; height: 400px; border: 1px solid #e3e3e3;"  data-aos="fade-up">
                                <div >
                                    <a href="sanpham/{{$ct->idSanPham}}">
                                        <div class="ava">
                                            <img width="100" height="100" src="upload/sanpham/{{$ct->sanpham->Hinh}}">
                                        </div>
                                        @if($ct->sanpham->GiamGia <> 0)
                                            <label class="lbldiscount lbl" style="text-align: center; font-size: 13px !important; margin-top: 40px; width: 130px !important;"><i class="fas fa-bolt" style="float: left; margin-top: 3px"></i>GIẢM {{number_format($ct->sanpham->GiamGia,0)}}₫</label>
                                        @endif
                                        <h3>{{$ct->sanpham->TenSp}}</h3>
                                        <strong> {{number_format($ct->sanpham->GiaTien,0)}}₫</strong>
                                    </a>
                                    <div class="props">
                                        <span class="dotted">RAM {{$ct->RAM}}</span>
                                        <span class="dotted">Ổ cứng {{$ct->OCung}}</span>
                                    </div>
                                </div>

                                <div class="promotion">
                                    <div class="imgpromotion">
                                                <span>
                                                    <img src="https://cdn.tgdd.vn/Products/Images/2102/73874/balo-acer-khuyen-mai-200x200.jpg" width="50" height="50">
                                                </span>
                                    </div>
                                    <div class="promotion-text">
                                        <span>Tặng Balo Acer và <b>1 K.mãi</b> khác</span>
                                    </div>
                                </div>

                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </aside>


        <div class="laptopprice container">
            <h1>Laptop mới</h1>
        </div>
        <aside class="leftcate">
            <div id="product-list" data-cate="laptop" class="lstlaptop">
                <div class="cate mo-tl row">
                    @foreach($chitiet1 as $ct)
                        <div class="col-6 col-md-3 owl-item" style="width: 239px; height: 400px; border: 1px solid #e3e3e3;"  data-aos="fade-up">
                            <div>
                                <a href="sanpham/{{$ct->idSanPham}}">
                                    <div class="ava">
                                        <img width="100" height="100" src="upload/sanpham/{{$ct->sanpham->Hinh}}">
                                    </div>
                                    @if($ct->sanpham->GiamGia <> 0)
                                        <label class="lbldiscount lbl" style="text-align: center; font-size: 13px; margin-top: 40px; width: 130px"><i class="fas fa-bolt" style="float: left; margin-top: 3px"></i>GIẢM {{number_format($ct->sanpham->GiamGia,0)}}₫</label>
                                    @endif
                                    <h3>{{$ct->sanpham->TenSp}}</h3>
                                    <strong> {{number_format($ct->sanpham->GiaTien,0)}}₫</strong>
                                </a>
                                <div class="props">
                                    <span class="dotted">RAM {{$ct->RAM}}</span>
                                    <span class="dotted">Ổ cứng {{$ct->OCung}}</span>
                                </div>
                            </div>
                            <div class="promotion">
                                <div class="imgpromotion">
                                                <span>
                                                    <img src="https://cdn.tgdd.vn/Products/Images/2102/73874/balo-acer-khuyen-mai-200x200.jpg" width="50" height="50">
                                                </span>
                                </div>
                                <div class="promotion-text">
                                    <span>Tặng Balo Acer và <b>1 K.mãi</b> khác</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </aside>


        <div id="ytb">
            <h1>GÓC TƯ VẤN CHỌN MUA LAPTOP</h1>
            <div class="row">
                <div class="col-12 col-md-6 col50">
                    <iframe width="480" height="220" src="https://www.youtube.com/embed/fMCbZErqhtg?listType=playlist&amp;list=PLrlFKqadgE9FuBcsI7hkg9KBpyvQ5FSdo&amp;enablejsapi=1&amp;origin=https%3A%2F%2Fwww.dienmayxanh.com" frameborder="0" allowfullscreen="" data-gtm-yt-inspected-2727266_124="true" id="306451718" data-gtm-yt-inspected-2727266_129="true">

                    </iframe>
                </div>
                <div class="col-12 col-md-6 col50Nth2">
                    <div class="video">
                        <a href="#">
                            <img class="imgThmbVid" src="https://i.ytimg.com/vi/IcD9YxlYfnU/default.jpg">
                            <h3>Đánh giá Asus Vivobook S14 D409D: mỏng nhẹ, xứng đáng trong phân khúc
                                <span>8/11/2019</span>
                            </h3>
                        </a>
                    </div>
                    <div class="video">
                        <a href="#">
                            <img class="imgThmbVid" src="https://i.ytimg.com/vi/hJuxAYHwXD4/default.jpg">
                            <h3>Đánh giá Asus Vivobook S14 D409D: mỏng nhẹ, xứng đáng trong phân khúc
                                <span>8/11/2019</span>
                            </h3>
                        </a>
                    </div>
                    <div class="video">
                        <a href="#">
                            <img class="imgThmbVid" src="https://i.ytimg.com/vi/iX7PzoWaBA8/default.jpg">
                            <h3>Đánh giá Asus Vivobook S14 D409D: mỏng nhẹ, xứng đáng trong phân khúc
                                <span>8/11/2019</span>
                            </h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('thongbao'))
        <script>
            alert("Bạn đã đặt hàng thành công!");
        </script>
    @endif
@endsection
