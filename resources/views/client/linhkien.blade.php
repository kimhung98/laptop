@extends('client.layout.index')
@include('client.layout.slide')
@section('content')

    <div class="container">
        <div class="laptopacc">
            <div>
                <h1>LINH KIỆN - PHỤ KIỆN LAPTOP</h1>
            </div>
            <div class="phanmem-phukien text-center">
                <a href="loaisanphamlk/8">
				<span>
					<img class="lazy lazydone" data-original="https://www.thegioimaychu.vn/blog/wp-content/uploads/2018/10/slant1.jpg" src="https://www.thegioimaychu.vn/blog/wp-content/uploads/2018/10/slant1.jpg" style="display: inline; opacity: 1;">
				</span>
                    <h4>Ổ cứng</h4>
                </a>
                <a href="loaisanphamlk/9">
				<span>
					<img class="lazy lazydone" data-original="https://cdn.tgdd.vn/Category/75/USB-l-20-11-2019.png" src="https://cdn.tgdd.vn/Category/75/USB-l-20-11-2019.png" style="display: inline; opacity: 1;">
				</span>
                    <h4>USB</h4>
                </a>
                <a href="loaisanphamlk/10">
				<span>
					<img class="lazy lazydone" data-original="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTyJIEwYGfRwLZG4BTBDJGMHCc8jD4Z1zYy8s6Bpa2nOVtmJY3x&usqp=CAU" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTyJIEwYGfRwLZG4BTBDJGMHCc8jD4Z1zYy8s6Bpa2nOVtmJY3x&usqp=CAU" style="display: inline; opacity: 1;">
				</span>
                    <h4>RAM</h4>
                </a>
                <a href="loaisanphamlk/11">
				<span>
					<img class="lazy lazydone" data-original="https://cdn.tgdd.vn/v2015/Content/desktop/images/laptop/chuot-ban-phim.jpg" src="https://cdn.tgdd.vn/v2015/Content/desktop/images/laptop/chuot-ban-phim.jpg" style="display: inline; opacity: 1;">
				</span>
                    <h4>Chuột, bàn phím</h4>
                </a>
                <a href="loaisanphamlk/12">
					<span>
						<img class="lazy lazydone" data-original="https://cdn.tgdd.vn/v2015/Content/desktop/images/laptop/tai-nghe.jpg" src="https://cdn.tgdd.vn/v2015/Content/desktop/images/laptop/tai-nghe.jpg" style="display: inline; opacity: 1;">
					</span>
                    <h4>Tai nghe</h4>
                </a>
                <a href="loaisanphamlk/13">
					<span>
						<img class="lazy lazydone" data-original="https://cdn.tgdd.vn/v2015/Content/desktop/images/laptop/loa.jpg" src="https://cdn.tgdd.vn/v2015/Content/desktop/images/laptop/loa.jpg" style="display: inline; opacity: 1;">
					</span>
                    <h4>Loa</h4>
                </a>
                <a href="loaisanphamlk/14">
					<span>
						<img class="lazy lazydone" data-original="https://cdn.tgdd.vn/v2015/Content/desktop/images/laptop/mieng-dan-laptop.jpg" src="https://cdn.tgdd.vn/v2015/Content/desktop/images/laptop/mieng-dan-laptop.jpg" style="display: inline; opacity: 1;">
					</span>
                    <h4>Miếng dán laptop</h4>
                </a>
            </div>
        </div>

        <hr style="color: #f8a136"/>

        <div class="laptopprice container">
            <h1>Sản phẩm nổi bật</h1>
        </div>
        <aside class="leftcate">
            <div id="product-list" data-cate="laptop" class="lstlaptop">
                <div class="cate mo-tl row">
                    <?php $i=0; ?>
                    @foreach($sanpham as $sp)
                        @if($sp->NoiBat <> 0 and $sp->loaisp->theloai->id == 2 and $sp->GiamGia != 0 and $i<8)
                        <div class="col-6 col-md-3 owl-item" style="width: 239px; height: 330px; border: 1px solid #e3e3e3;">
                            <div>
                                <a href="sanpham/{{$sp->id}}">
                                    <div class="ava">
                                        <img width="100" height="100" src="upload/sanpham/{{$sp->Hinh}}">
                                    </div>
                                    @if($sp->GiamGia <> 0)
                                        <label class="lbldiscount lbl" style="text-align: center; font-size: 13px; margin-top: 40px; width: 130px"><i class="fas fa-bolt" style="float: left; margin-top: 3px"></i>GIẢM {{number_format($sp->GiamGia,0)}}₫</label>
                                    @endif
                                    <h3>{{$sp->TenSp}}</h3>
                                    <strong> {{number_format($sp->GiaTien,0)}}₫</strong>
                                </a>
                            </div>
                        </div>
                            <?php $i++; ?>
                        @endif
                    @endforeach

                </div>
            </div>
        </aside>
    </div>
@endsection
