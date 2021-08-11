@extends('templates.main')
@section('content')
<link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style1.css" type="text/css">
<style>
.alert-box {
    color: #555;
    border-radius: 10px;
    font-family: Tahoma, Geneva, Arial, sans-serif;
    font-size: 15px;
    padding: 10px 50px 12px 60px;
    margin: 15px;
}
.alert-box span {
    font-weight: bold;
    text-transform: uppercase;
}
.success {
    background: #e9ffd9 ;
    border: 1px solid #a6ca8a;
}
</style>
<div class="container">
    <div id="content">     
    <form action="{{route('dathang1')}}" method="post" class="beta-form-checkout">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    
    <div class="row"> @if(Session::has('thongbao'))<div class="alert-box success "><div><span>&#9989 Success: </span>{{Session::get('thongbao')}}</div></div>@endif</div>
    
            <div class="row">
                <div class="col-sm-6">
                    <h4>Đặt hàng</h4>
                    <div class="space20">&nbsp;</div>

                    <div class="form-block">
                        <label for="name">Họ tên*</label>
                        <input type="text" id="name" name="name" placeholder="Họ tên" required>
                    </div>
                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" id="email" name="email" required placeholder="expample@gmail.com">
                    </div>

                    <div class="form-block">
                        <label for="adress">Địa chỉ*</label>
                        <input type="text" id="address" name="address" placeholder="Street Address" required>
                    </div>
                    

                    <div class="form-block">
                        <label for="phone">Điện thoại*</label>
                        <input type="text" id="phone" name="phone" required>
                    </div>
                    
                    <div class="form-block">
                        <label for="notes">Ghi chú</label>
                        <textarea id="notes" class="note"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                        <div class="your-order-body" style="padding: 0px 10px">
                            <div class="your-order-item">
                                <div>
                                <!--  one item	 -->
                                @if(Session::has('Cart') != null)
                                @foreach (Session::get('Cart')->sanpham as $item)
                                    <div class="media">
                                        <img width="25%" src="{{$item['productInfo']->hinh}}"  alt="" class="pull-left">
                                        <div class="media-body">
                                            <p class="font-large">{{$item['productInfo']->ten_SP}}</p>
                                            {{-- <span class="color-gray your-order-info">Color: Red</span>
                                            <span class="color-gray your-order-info">Size: M</span> --}}
                                            <span class="color-gray your-order-info">Qty: {{$item['quanty']}}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                <!-- end one item -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                                <div class="pull-right"><h5 class="color-black paytotal">${{number_format(Session::get('Cart')->totalPrice)}}</h5></div>
                                {{-- <div class="pull-right"><h5 class="color-black paytotal">${{number_format(totalPrice)}}</h5></div> --}}
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        @endif
                        <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
                        
                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="" >
                                    <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                                    <div class="payment_box payment_method_bacs" style="display: block;">
                                        Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                                    </div>						
                                </li>

                                <li class="payment_method_cheque">
                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="" >
                                    <label for="payment_method_cheque">Chuyển khoản </label>
                                    <div class="payment_box payment_method_cheque" style="display: none;">
                                        Chuyển tiền đến tài khoản sau:
                                        <br>- Số tài khoản: 123 456 789
                                        <br>- Chủ TK: Nguyễn A
                                        <br>- Ngân hàng ACB, Chi nhánh TPHCM
                                    </div>						
                                </li>
                                
                            </ul>
                        </div>
                        <div class="text-center"><button type="submit" class="beta-btn primary payment">Đặt hàng </button ></div>
                    </div> <!-- .your-order -->
                </div>
            </div>
        </form>
    </div> <!-- #content -->
@endsection
<script>
  $('.payment'),click(function(){
    var email = '';
    var phone = '';
    var addres = '';
    var note = $('.note').val();
    var paytotal = '';
    alert(note);

  });
</script>