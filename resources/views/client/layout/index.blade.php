<!doctype html>
<html lang="en">
<head>
    <title>Demo</title>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    s
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
    <link href="{{ asset('css/content.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top container-fluid">
            <div class="container-fluid header">
                <a class="navbar-btn" href="{{ url('home') }}">
                    <img class=" preload-me" src="https://hotro.gen.vn/wp-content/uploads/2019/11/logo_large.png">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="col-md-4 search">
                    <form action="{{route('search')}}" method="get">
                        <input type="text" name="key" id="seacher" placeholder=" Tìm kiếm" style="padding-left: 15px; width: 100%;">
                    </form>
                </div>

                <div class="navbar-collapse  float-right" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto text-center">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="home">
                                <i class="fas fa-laptop"></i>
                                <span class="title">
                                            Laptop
                                        </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="linhkien">
                                <i class="fas fa-mouse"></i>
                                <span class="title">
                                            Linh Kiện
                                        </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="gio-hang">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="title">
                                            Giỏ hàng
                                        </span>
                            </a>
                        </li>
                        @if(Auth::check())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user"></i>
                                    <span class="title">
                                               {{Auth::user()->name}}
                                            </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="text-align: center; border-bottom: 1px solid #cccccc">
                                    <div><a class="nav-link dropdown-item" href="taikhoan/{{Auth::user()->id}}">Tài khoản</a></div>
                                    <div><a class="nav-link dropdown-item" href="dangxuat">Đăng xuất</a></div>
                                </div>
                            </li>
                        @else
                            <li class="nav-item" >
                                <a class="nav-link" href="dangnhap">
                                    <i class="fas fa-user"></i>
                                    <span class="title">
                                                Đăng nhập
                                            </span>
                                </a>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>

        @if(session('thongbao'))
            <script>
                document.write({{session('thongbao')}})
            </script>
        @endif

        <main class="py-4">
            @yield('content')
        </main>
        <footer>
            <div class="plc text-center">
                <div class="row">
                    <div class="col-3 col-md-3" style="border-right: 1px solid #e3e3e3">
                        <i class="fas fa-truck"></i>
                        <span>Giao hàng hoả tốc trong 90 phút</span>
                    </div>
                    <div class="col-3 col-md-3" style="border-right: 1px solid #e3e3e3">
                        <i class="fas fa-car"></i>
                        <span>Thanh toán linh hoạt</span>
                    </div>
                    <div class="col-3 col-md-3" style="border-right: 1px solid #e3e3e3">
                        <i class="fas fa-tablet-alt"></i>
                        <span>Trải nghiệm sản phẩm tại nhà</span>
                    </div>
                    <div class="col-3 col-md-3">
                        <i class="fas fa-phone-volume"></i>
                        <span>Hỗ trợ sử dụng. Hotline:
                        <a href="tel:18001764">1800.1764</a>
                    </span>
                    </div>
                </div>
            </div>
            <section id="bn-promote"></section>
            <div class="col-12 rowfoot2">
                <div class="container-fluid">
                    <p>© 2020 Công ty cổ phần . GPDKKD: 0303217354 do sở KH &amp; ĐT TP.HCM cấp ngày 02/01/2007. GP số 57/GP-TTĐT do Sở TTTT TP HCM cấp ngày 30/07/2018.
                        <br> Địa chỉ: 128 Trần Quang Khải, P. Tân Định, Quận 1, TP.Hồ Chí Minh. Điện thoại: (028)3812.59.60. Email: cskh@dienmayxanh.com. Chịu trách nhiệm nội dung: Trần Nhật Linh.
                        <a rel="nofollow" href="#">Xem chính sách sử dụng web</a>
                    </p>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
