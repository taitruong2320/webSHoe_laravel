<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shop Shoe &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}" type="text/css">
   

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>



    <link rel="stylesheet" href="{{asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
  </head>
  
  <style>
  .cart-icon:hover .cart-hover {
	opacity: 1;
	visibility: visible;
	top: 60px;
}
  .cart-hover {
    position: absolute;
	right: -70px;
	top: 100px;
	width: 100%;
	background: #ffffff;
	z-index: 99;
	text-align: left;
	padding: 30px;
	opacity: 0;
	visibility: hidden;
	-webkit-box-shadow: 0 13px 32px rgba(51, 51, 51, 0.1);
	box-shadow: 0 13px 32px rgba(51, 51, 51, 0.1);
	-webkit-transition: all 0.3s;
	-o-transition: all 0.3s;
	transition: all 0.3s;
	
	
  left: 200;
	}
  .select-total{
    overflow: hidden;
	border-top: 1px solid #e5e5e5;
	padding-top: 26px;
	margin-bottom: 30px;
  }
  .select-total span {
	font-size: 14px;
	color: #e7ab3c;
	text-transform: uppercase;
	letter-spacing: 0.5px;
	float: left;
}
.select-total h5 {
	color: #e7ab3c;
	float: right;
}

  </style>
  <body>
  
  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="" class="site-block-top-search" id="formSearch" method="POST">
                @csrf
                <button style="display:contents" type="submit"><span class="icon icon-search2"></span></button>
                <input type="text" class="form-control border-0" name="key" id="key" placeholder="Search">
              </form>
              @isset($key)
              <div><h6 style="display: contents;" >Từ khóa tìm kiếm : </h6>
                {{$key}}
              <a href="{{asset('shop')}}">
                <i class="icon icon-times"></i>
              </a>
              </div>
             @endisset
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="{{ route('home') }}" class="js-logo-clone">Shop Shoe</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <li><a href="http://127.0.0.1:8000/logout"><span class="icon icon-person"></span></a></li>
                  <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                  
                  <li class="cart-icon"> 
                      <a href="{{ route('cart') }}" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      @if(Session::has('Cart') != null)
                    <span class="count" id="total-quanty-show" >{{Session::get('Cart')->totalQuanty}}</span>
                      @else
                      <span class="count" id="total-quanty-show">0</span>
                      @endif  
                    </a>
                    {{-- //cart ẩn hover home --}}   
                    <div class="cart-hover" >
                      <div id="change-item-cart" >
                          <div class="select-items">
                            @if(Session::has("Cart") != null)
                              <table>
                                  <tbody>
                                      @foreach (Session::get('Cart')->sanpham as $item)
                                      <tr>       
                                      <td class="si-pic"><img src="{{$item['productInfo']->hinh}}" style="width: 100px; height: 100px" alt=""></td>
                                          <td class="si-text">
                                              <div class="product-selected">
                                              <p>{{number_format($item['productInfo']->gia)}}$ x {{$item['quanty']}}</p>
                                                  <h6>{{$item['productInfo']->ten_SP}}</h6>
                                              </div>
                                          </td>
                                          <td class="si-close">
                                              <a data-id="{{$item['productInfo']->id_SP}}">X</a>
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                              <div class="select-total">
                                  <span>total:</span>
                              <h5>{{number_format(Session::get('Cart')->totalPrice)}}$</h5><br>
                                  <span>Quanty</span>
                              <h5>{{Session::get('Cart')->totalQuanty}}</h5>
                              </div>    
                            @else
                                <span class="count" id="total-quanty-show">Không có sản phẩm</span>
                              @endif
                          </div>

                        </div> 
                  </div>
                  </li> 
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>
          
          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="has-children">
              <a href="{{ route('shop') }}">Shop</a>
              <ul class="dropdown">
                @foreach ($loai_sp as $loai)
                  <li><a href="{{ route('loaisanpham',$loai->id_nhom)}}">{{$loai->ten_nhom}}</a></li>
                @endforeach
              </ul>
            </li>
            {{-- <li><a href="{{ route('shop') }}">Shop</a></li> --}}
            {{-- <li><a href="#">Catalogue</a></li>
            <li><a href="#">New Arrivals</a></li> --}}
            <li><a href="{{ route('contact') }}">Contact</a></li>
          </ul>
        </div>
      </nav>
    </header>

    
    <div class=" content  ">
        @yield('content')
    </div>
    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Sell online</a></li>
                  <li><a href="#">Features</a></li>
                  <li><a href="#">Shopping cart</a></li>
                  <li><a href="#">Store builder</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Mobile commerce</a></li>
                  <li><a href="#">Dropshipping</a></li>
                  <li><a href="#">Website development</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Point of sale</a></li>
                  <li><a href="#">Hardware</a></li>
                  <li><a href="#">Software</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <h3 class="footer-heading mb-4">Promo</h3>
            <a href="#" class="block-6">
              <img src="" alt="Image placeholder" class="img-fluid rounded mb-4">
              <h3 class="font-weight-light  mb-0">Finding Your Perfect Shoes</h3>
              <p>Promo from  nuary 15 &mdash; 25, 2020</p>
            </a>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">203 Fake St. Mountain View, San Francisco, California, Việt Nam</li>
                <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                <li class="email">emailaddress@domain.com</li>
              </ul>
            </div>

            <div class="block-7">
              <form action="#" method="post">
                <label for="email_subscribe" class="footer-heading">Subscribe</label>
                <div class="form-group">
                  <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                  <input type="submit" class="btn btn-sm btn-primary" value="Send">
                </div>
              </form>
            </div>
          </div>
        </div>
        
      </div>
    </footer>
  </div>

  <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{('/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('js/jquery-ui.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('js/aos.js')}}"></script>

  <script src="{{asset('js/main.js')}}"></script>
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    
  </body>
</html>
<script>
  function AddCart(id_SP){
    //console.log(id_SP)
    $.ajax({
      url: '/AddCart/' +id_SP,
      type: 'GET',

    }).done(function(response){
        //console.log(response);
         RenderCart(response);
        alertify.success('Đã thêm sản phẩm thành công');

    });
  }  
  //xóa sp giỏ hàng
   $("#change-item-cart").on("click", ".si-close a " , function(){
   //console.log($(this).data("id"));})
    $.ajax({
      url: '/Delete-Item-Cart/' +$(this).data("id"),
      type: 'GET',

    }).done(function(response){
        RenderCart(response);
        alertify.success('Đã xóa sản phẩm thành công');

     });
   });
    function RenderCart(response){
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        $("#total-quanty-show").text($("#total-quanty-cart").val());
    }


    //search
    $('#key').keyup(function(){
      var key = $('#key').val();
      $('#formSearch').attr('action', '{{ asset('shop/search') }}='+key)
    });
  </script> 