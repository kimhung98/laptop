@extends('admin.layouts.app')
@section('content')

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Order</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="admin/home">Dashboard</a></li>
                                <li class="active">Order</li>
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
                            <small>{{$order->id}}</small>
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
                                <form action="admin/customer/sua/{{$order->id}}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        <label>ID khách hàng</label>
                                        <input class="form-control" name="KhachHang" placeholder="Nhập tên khách hàng..." value="{{$order->idCustomer}}" readonly=""/>
                                    </div>
                                    <div class="form-group">
                                        <label>Tổng tiền</label>
                                        <input class="form-control" name="TongTien" placeholder="Nhập tên slide..." value="{{$order->TongTien}}" readonly=""/>
                                    </div>
                                    <div class="form-group">
                                        <label>Thời gian</label>
                                        <input class="form-control" name="ThoiGian" placeholder="Nhập tên slide..." value="{{$order->updated_at}}" readonly=""/>
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng Thái</label>
                                        <select class="form-control" name="TrangThai">
                                            @if($order->TrangThai == 'Completed')
                                                <option value="{{$order->TrangThai}}">{{$order->TrangThai}}</option>
                                                <option value="Cancel">Cancel</option>
                                            @else
                                                <option value="{{$order->TrangThai}}">{{$order->TrangThai}}</option>
                                                <option value="Completed">Completed</option>
                                                <option value="Cancel">Cancel</option>
                                            @endif
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-default"> Lưu</button>
                                    <button type="reset" class="btn btn-default"> Làm mới</button>
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
@endsection
