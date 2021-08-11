@if(Session::has("Cart") != null)
<table>
    <tbody>
        @foreach (Session::get('Cart')->sanpham as $item)
        <tr>       
        <td class="si-pic"><img src="{{$item['productInfo']->hinh}}"style="height: 10%" alt=""></td>
            <td class="si-text">
                <div class="product-selected">
                <p>{{number_format($item['productInfo']->gia)}}$ x {{$item['quanty']}}</p>
                    <h6>{{$item['productInfo']->ten_SP}}</h6>
                </div>
            </td>
            <td class="si-close">
                <a  data-id="{{$item['productInfo']->id_SP}}">X</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="select-total">
    <span>total:</span>
<h5>{{number_format(Session::get('Cart')->totalPrice)}}$</h5><br>
    <span>quanty</span>
<h5>{{Session::get('Cart')->totalQuanty}}</h5>

<input hidden id="total-quanty-cart" type="number" value="{{ Session::get('Cart')->totalQuanty }}">
</div>
@endif
 
<script src="{{('/js/jquery-3.3.1.min.js')}}"></script>