@extends('templates.admin')
@section('main')
<div class="content-wrapper">

    <section class="content">
        <div class="row" style="margin-bottom: 4%;margin-top: 2%">
            <div class="col-12">
              <div class="card">
        <div class=" d-block float-right">
            <div class="panel-heading" style="font-size: x-large;margin-left: 35%;">
                Thông tin khách hàng
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Tên khách hàng</th>
                <th>SĐT</th>
                <th>Địa chỉ</th>
                <th>email</th>
              </tr>
              </thead>
              
              
              <tbody>
              <tr>
                <td>{{$KH->ten}}</td>
                <td>{{$KH->sdt}}</td>
                <td>{{$KH->dia_chi}}</td>
                <td>{{$KH->email}}</td>
              </tr>
        
              </tbody>
             
            </table>
           
          </div>
                      </div>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-12">
                      <div class="card">
                <div class=" d-block float-right">
                {{-- <div class="table-agile-info">
                    <div class="panel panel-default"> --}}
                        <div class="panel-heading" style="font-size: x-large;margin-left: 35%;">
                            Liệt kê chi tiết đơn hàng
                        </div>
                        <div class="card-body">
                            <table   class="table table-bordered table-hover"   >
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 0;
                                    $total = 0;
                                    @endphp
                                    @foreach ($bill_details as $key => $details)
                                    @php
                                    $i ++;
                                    $sub = $details->price*$details->quanty;
                                    $total += $sub;
                                    @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$details->ten_SP}}</td>
                                        <td>{{$details->quanty}}</td>
                                        <td>{{number_format($details->price ,0,',','.')}}đ</td>
                                        <td>{{number_format($sub ,0,',','.')}}đ</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td> Thanh toán: {{number_format($total ,0,',','.')}}đ </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    {{-- </div>
                </div> --}}
            </div>
        </div>
        </div>
        </div>
            </section>
        </div>

        

@endsection