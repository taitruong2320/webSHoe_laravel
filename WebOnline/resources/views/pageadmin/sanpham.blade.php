@extends('templates.admin')
@section('main')
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            
        <div class=" d-block float-right">
            
          <div style="float: left; padding: 10px 21px;">
            <form class="example" action="" style="margin:auto;max-width:300px" id="formSearch" method="POST">
                @csrf
                <input type="text" placeholder="Search.." name="key" id="key" required>
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
              @isset($key)
                  <div><h6 style="display: contents;" >Từ khóa tìm kiếm : </h6>
                    {{$key}}
                  <a href="{{asset('sanpham')}}">
                    <i class="fas fa-times"></i>
                  </a>
                  </div>
              @endisset
            </div>

            <nav class="navbar" style="margin-left:88%;  ">
              <ul class="nav">
                  <button data-toggle="modal" data-target="#add" type="button" class="btn btn-success">Thêm sản phẩm</button>
              </ul>
          </nav> 
        </div>
         <!-- update -->
        <div class="modal fade " id="update" style="">
          <div class="modal-dialog">
              <div class="modal-content">

                  <!-- Modal Header -->
                  <!-- Update -->
                  <div class="modal-header">
                      <h4 class="modal-title">Sửa sản phẩm</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  
                  <div class="modal-body row" >
                      <div class="col-sm-1"></div>  
                      <div class="col-sm-10 row">
                          <form action="{{ asset('/sanpham/update') }}" method="post" enctype="multipart/form-data" class="add row" id="formup">
                              @csrf
                              <strong class="col-sm-5 mt-1">Tên nhóm <span style="float: right">:</span></strong>
                              <select name="tenNhom" id="tenNhom"  style="width: 182px;"  >
                                @foreach ($nhom as $n)
                                <option value="{{$n->id_nhom}}">{{$n->ten_nhom}}</option> 
                                @endforeach
                              </select>
                                
                              <strong class="col-sm-5 mt-1">Tên sản phẩm <span style="float: right">:</span></strong>
                              <input type="text" id="tenSP" name="tenSP" required style="height: 25px;  margin-top: 5px"><br>

                              

                              <strong class="col-sm-5 mt-1">giá <span style="float: right">:</span></strong>
                              <input type="number" id="gia" name="gia" required style="height: 25px;  margin-top: 5px" ><br>

                              <strong class="col-sm-5 mt-1">số lượng <span style="float: right">:</span></strong>
                              <input type="number" id="soLuong" name="soLuong" style="height: 25px;  margin-top: 5px" ><br>

                              <strong class="col-sm-5 mt-1">hình <span style="float: right">:</span></strong>
                               <div class="input-group">
                               <span class="input-group-btn">
                                 <a id="lfm1" data-input="thumbnail1" data-preview="holder" class="btn btn-primary">
                                   <i class="fa fa-picture-o"></i> Choose
                                 </a>
                               </span>
                               <input id="thumbnail1" class="form-control" type="text" name="filepath">
                               
                               <div id="holder1">
                                <img  style="margin-top:15px;max-height:100px;">
                               </div>
                             </div>
                              
                              <strong class="col-sm-5 mt-1">id NCC <span style="float: right">:</span></strong>
                              <select name="tenNCC" id="tenNCC"  style="width: 182px;"  >
                                @foreach ($nhacc as $ncc)
                                <option value="{{$ncc->id_nhaCC}}">{{$ncc->ten_nhaCC}}</option> 
                                @endforeach
                              </select>
                          
                      </div>
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                      
                      <input type="submit" class="btn btn-dark"  value="Sửa">
                      <button type="button" class="btn btn-dark" data-dismiss="modal">Hủy</button>
                  </div>
                  </form>
              </div>
          </div>
      </div>
        <!-- thêm sản phẩm -->
        <div class="modal fade " id="add">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm sản phẩm</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body row" id="">
                        <div class="col-sm-1"></div>  
                        <div class="col-sm-10 row">
                            <form action="{{ asset('/sanpham') }}" method="post" class="add row" id="">
                                @csrf
                                <strong class="col-sm-5 mt-1">Tên nhóm <span style="float: right">:</span></strong>
                               
                                <select name="idNhom"  style="width: 182px;"  >
                                  @foreach ($nhom as $nhom)
                                  <option value="{{$nhom->id_nhom}}">{{$nhom->ten_nhom}}</option> 
                                  @endforeach
                                </select>
                                  
                                 

                                <strong class="col-sm-5 mt-1">Tên sản phẩm <span style="float: right">:</span></strong>
                                <input type="text"  name="tenSP" required style="height: 25px;  margin-top: 5px"><br>

                                

                                <strong class="col-sm-5 mt-1">giá <span style="float: right">:</span></strong>
                                <input type="number"  name="gia" required style="height: 25px;  margin-top: 5px" ><br>

                                <strong class="col-sm-5 mt-1">số lượng <span style="float: right">:</span></strong>
                                <input type="number"  name="soLuong" style="height: 25px;  margin-top: 5px" ><br>

                                <strong class="col-sm-5 mt-1">hình <span style="float: right">:</span></strong>
                                <div class="input-group">
                                  <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                      <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                  </span>
                                  <input id="thumbnail" class="form-control" type="text" name="filepath">
                                  
                                  <div id="holder">
                                   <img  style="margin-top:15px;max-height:100px;">
                                  </div>
                                </div>    
                                
                                
                                <strong class="col-sm-5 mt-1">Tên NCC <span style="float: right">:</span></strong>
                                
                                <select name="idNCC"  style="width: 182px;"  >
                                  @foreach ($nhacc as $nhacc)
                                  <option value="{{$nhacc->id_nhaCC}}">{{$nhacc->ten_nhaCC}}</option> 
                                  @endforeach
                                </select>
                            
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        
                        <input type="submit" class="btn btn-dark"  value="Thêm">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Hủy</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên nhóm </th>
                  <th>Tên sản phẩm</th>
                  <th>giá</th>
                  <th>số lượng </th>
                  <th>hình </th>
                  <th>Tên NCC </th>
                  <th>action</th> 
                </tr>
                </thead>
                @foreach($sanphams as $key => $sanpham)
                <tbody>
                <tr>
                  <td>{{$key + 1}}</td>
                  <td>{{$sanpham->ten_nhom}}</td>
                  <td>{{$sanpham->ten_SP}}</td>
                  <td>{{$sanpham->gia}}</td>
                  <td>{{$sanpham->so_luong}}</td>

                  <td style="width: 10%;">
                  <img src="{{$sanpham->hinh}}" alt=""  style="width: 50%;">
                  </td>

                  <td>{{$sanpham->ten_nhaCC}}</td>
                  

                  <td>
                    <button style="background-color: DodgerBlue;border: none;color: white;padding: 12px 16px; font-size: 16px; cursor: pointer;float:left;" 
                    data-toggle="modal" data-target="#update" class="a" data-id="{{ $sanpham->id_SP }}"   
                    data-namenhom="{{$sanpham->ten_nhom}}" data-ten="{{$sanpham->ten_SP}}"  data-gia="{{$sanpham->gia}}"  
                    data-sl="{{$sanpham->so_luong}}" data-img="{{$sanpham->hinh}}"  data-nameNCC="{{$sanpham->ten_nhaCC}}">
                      <i class="fa fa-edit" ></i>
                    </button>
                    <form action="" id="form" method="POST">
                      @csrf
                    </form>
                    &nbsp 
                      <button class="delete" data-toggle="modal" data-target="#delete" data-id="{{$sanpham->id_SP}}" style="background-color: rgb(255, 30, 30);border: none;color: white;padding: 12px 16px; font-size: 16px; cursor: pointer;">
                        <i class="fa fa-trash" ></i></button>
                </td>
                
                  
                </tr>
                
               
                </tbody>
                @endforeach
              </table>
              <div style="margin-top: 1%;">
                {!! $sanphams ->links() !!}
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="modal fade" id="delete">
            <div class="modal-dialog">
              <div class="modal-content bg-danger">
                <div class="modal-header">
                  <h4 class="modal-title">Xóa  ??</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" id="formDelete" method="post">
                  @csrf
                <div class="modal-body">
                <p class="text-center">
                  Bạn chắc chắn muốn xóa ??
                </p>
                    <input type="hidden" name="category_id" id="cat_id" value="">
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-warning">Yes</button>
                  <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
                </div>
              </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
        </div>
      </div>
      </section>
      </div>
      
          @endsection

@section('js')

<script>
  $(document).ready(function(){
    //update
    $('.a').click(function(){
     
      var ten = $(this).data('namenhom');
        $('#tenNhom').find('option').each(function(i,e){
            if($(e).text() == ten){ 
                $('#tenNhom').prop('selectedIndex',i);
            }
        });
      $('#tenSP').val($(this).data('ten'));
      $('#gia').val($(this).data('gia'));
      $('#soLuong').val($(this).data('sl'));
      $('#lfm1').val($(this).data('img'));
      
      var ten = $(this).data('nameNCC');
        $('#tenNCC').find('option').each(function(i,e){
            if($(e).text() == ten){ 
                $('#tenNCC').prop('selectedIndex',i);
            }
        });
      var idSP = $(this).data("id");
      $('#formup').attr('action', '{{ asset('/sanpham/update') }}/'+idSP);
    })


 //delete
 $('.delete').click(function(){
      var id = $(this).data('id');
      $('#formDelete').attr('action', '{{asset('sanpham/delete')}}/'+id);
    });


    var route_prefix = "{{asset('/filemanager')}}";
  $('#lfm').filemanager('image', {prefix: route_prefix});
  $('#lfm1').filemanager('image', {prefix: route_prefix});
  //  $('#lfm').filemanager('image');
  });

        //search
    $('#key').keyup(function(){
      var key = $('#key').val();
      $('#formSearch').attr('action', '{{ asset('sanpham/search') }}='+key)
    }); 
</script>        
@endsection