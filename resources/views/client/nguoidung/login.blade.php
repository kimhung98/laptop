<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card">
                <div class="mb-6 text-center">
                    <img src="https://hotro.gen.vn/wp-content/uploads/2019/11/logo_large.png" class=" preload-me">
                </div>
                <div class="my-4 text-center"><h5>Login to genCRM</h5></div>

                <div class="card-body">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                    <form method="POST" action="dangnhap">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group row">
                            <div class="icon text-center">
                                <i aria-hidden="true" class="fas fa-user"></i>
                            </div>

                            <div class="col-md-10 text-center">
                                <input id="username" type="text" class="form-control" name="email" required autocomplete="username" autofocus>
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="icon text-center">
                                <i aria-hidden="true" class="fas fa-lock"></i>
                            </div>

                            <div class="col-md-10 text-center">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Đăng nhập
                                </button>
                            </div>
                            <div class="col-md-12 text-center" style="margin-top: 20px">
                                <a href="dangky">Đăng ký</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
