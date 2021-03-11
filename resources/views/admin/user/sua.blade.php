@extends('admin.layouts.app')
@section('content')

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>User</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="admin/home">Dashboard</a></li>
                                <li class="active">User</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Sửa </strong>
                            <small>{{$user->name}}</small>
                        </div>
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
                                <form action="admin/user/sua/{{$user->id}}" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        <label>Họ tên</label>
                                        <input class="form-control" name="name" placeholder="Nhập tên người dùng" value="{{$user->name}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" readonly="" class="form-control" name="email" placeholder="Nhập địa chỉ email" value="{{$user->email}}" />
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" id="changePassword" name="changePassword">
                                        <label>Đổi mật khẩu</label>
                                        <input type="password" class="form-control password" name="password" placeholder="Nhập mật khẩu" disabled=""/>
                                    </div>
                                    <div class="form-group">
                                        <label>Nhập lại mật khẩu</label>
                                        <input type="password" class="form-control password" name="passwordAgain" placeholder="Nhập lại mật khẩu" disabled=""/>
                                    </div>
                                    <div class="form-group">
                                        <label>Quyền người dùng</label>
                                        <label class="radio-inline">
                                            <input name="quyen" value="0"
                                                   @if($user->quyen == 0)
                                                   {{"checked"}}
                                                   @endif
                                                   type="radio">Client
                                        </label>
                                        <label class="radio-inline">
                                            <input name="quyen" value="1"
                                                   @if($user->quyen == 1)
                                                   {{"checked"}}
                                                   @endif
                                                   type="radio">Admin
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-default">Sửa</button>
                                    <button type="reset" class="btn btn-default">Làm mới</button>
                                </form>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

@endsection
@section('script')
    <script src="admin/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="admin/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="admin/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="admin/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="admin/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="admin/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="admin/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="admin/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="admin/assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="admin/assets/js/init/datatables-init.js"></script>



    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table').DataTable();
        } );
    </script>
    <script>
        $(document).ready(function () {
            $("#changePassword").change(function () {
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection
