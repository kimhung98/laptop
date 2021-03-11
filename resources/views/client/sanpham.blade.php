@extends('client.layout.index')

@section('content')
    <div class="view-product-detail">
        @if($sanpham->loaisp->theloai->id == 1)
        <form action="add-to-cart/{{$sanpham->id}}" method="post">
            <div class="container">
                <h3>{{$sanpham->TenSp}}</h3>
                <hr>
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="ava" >
                            <div id="demo" class="carousel slide" data-ride="carousel">

                                <!-- Indicators -->
                                <ul class="carousel-indicators" style="opacity: 0">
                                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                                    <li data-target="#demo" data-slide-to="1"></li>
                                    <li data-target="#demo" data-slide-to="2"></li>
                                    <li data-target="#demo" data-slide-to="3"></li>
                                    <li data-target="#demo" data-slide-to="4"></li>
                                </ul>

                                <!-- The slideshow -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="upload/sanpham/{{$sanpham->Hinh}}"  width="300px" height="200px">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="upload/chitiet/{{$sanpham->chitiet->Hinh1}}" width="300px" height="200px">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="upload/chitiet/{{$sanpham->chitiet->Hinh2}}"  width="300px" height="200px">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="upload/chitiet/{{$sanpham->chitiet->Hinh3}}"  width="300px" height="200px">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="upload/chitiet/{{$sanpham->chitiet->Hinh4}}"  width="300px" height="200px">
                                    </div>
                                </div>

                                <!-- Left and right controls -->
                                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </a>
                                <a class="carousel-control-next" href="#demo" data-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            Giá: <strong style="color: red"> {{number_format ($sanpham->GiaTien,0)}}₫</strong> <br>
                            @if($sanpham->GiamGia <> 0)
                                <p style="color: #FF4C0C;">Giảm ngay: {{number_format ($sanpham->GiamGia,0)}}₫</p>
                            @endif
                        </div>
                        <div class="promotion">
                            <span class="plabel"><i></i>Khuyến mãi</span>
                            <div>
                                <span class="promo" data-id="548904">
                                    <i class="numeric">1</i>
                                    Mua kèm Office 365 Personal ưu đãi giảm 600,000₫
                                </span>
                                <span class="promo" data-id="548904">
                                    <i class="numeric">2</i> Balo Laptop
                                    <small style="color: #666">(Hết quà hoàn tiền 100.000₫)</small>
                                </span>
                            </div>
                            <aside>
                                <p>Quà khuyến mãi(1 hình)</p>
                                <img src="https://cdn.tgdd.vn/Products/Images/2102/73874/balo-acer-khuyen-mai-200x200.jpg" width="50" height="50">
                            </aside>
                            <span>Tặng Balo và <b>1 K.mãi</b> khác</span>
                        </div>
                        <div class="quality"><span class="quality">Số lượng</span>
                            <select name="quality">
                                @for($i=1;$i<=10;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor;
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-cart-plus"></i> Đặt hàng</button>
                        {{csrf_field()}}
                    </div>
                    <div class="col-md-4">
                        <div class="checkstockbox">
                            <h5 style="text-align: center; color: #b35e14;font-size: 22px;">Thông tin chi tiết sản phẩm</h5>
                        </div>
                        <div class="policy_intuitive">
                            <div>
                                <div style="float: left">CPU:</div>
                                <div style="margin-left: 95px">{{$sanpham->chitiet->CPU}}</div>
                            </div>
                            <div style="margin-top: 7px">
                                <div style="float: left">RAM:</div>
                                <div style="margin-left: 95px">{{$sanpham->chitiet->RAM}}</div>
                            </div>
                            <div style="margin-top: 7px">
                                <div style="float: left">Ổ cứng:</div>
                                <div style="margin-left: 95px">{{$sanpham->chitiet->OCung}}</div>
                            </div>
                            <div style="margin-top: 7px">
                                <div style="float: left">Màn hình:</div>
                                <div style="margin-left: 95px">{{$sanpham->chitiet->ManHinh}}</div>
                            </div>
                            <div style="margin-top: 7px">
                                <div style="float: left">Thiết kế:</div>
                                <div style="margin-left: 95px">{{$sanpham->chitiet->ThietKe}}</div>
                            </div>
                            <div style="margin-top: 7px">
                                <div style="float: left">Kích thước:</div>
                                <div style="margin-left: 95px">{{$sanpham->chitiet->KichThuoc}}</div>
                            </div>
                            <div style="margin-top: 7px">
                                <div style="float: left">Năm ra mắt:</div>
                                <div style="margin-left: 95px">{{$sanpham->chitiet->NamRaMat}}</div>
                            </div>
                        </div>
                    </div>

                </div>
                <hr style="margin-top: 50px">
                <div style="margin-top: 20px;">
                    <p>{!! $sanpham->MoTa !!}</p>
                </div>
            </div>
        </form>
        @else
            <form action="add-to-cart/{{$sanpham->id}}" method="post">
                <div class="container">
                    <h3>{{$sanpham->TenSp}}</h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-3 text-center" style="border: 1px solid #ddd; height: 330px;">
                            <div class="ava" >
                                <div id="demo" class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ul class="carousel-indicators" style="opacity: 0">
                                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                                    </ul>

                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="upload/sanpham/{{$sanpham->Hinh}}"  width="200px" height="200px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="">
                                Giá: <strong style="color: red"> {{number_format ($sanpham->GiaTien,0)}}₫</strong> <br>
                                @if($sanpham->GiamGia <> 0)
                                    <p style="color: #FF4C0C;">Giảm ngay: {{number_format ($sanpham->GiamGia,0)}}₫</p>
                                @endif
                            </div>
                            <hr>
                            <div style="font-size: 13px;">
                                <p>{!! $sanpham->MoTa !!}</p>
                            </div>
                            <hr>
                            <div class="quality"><span class="quality">Số lượng</span>
                                <select name="quality">
                                    @for($i=1;$i<=10;$i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor;
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-cart-plus"></i> Đặt hàng</button>
                            {{csrf_field()}}
                        </div>
                        <div class="col-md-4">
                            <div class="checkstockbox">
                                <h5 style="text-align: center; color: #b35e14;font-size: 22px;">Thông tin chi tiết sản phẩm</h5>
                            </div>
                            <div class="policy_intuitive">
                                <div class="for-mobile">
                                    <h4>Mua như vua - chăm sóc như vip</h4>
                                    <ul class="policy_new">
                                        <li>
                                        <span>
                                            <i class="fas fa-ambulance"></i>
                                        </span>
                                            <p>Lỗi là đổi mới trong <b>1 tháng</b> tại 2017 siêu thị toàn quốc.

                                            </p>
                                        </li>
                                        <li>
                                        <span>
                                            <i class="fas fa-mobile"></i>
                                        </span>
                                            <p>Đổi trả và bảo hành cực dễ <b>chỉ cần số điện thoại</b>
                                            </p>
                                        </li>
                                        <li>
                                        <span>
                                            <i class="fas fa-shield-alt"></i>
                                        </span>
                                            <p>Bảo hành <b>chính hãng thân máy 1 năm</b>
                                            </p>
                                        </li>
                                    </ul>
                                    <ul class="policy">
                                        <li>
                                        <span>
                                            <i class="fas fa-check"></i>
                                        </span>
                                            <p>Trong hộp có:
                                                <a href="#" data-modal="">
                                                    <b>Sách hướng dẫn, Thùng máy, Adapter sạc</b>
                                                </a>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top: 50px">

                </div>
            </form>
        @endif
        <div class="container" style="margin-top: 50px">
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            @if(Auth::check())
            <div class="well">
                <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                <form action="comment/{{$sanpham->id}}" method="POST" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <textarea class="form-control" name="NoiDung" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>
            @endif
            <hr>
                @foreach($sanpham->comment as $cm)
                <div class="media">
                    <a class="pull-left" href="">
                        <img class="media-object" width="52" height="40" src="data:image/jpeg;base64,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" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$cm->user->name}}
                            <small>{{$cm->created_at}}</small>
                        </h4>
                        {{$cm->NoiDung}}
                    </div>
                </div>
                @endforeach
        </div>
    </div>

    @if(session('baocao'))
        <script>
            alert("Số lượng sản phẩm trong kho không đủ!");
        </script>
    @endif
@endsection

