@extends('client.layout.index')
@include('client.layout.slide')
@section('content')
    <div class="container">
        <div class="col-6 col-md-12 laptopmanu" style="margin-top: 20px">
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

    <div class="laptopprice container">
        <h1>Các sản phẩm của {{$loaisp->Ten}}</h1>
    </div>

    <div class="container">
        <aside class="leftcate">
            <div id="product-list" data-cate="laptop" class="lstlaptop">
                <div class="cate mo-tl row">
                    @foreach($sanpham as $sp)
                        @if($sp->loaisp->theloai->id == 1 and $loaisp->id == $sp->idLoaiSp and $sp->chitiet)
                            <div class="col-6 col-md-3 owl-item" style="width: 239px; height: 400px; border-right: 1px solid #e3e3e3;border-bottom: 1px solid #e3e3e3;">
                                <div>
                                    <a href="sanpham/{{$sp->id}}">
                                        <div class="ava">
                                            <img width="100" height="100" src="upload/sanpham/{{$sp->Hinh}}">
                                        </div>
                                        @if($sp->GiamGia <> 0)
                                            <label class="lbldiscount lbl" style="text-align: center; font-size: 15px; margin-top: 40px; width: 147px"><i class="fas fa-bolt" style="float: left; margin-top: 3px"></i>GIẢM {{number_format($sp->GiamGia,0)}}₫</label>
                                        @endif
                                        <h3>{{$sp->TenSp}}</h3>
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
                        @endif
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


@endsection
