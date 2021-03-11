@extends('client.layout.index')
@section('content')
    <div class="view-checkout">
        <div class="container">
            <div class="col-md-6" style="margin: 0 auto">
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
            </div>
            <form action="thanh-toan" method="post">
                <div class="row justify-content-center">
                    <div class="mx-auto col-sm-12 col-md-10 col-lg-8 col-xl-6">
                        <div class="cart" style="margin-bottom: 100px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row row-input">
                                        <div class="col-md-12">
                                            <label class="label">Thông tin khách hàng</label>
                                            <input type="email" class="form-control" placeholder="Email" name="email">
                                        </div>
                                    </div>
                                    <div class="row row-input">
                                        <div class="col-6 col-md-6">
                                            <input type="text" class="form-control" name="first_name" placeholder="Họ">
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <input type="text" class="form-control" name="last_name" placeholder="Tên">
                                        </div>
                                    </div>
                                    <div class="row row-input">
                                        <div class="col-4 col-md-4">
                                            <select class="form-control" name="gioi_tinh">
                                                <option value="">Giới tính</option>
                                                <option value="nam">Nam</option>
                                                <option value="nu">Nữ</option>
                                            </select>
                                        </div>
                                        <div class="col-8 col-md-8">
                                            <input type="text" class="form-control" name="phone_number" placeholder="Số điện thoái">
                                        </div>
                                    </div>
                                    <div class="row row-input">
                                        <div class="col-md-12">
                                            <textarea name="address" class="form-control" placeholder="Địa chỉ"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 button-total">
                                        <div class="pull-right">
                                            <button class="btn btn-primary">Đặt hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{csrf_field()}}
            </form>
        </div>
    </div>
@endsection
