@extends('templates.admin')
@section('main')
<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <div class="col-12">
              <div class="card">
        <div class=" d-block float-right">
            
            <div style="float: left; padding: 10px 21px;">
              {{-- <form class="example" action="" style="margin:auto;max-width:300px" id="formSearch" method="POST">
                  @csrf
                  <input type="text" placeholder="Search.." name="key" id="key" required>
                  <button type="submit"><i class="fa fa-search"></i></button>
                </form> --}}
               
              </div>
  
              <nav class="navbar" style="margin-left:88%;  ">
                <ul class="nav">
                    <button data-toggle="modal" data-target="#add" type="button" class="btn btn-success">Thêm sản phẩm</button>
                </ul>
            </nav> 
          </div>

          <div class="modal fade " id="add">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm sản phẩm</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body row" id="formDiem">
                        <div class="col-sm-1"></div>  
                        <div class="col-sm-10 row">
                            <form action="{{ asset('/img') }}" method="post" class="add row" id="">
                                @csrf
                                

                               

                                  
                                 

                                

                                

                                

                                

                                <strong class="col-sm-5 mt-1">hình <span style="float: right">:</span></strong>
                                <div class="input-group">
                                  <span class="input-group-btn">
                                    <a id="cho" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                      <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                  </span>
                                  <input id="thumbnail" class="form-control" type="text" name="filepath">
                                  
                                  <div id="holder">
                                   <img  style="margin-top:15px;max-height:100px;">
                                  </div>
                                </div>    
                                
                                
                                <strong class="col-sm-5 mt-1">Tên sp <span style="float: right">:</span></strong>
                                
                                <select name="idSP"  style="width: 182px;"  >
                                    @foreach ($sanpham as $sanpham)
                                    <option value="{{$sanpham->id_SP}}">{{$sanpham->id_SP}}</option> 
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


    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
      <thead>
      <tr>
        <th>STT</th>
        <th>IMG</th>
        <th>Tên sản phẩm</th>
        
        <th>action</th> 
      </tr>
      </thead>
      @foreach($imgs as $key => $img)
      <tbody>
      <tr>
        <td>{{$key + 1}}</td>
        
        
        

        <td style="width: 10%;">
        <img src="{{$img->image}}" alt=""  style="width: 50%;">
        </td>

        <td>{{$img->ten_nhom}}</td>
        

       
      
        
      </tr>
      
     
      </tbody>
      @endforeach
    </table>
    <div style="margin-top: 1%;">
      {{-- {!! $sanphams ->links() !!} --}}
      </div>
  </div>
              </div>
            </div>
        </div>
    
    </section>
</div> 
@endsection
@section('js')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
 




    var route_prefix = "{{asset('/filemanager')}}";
  $('#cho').filemanager('image', {prefix: route_prefix});
  
  //  $('#lfm').filemanager('image');
  

        //search
    
</script>        
@endsection