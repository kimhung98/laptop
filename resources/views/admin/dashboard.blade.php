@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid" style="margin-top: 80px; ">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-cash"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{$tien}}</span>đ</div>
                                    <div class="stat-heading">Doang thu</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-cart"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{$ds}}</span></div>
                                    <div class="stat-heading">Đơn hàng mới</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="pe-7s-browser"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{$ds2}}</span></div>
                                    <div class="stat-heading">Số đơn hoàn thành</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="pe-7s-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{$custom1}}</span></div>
                                    <div class="stat-heading">Khách hàng</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Widgets -->
        <!-- Calender Chart Weather  -->
        <div class="row">
            <div class="col-md-12 col-lg-5">
                <div class="card" style="height: 382px">
                    <div class="card-body">
                        <!-- <h4 class="box-title">Chandler</h4> -->
                        <div class="calender-cont widget-calender">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div><!-- /.card -->
            </div>
        <!-- /Calender Chart Weather -->
            <!-- Orders -->
            <div class="orders" >
                <div class="row">
                    <div class="col-md-12  col-lg-19">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Orders </h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                        <tr>
                                            <th class="serial">STT</th>
                                            <th>ID Order</th>
                                            <th>Tên khách hàng</th>
                                            <th>Tổng tiền</th>
                                            <th>Thời gian đặt</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; ?>
                                        @foreach($order3 as $od)
                                            <tr>
                                                <td class="serial">{{$i}}</td>
                                                <td> {{$od->id}} </td>
                                                <td>  <span class="name">{{$od->customer->Ho}} {{$od->customer->Ten}}</span> </td>
                                                <td> <span style="float: right;">{{number_format($od->TongTien,0)}}</span> </td>
                                                <td><span class="product">{{$od->created_at}}</span></td>
                                                <td>
                                                    <span class="badge badge-complete">{{$od->TrangThai}}</span>
                                                </td>
                                            </tr>
                                            <?php $i++ ?>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div>  <!-- /.col-lg-8 -->
                </div>
            </div>
            <!-- /.orders -->
        </div>
        <div class="row">
                <div class="col-lg-12" style="padding-right: 4% !important;">
                        <div id="bieudo1" data-order="{{ $orderDay }}"></div>
                </div>
        </div>
    </div>
    <!-- .animated -->

    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            var order = $('#bieudo1').data('order');
            var listOfValue = [];
            var listOfYear = [];
            order.forEach(function(element){
                listOfYear.push(element.getDay);
                listOfValue.push(element.So_Don);
            });
            console.log(listOfValue);
            var chart = Highcharts.chart('bieudo1', {

                title: {
                    text: 'Đơn hàng trong 7 ngày'
                },

                subtitle: {
                    text: ''
                },

                xAxis: {
                    categories: listOfYear,
                },

                series: [{
                    type: 'column',
                    colorByPoint: true,
                    data: listOfValue,
                    showInLegend: false
                }]
            });

            $('#plain').click(function () {
                chart.update({
                    chart: {
                        inverted: false,
                        polar: false
                    },
                    subtitle: {
                        text: 'Plain'
                    }
                });
            });

            $('#inverted').click(function () {
                chart.update({
                    chart: {
                        inverted: true,
                        polar: false
                    },
                    subtitle: {
                        text: 'Inverted'
                    }
                });
            });

            $('#polar').click(function () {
                chart.update({
                    chart: {
                        inverted: false,
                        polar: true
                    },
                    subtitle: {
                        text: 'Polar'
                    }
                });
            });
        });

    </script>
@endsection
