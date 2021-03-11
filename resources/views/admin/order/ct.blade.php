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
                                <li><a href="admin/customer/order">Order</a></li>
                                <li class="active">Chi tiết</li>
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
                            <strong class="card-title">Chi tiết</strong>
                        </div>
                        <div class="card-body">
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}
                                </div>
                            @endif
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr align="center">
                                    <th style="text-align: center">ID</th>
                                    <th style="text-align: center">ID Đơn Hàng</th>
                                    <th style="text-align: center">Tên khách hàng</th>
                                    <th style="text-align: center">Tên Sản Phẩm</th>
                                    <th style="text-align: center">Hình ảnh</th>
                                    <th style="text-align: center">Số Lượng</th>
                                    <th style="text-align: center">Tổng Tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order_ct as $od)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{$od->id}}</td>
                                        <td>{{$od->idOrder}}</td>
                                        <td>{{$od->order->customer->Ho}} {{$od->order->customer->Ten}}</td>
                                        <td>{{$od->TenSp}}</td>
                                        <td><img width="200px" src="upload/sanpham/{{$od->sanpham->Hinh}}"></td>
                                        <td>{{$od->SoLuong}}</td>
                                        <td>{{$od->order->TongTien}}đ</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
