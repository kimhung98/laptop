@extends('admin.layouts.app')
@section('header')
    <style>
        #bootstrap-data-table-export_length{
            display: none !important;
        }
        #bootstrap-data-table-export_filter{
            display: none !important;
        }
        #bootstrap-data-table-export_paginate{
            display: none !important;
        }
        #bootstrap-data-table-export_info{
            display: none !important;
        }

    </style>
@endsection
@section('content')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered baocao">
                                <thead>
                                    <th style="text-align: center">Báo cáo doanh thu tháng {{$thang}}</th>
                                    <th></th>

                                </thead>
                                <tbody>
                                <tr>
                                    <td>Số lượng đơn hàng trong tháng (đơn)</td>
                                    <td>{{$sodon}}</td>
                                </tr>
                                <tr>
                                    <td>Số sản phẩm bán ra (sản phẩm)</td>
                                    <td>{{$SoLuong}}</td>
                                </tr>
                                <tr>
                                    <td>Tổng doanh thu (VND)</td>
                                    <td>{{number_format($tong,0)}}</td>
                                </tr>
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
            $('#bootstrap-data-table-export').DataTable();
        } );
    </script>
@endsection
