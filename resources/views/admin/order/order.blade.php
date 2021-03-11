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
                            <strong class="card-title">Danh sách</strong>
                            <div class="float-right">
                                <a href="admin/baocao">
                                    <button class="btn btn-outline-secondary" style="height: 30px; padding: 0px;">Xuất báo cáo</button>
                                </a>
                            </div>
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
                                    <th style="text-align: center">Khách hàng</th>
                                    <th style="text-align: center">Tổng tiền</th>
                                    <th style="text-align: center">Thời gian</th>
                                    <th style="text-align: center">Trạng thái</th>
                                    <th style="text-align: center">Edit</th>
                                    <th style="text-align: center">Chi tiết</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order as $od)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{$od->id}}</td>
                                        <td>{{$od->customer->Ho}} {{$od->customer->Ten}}</td>
                                        <td>{{number_format ($od->TongTien,0,'',',')}}₫</td>
                                        <td>{{$od->updated_at}}</td>
                                        <td>{{$od->TrangThai}}</td>
                                        <td class="center"><a href="admin/customer/sua/{{$od->id}}"><i class="far fa-edit"></i>  Edit</a></td>
                                        <td class="center"><a href="admin/customer/order/{{$od->id}}"><i class="fas fa-info-circle"></i>  Chi tiết</a></td>
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
