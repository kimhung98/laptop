@extends('admin.layouts.app')
@section('content')

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Chi tiết</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="admin/home">Dashboard</a></li>
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
                            <strong class="card-title">Danh sách</strong>
                        </div>
                        <div class="card-body">
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}
                                </div>
                            @endif
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr align="center" style="text-align: center">
                                    <th style="text-align: center">ID</th>
                                    <th style="text-align: center">Tên sản phẩm</th>
                                    <th style="text-align: center">CPU</th>
                                    <th style="text-align: center">RAM</th>
                                    <th style="text-align: center">Ổ cứng</th>
                                    <th style="text-align: center">Màn Hình</th>
                                    <th style="text-align: center">Thiết kế</th>
                                    <th style="text-align: center">Kích thước</th>
                                    <th style="text-align: center">Năm ra mắt</th>
                                    <th style="text-align: center">Hình ảnh</th>
                                    <th style="text-align: center">Delete</th>
                                    <th style="text-align: center">Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($chitiet as $ct)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{$ct->id}}</td>
                                        <td>{{$ct->sanpham->TenSp}}</td>
                                        <td>{{$ct->CPU}}</td>
                                        <td>{{$ct->RAM}}</td>
                                        <td>{{$ct->OCung}}</td>
                                        <td>{{$ct->ManHinh}}</td>
                                        <td>{{$ct->ThietKe}}</td>
                                        <td>{{$ct->KichThuoc}}</td>
                                        <td>{{$ct->NamRaMat}}</td>
                                        <td>
                                            <p><img width="100px" src="upload/chitiet/{{$ct->Hinh1}}" ></p>
                                            <p><img width="100px" src="upload/chitiet/{{$ct->Hinh2}}" ></p>
                                            <p><img width="100px" src="upload/chitiet/{{$ct->Hinh3}}" ></p>
                                            <p><img width="100px" src="upload/chitiet/{{$ct->Hinh4}}" ></p>
                                        </td>
                                        <td class="center"><a href="admin/chitiet/xoa/{{$ct->id}}"><i class="fas fa-trash-alt"></i>  Delete</a></td>
                                        <td class="center"><a href="admin/chitiet/sua/{{$ct->id}}"><i class="far fa-edit"></i>  Edit</a></td>
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

