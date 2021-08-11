@extends('templates.admin')
@section('main')
<div class="content-wrapper">

    <section class="content">
        <div class="row" style="margin-top: 2%;" >
            <div class="col-12">
              <div class="card">
        <div class=" d-block float-right">
          <div class="panel-heading" style="font-size: x-large;margin-left: 40%;">
            Liệt kê đơn hàng
        </div>
         
     
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
      <thead>
      <tr>
        <th>STT</th>
        <th>Mã đơn hàng</th>
        <th>Tình trạng đơn hàng</th>
        
        
        <th>action</th> 
      </tr>
      </thead>
      @php
       $i = 0;   
      @endphp
      @foreach($bill as $key => $bil)
      @php
      $i ++;
      @endphp
      <tbody>
      <tr>
        <td>{{$i}}</td>
        <td> {{$bil->id_bill}}</td>
        <td>@if($bil->note == 1)
             Đơn hàng mới
            @else
             Đã xử lý
            @endif
        </td>
        <td>
          <a href="{{URL::to('/view-order/' . $bil->id_bill)}}" ><i class="fa fa-eye"></i></a>
        </td>
      </tr>

      </tbody>
      @endforeach
    </table>
   
  </div>
              </div>
            </div>
        </div>
        </div>
    
    </section>
</div>
@endsection
