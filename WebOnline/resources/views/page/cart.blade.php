@extends('templates.main')
@section('content')
<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong
          class="text-black">Cart</strong></div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row mb-5">
      <form class="col-md-12" method="post" >
        <div id= "list-cart" >
          <div class="site-blocks-table">
            @if(Session::has('Cart') != null)
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="product-thumbnail">Image</th>
                  <th class="product-name">Product</th>
                  <th class="product-price">Price</th>
                  <th class="product-quantity">Quantity</th>
                  <th class="product-total">Total</th>
                  <th class="product-remove">Save</th>
                  <th class="product-remove">Remove</th>

                </tr>
              </thead>
              <tbody>
                
                
                @foreach (Session::get('Cart')->sanpham as $item)
                <tr>
                  <td class="product-thumbnail">
                    <img src="{{$item['productInfo']->hinh}}" alt="Image" class="img-fluid">
                  </td>
                  <td class="product-name">
                    <h2 class="h5 text-black">{{$item['productInfo']->ten_SP}}</h2>
                  </td>
                  <td>${{number_format($item['productInfo']->gia) }}</td>
                  <td style="width: 15%;">
                    <div class="input-group mb-3" style="max-width: 120px;">
                      <div class="input-group-prepend">
                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                      </div>
                      <input type="text" id="quanty-item-{{$item['productInfo']->id_SP}}" class="form-control text-center" value="{{$item['quanty']}}" placeholder=""
                        aria-label="Example text with button addon" aria-describedby="button-addon1">
                      <div class="input-group-append">
                        <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                      </div>
                    </div>

                  </td>
                  <td>${{number_format($item['price'])}}</td>
                  <!-- <td><a href="#" class="btn btn-primary btn-sm">X</a></td> -->
                  <td><a  class="btn btn-primary btn-sm" onclick="SaveListItemCart( {{$item['productInfo']->id_SP}}) ;">V</a></td>
                  <td><a  class="btn btn-primary btn-sm" onclick="DeleteListItemCart( {{$item['productInfo']->id_SP}});">X</a></td>
                  
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>
          
        </div>
        
      </form>
    </div>
  

    <div class="row">
      <div class="col-md-6">
        <div class="row mb-5">
          <div class="col-md-6 mb-3 mb-md-0">
            <button class="btn btn-primary btn-sm btn-block">Update Cart</button>
          </div>
          <div class="col-md-6">
            <button class="btn btn-outline-primary btn-sm btn-block">Continue Shopping</button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label class="text-black h4" for="coupon">Coupon</label>
            <p>Enter your coupon code if you have one.</p>
          </div>
          <div class="col-md-8 mb-3 mb-md-0">
            <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
          </div>
          <div class="col-md-4">
            <button class="btn btn-primary btn-sm">Apply Coupon</button>
          </div>
        </div>
      </div>
      <div class="col-md-6 pl-5">
        <div class="row justify-content-end">
          <div class="col-md-7">
            <div class="row">
              <div class="col-md-12 text-right border-bottom mb-5">
                <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
              </div>
            </div>
            <div class="row mb-3">
            </div>
            <div class="row mb-5">
              <div class="col-md-6">
                <span class="text-black">Total Quanty</span>
              </div>
              <div class="col-md-6 text-right">
                <h5>{{Session::get('Cart')->totalQuanty}}</h5>
              </div>
              <div class="col-md-6">
                <span class="text-black">Total</span>
              </div>
              <div class="col-md-6 text-right">
                <h5>{{number_format(Session::get('Cart')->totalPrice)}}$</h5>
              </div>
            </div>
            
            

            <div class="row">
              
              <div class="col-md-12">
              <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='{{Route('dathang')}}'">Proceed
                  To Checkout</button>
             
              </div>
            </div>
            @else
            <span class="count" id="total-quanty-show">Không có sản phẩm</span>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
<script>
  
  function DeleteListItemCart(id_SP){
    $.ajax({
      url: '/Delete-Item-List-Cart/' +id_SP,
      type: 'GET',

    }).done(function(response){
       RenderListCart(response);
       alertify.success('Đã xóa sản phẩm thành công');

    });
    // console.log(id_SP);
  }
   function SaveListItemCart(id_SP){
   
   // console.log($("#quanty-item-"+id_SP).val());
    $.ajax({
      url: '/Save-Item-List-Cart/' +id_SP+'/'+$("#quanty-item-"+id_SP).val(),
      type: 'GET',

    }).done(function(response){
        // console.log(response);
        RenderListCart(response);
         alertify.success('Đã cập nhật sản phẩm thành công');

    });
 
    }
  function RenderListCart(response){
    
        $("#list-cart").empty();
        $("#list-cart").html(response);
        
  }
</script>