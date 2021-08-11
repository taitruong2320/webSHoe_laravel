<div class="site-blocks-table">
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
            @if(Session::has('Cart') != null)
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
                <td><a  class="btn btn-primary btn-sm" onclick="SaveListItemCart( {{$item['productInfo']->id_SP}}) ;">V</a></td>
                <td><a  class="btn btn-primary btn-sm" onclick="DeleteListItemCart( {{$item['productInfo']->id_SP}});">X</a></td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

    