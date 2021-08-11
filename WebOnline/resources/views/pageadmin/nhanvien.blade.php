@extends('templates.admin')
@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nhân Viên</h1>
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
          <!-- .formupdate -->
          <div class="modal fade " id="update">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Sửa nhân viên : </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body row " >
                        <div class="col-sm-10 row">
                          
                          
                             
                          <form action="{{ asset('/nhanvien/update') }}" method="post" class="row" id="formup" >
                            @csrf
                                <strong class="col-sm-5 mt-2">Tên nhân viên <span style="float: right">:</span></strong>
                                <input type="text" id="tenNV" name="tenNV"  style="height: 25px; margin-top: 5px" required ><br>
                                
                                <strong class="col-sm-5 mt-2">Tên bộ phận <span style="float: right">:</span></strong>
                                 <select id="maBP" name="maBP" style="width:182px;" >
                                    @foreach ($bophan as $b)
                                    <option value="{{$b->id_BP}}">{{$b->ten_BP}}</option> 
                                    @endforeach
                                </select> 

                                <strong class="col-sm-5 mt-2">Ngày sinh <span style="float: right">:</span></strong>
                                <input type="date" id="ngaysinh" name="ngaysinh" style="height: 25px; margin-top: 5px" required ><br>

                                <strong class="col-sm-5 mt-2">Địa chỉ <span style="float: right">:</span></strong>
                                <input type="text" id="diachi" name="diachi"  style="height: 25px; margin-top: 5px" required><br>

                                <strong class="col-sm-5 mt-2">SĐT <span style="float: right">:</span></strong >
                                <input type="text" id="sdt" name="sdt"  style="height: 25px; margin-top: 5px" required><br>

                                <strong class="col-sm-5 mt-2 ">Password <span style="float: right">:</span></strong>
                                <input type="text" id="pass" name="pass"  style="height: 25px;  margin-top: 5px" required ><br>

                                <strong class="col-sm-5 mt-2">Chức vụ <span style="float: right">:</span></strong>
                                <select id="chucvu" name="chucvu" style="width:182px;" >
                                  @foreach ($roles as $r)
                                  <option value="{{$r->id_roles}}">{{$r->name}}</option> 
                                  @endforeach
                              </select> 

                                
                        </div>
                        
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success"  value="Sửa">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.formupdate -->
        <!-- .formAdd -->
        <div class=" d-block float-right">
          {{-- .search NV --}}
        <div style="float: left; padding: 10px 21px;">
        <form class="example" action="" style="margin:auto;max-width:300px" id="formSearch" method="POST">
            @csrf
            <input type="text" placeholder="Search.." name="key" id="key" required>
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
          @isset($key)
              <div><h6 style="display: contents;" >Từ khóa tìm kiếm : </h6>
                {{$key}}
              <a href="{{asset('nhanvien')}}">
                <i class="fas fa-times"></i>
              </a>
              </div>
          @endisset
        </div>
          {{-- /.search NV --}}
            <nav class="navbar" style="margin-left:90%;  ">
                <ul class="nav">
                    <button data-toggle="modal" data-target="#add" type="button" class="btn btn-success">Thêm nhân viên</button>
                </ul>
            </nav> 
        </div>
        <div class="modal fade " id="add">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm nhân viên</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body row" id="">
                        <div class="col-sm-1"></div>  
                        <div class="col-sm-10 row">
                            <form action="{{ asset('/nhanvien') }}" method="post" class="add row">
                                @csrf

                                <strong class="col-sm-5 mt-1">Tên nhân viên <span style="float: right">:</span></strong>
                                <input type="text" name="tennhanvien" style="height: 25px;  margin-top: 5px" required><br>

                                <strong class="col-sm-5 mt-1">Mã bộ phận <span style="float: right">:</span></strong>
                                
                                <select name="idBP"  >
                                  @foreach ($bophan as $bophan)
                                  <option value="{{$bophan->id_BP}}">{{$bophan->ten_BP}}</option> 
                                  @endforeach
                                </select> 
                                
                                <strong class="col-sm-5 mt-1">Ngày sinh <span style="float: right">:</span></strong>
                                <input type="date" name="ngaysinh" style="height: 25px;  margin-top: 5px" required><br>

                                <strong class="col-sm-5 mt-1">Địa chỉ <span style="float: right">:</span></strong>
                                <input type="text" name="diachi" style="height: 25px;  margin-top: 5px"required ><br>

                                <strong class="col-sm-5 mt-1">SĐT <span style="float: right">:</span></strong>
                                <input type="text" name="sdt" style="height: 25px;  margin-top: 5px" required><br>

                                <strong class="col-sm-5 mt-1">Pass <span style="float: right">:</span></strong>
                                <input type="text" name="pass" style="height: 25px;  margin-top: 5px" required><br>

                                <strong class="col-sm-5 mt-1">Chức vụ <span style="float: right">:</span></strong>
                                
                                <select name="idrole"  >
                                  @foreach ($roles as $roles)
                                  <option value="{{$roles->id_roles}}">{{$roles->name}}</option> 
                                  @endforeach
                                </select> 

                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        
                        <input type="submit" class="btn btn-success"  value="Thêm">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                    </div>
                    </form>
                </div>
            </div>
            <!-- /.formAdd -->
        </div
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên nhân viên</th>
                  <th>Mã bộ phận</th>
                  <th>Ngày sinh</th>
                  <th>Địa chỉ </th>
                  <th>SĐT </th>
                  <th>Pass </th>
                  <th>Chức vụ </th>
                 
                  <th>Action </th>
                  
                </tr>
                </thead>
                @foreach($nhanviens as $key => $nhanvien)
                <tbody>
                <tr>
                  <td>{{$key + 1}}</td>
                  {{-- <td>{{$nhanvien->id_NV}}</td> --}}
                  <td>{{$nhanvien->ten}}</td>
                  <td >{{$nhanvien->ten_BP}}</td>
                  <td >{{$nhanvien->ngay_sinh}}</td>
                  <td>{{$nhanvien->dia_chi}}</td>
                  <td >{{$nhanvien->sdt}}</td>
                  <td >{{$nhanvien->pass}}</td>
                  <td >{{$nhanvien->name}}</td>
                 
                  <td>
                      <button style="background-color: DodgerBlue;border: none;color: white;padding: 12px 16px; font-size: 16px; cursor: pointer;float:left;" 
                        data-toggle="modal" data-target="#update" class="a" data-id="{{ $nhanvien->id_NV }}"  data-name="{{$nhanvien->ten}}"  
                        data-tenbp="{{$nhanvien->ten_BP}}" data-bday="{{$nhanvien->ngay_sinh}}"  data-adress="{{$nhanvien->dia_chi}}" 
                        data-phone="{{$nhanvien->sdt}}" data-password="{{$nhanvien->pass}}" data-role="{{$nhanvien->name}}">
                        <i class="fa fa-edit" ></i>
                      </button>
                      <form action="" id="form" method="POST">
                        @csrf
                      </form>
                      &nbsp 
                      <button class="delete" data-toggle="modal" data-target="#delete"
                       data-id="{{$nhanvien->id_NV}}" style="background-color: rgb(255, 30, 30);border: none;color: white;padding: 12px 16px; font-size: 16px; cursor: pointer;">
                        <i class="fa fa-trash" ></i>
                      </button>
                  </td>
                </tr>
               
                </tbody>
                @endforeach
                
              </table>
              <div style="margin-top: 1%;">
              {!! $nhanviens ->links() !!}
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          {{-- /.Model delete --}}
          
          <div class="modal fade" id="delete">
            <div class="modal-dialog">
              <div class="modal-content bg-danger">
                <div class="modal-header">
                  <h4 class="modal-title">Xóa nhân viên </h4> 
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" method="post" id="formDelete">
                    @csrf
                  <div class="modal-body">
                    <p class="text-center">
                      Bạn có chắc chắn muốn xóa
                    </p>
                      <input type="hidden" name="category_id" id="cat_id" value="">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
                    <button type="submit" class="btn btn-warning">Yes, Delete</button>
                  </div>
              </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
@endsection
          

@section('js')

  <script>  
    $(document).ready(function(){
      //update
      $('.a').click(function(){
        $('#tenNV').val($(this).data('name'));

        var ten = $(this).data('tenbp');
        $('#maBP').find('option').each(function(i,e){
            if($(e).text() == ten){ 
                $('#maBP').prop('selectedIndex',i);
            }
        });
        $('#ngaysinh').val($(this).data('bday'));
        $('#diachi').val($(this).data('adress'));
        $('#sdt').val($(this).data('phone'));
        $('#pass').val($(this).data('password'));
        var ten = $(this).data('role');
        $('#chucvu').find('option').each(function(i,e){
            if($(e).text() == ten){ 
                $('#chucvu').prop('selectedIndex',i);
            }
        });
      
        var idNV = $(this).data("id");

        $('#formup').attr('action', '{{ asset('/nhanvien/update') }}/'+idNV);
      })
    });

        //search
    $('#key').keyup(function(){
      var key = $('#key').val();
      $('#formSearch').attr('action', '{{ asset('nhanvien/search') }}='+key)
    });

        //delete
    $('.delete').click(function(){
      var id = $(this).data('id');
      $('#formDelete').attr('action', '{{asset('nhanvien/delete')}}/'+id);
    });



  </script>
@endsection


