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
                                <form action="admin/sanpham/them" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        <label>Thể loại</label>
                                        <select class="form-control" name="TheLoai" id="TheLoai">
                                            @foreach($theloai as $tl)
                                                <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Loại tin</label>
                                        <select class="form-control" name="LoaiSp" id="LoaiSp">

                                            @foreach($loaisp as $lt)
                                                <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input class="form-control" name="TenSp" placeholder="Nhập tên sản phẩm..." />
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <input type="file" name="Hinh" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Giá tiền</label>
                                        <input class="form-control" name="GiaTien" placeholder="Nhập giá tiền sản phẩm..." />
                                    </div>
                                    <div class="form-group">
                                        <label>Giảm giá</label>
                                        <input class="form-control" name="GiamGia" value="0" placeholder="Nhập số tiền giảm giá sản phẩm..." />
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea name="MoTa" id="demo" class="form-control ckeditor" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Số lượng</label>
                                        <input class="form-control" name="SoLuong" placeholder="Nhập số lượng của sản phẩm..." />
                                    </div>
                                    <div class="form-group">
                                        <label>Nổi bật</label>
                                        <label class="radio-inline">
                                            <input name="NoiBat" value="0" checked="" type="radio">Không
                                        </label>
                                        <label class="radio-inline">
                                            <input name="NoiBat" value="1" type="radio">Có
                                        </label>
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
    <script>
        $(document).ready(function () {
            $("#TheLoai").change(function () {
                var idTheLoai = $(this).val();
                $.get("admin/ajax/loaisp/"+idTheLoai,function (data) {
                    $("#LoaiSp").html(data);
                });
            });
        });
    </script>

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
