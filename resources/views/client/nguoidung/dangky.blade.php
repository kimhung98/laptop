<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="mx-auto col-sm-12 col-md-10 col-lg-8 col-xl-6">
            <div class="logo logo--medium text-center">
                <a href="login" class="router-link-active">
                    <img src="https://hotro.gen.vn/wp-content/uploads/2019/11/logo_large.png" alt="Viblo Accounts" class="logo-image">
                </a>
            </div>
            <div class="card">
                <div class="col-md-12">
                    <h1 class="card-title">
                        Đăng ký tài khoản cho genCRM
                    </h1>
                    <p class="card-subtitle mt-2">
                        Chào mừng bạn đến <strong>genCRM</strong>!
                        Tham gia với chúng tôi để tìm thông tin hữu ích cần thiết để cải thiện kỹ năng của bạn.
                        Vui lòng điền thông tin của bạn vào mẫu dưới đây để tiếp tục.
                    </p>
                </div>

                <div class="card-body">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    <form method="POST" action="dangky">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group row">
                            <div class="col-md-6 text-center">
                                <input placeholder="Tên người dùng" class="form-control" id="name" type="text"  name="name"  required autocomplete="name" autofocus>
                            </div>
                            <div class="col-md-6 text-center">
                                <input placeholder="Email" class="form-control" id="email" type="email"  name="email" required autocomplete="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                <input placeholder="Password" class="form-control" id="password" type="password"  name="password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                <input placeholder="Nhập lại password" class="form-control" class="inputitem" id="password-confirm" type="password" name="passwordAgain" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row text-center">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Đăng ký
                                </button>
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
