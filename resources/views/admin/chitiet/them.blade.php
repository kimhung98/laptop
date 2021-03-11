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
                            <strong class="card-title">Thêm</strong>
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
                                <form action="admin/chitiet/them" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <select class="form-control" name="SanPham">
                                            @foreach($sanpham as $sp)
                                                @if($sp->loaisp->theloai->id == 1)
                                                    <option value="{{$sp->id}}">{{$sp->TenSp}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>CPU</label>
                                        <input class="form-control" name="CPU" placeholder="Nhập thông tin..." />
                                    </div>
                                    <div class="form-group">
                                        <label>RAM</label>
                                        <input class="form-control" name="RAM" placeholder="Nhập thông tin..." />
                                    </div>
                                    <div class="form-group">
                                        <label>Ổ cứng</label>
                                        <input class="form-control" name="OCung" placeholder="Nhập thông tin..." />
                                    </div>
                                    <div class="form-group">
                                        <label>Màn hình</label>
                                        <input class="form-control" name="ManHinh" placeholder="Nhập thông tin..." />
                                    </div>
                                    <div class="form-group">
                                        <label>Thiết kế</label>
                                        <input class="form-control" name="ThietKe" placeholder="Nhập thông tin... "/>
                                    </div>
                                    <div class="form-group">
                                        <label>Kích thước</label>
                                        <input class="form-control" name="KichThuoc" placeholder="Nhập thông tin..." />
                                    </div>
                                    <div class="form-group">
                                        <label>Năm ra mắt</label>
                                        <input class="form-control" name="NamRaMat" placeholder="Nhập thông tin..." />
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <input type="file" name="Hinh1" class="form-control">
                                        <input type="file" name="Hinh2" class="form-control">
                                        <input type="file" name="Hinh3" class="form-control">
                                        <input type="file" name="Hinh4" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-default"> Thêm</button>
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
