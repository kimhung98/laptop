@extends('admin.layouts.app')
@section('content')

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Sản phẩm</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="admin/home">Dashboard</a></li>
                                <li class="active">Sản phẩm</li>
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
                                <tr align="center">
                                    <th style="text-align: center">ID</th>
                                    <th style="text-align: center">Thể loại</th>
                                    <th style="text-align: center">Loại sản phẩm</th>
                                    <th style="text-align: center">Tên sản phẩm</th>
                                    <th style="text-align: center">Hình ảnh</th>
                                    <th style="text-align: center">Giá tiền</th>
                                    <th style="text-align: center">Giảm giá</th>
                                    <th style="text-align: center">Mô tả</th>
                                    <th style="text-align: center">Số lượng</th>
                                    <th style="text-align: center">Nổi Bật</th>
                                    <th style="text-align: center">Delete</th>
                                    <th style="text-align: center">Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sanpham as $sp)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{$sp->id}}</td>
                                        <td>{{$sp->loaisp->theloai->Ten}}</td>
                                        <td>{{$sp->loaisp->Ten}}</td>
                                        <td>{{$sp->TenSp}}</td>
                                        <td><img src="upload/sanpham/{{$sp->Hinh}}" ></td>
                                        <td>{{$sp->GiaTien}}</td>
                                        <td>{{$sp->GiamGia}}</td>
                                        <td>{{$sp->MoTa}}</td>
                                        <td>
                                            @if($sp->SoLuong <= 0)
                                                {{'Hết hàng'}}
                                            @else
                                                {{$sp->SoLuong}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($sp->NoiBat ==0)
                                                {{'Không'}}
                                            @else
                                                {{'Có'}}
                                            @endif
                                        </td>
                                        <td class="center"><a href="admin/sanpham/xoa/{{$sp->id}}"><i class="fas fa-trash-alt"></i>  Delete</a></td>
                                        <td class="center"><a href="admin/sanpham/sua/{{$sp->id}}"><i class="far fa-edit"></i>  Edit</a></td>
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
