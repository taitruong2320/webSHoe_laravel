<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\sanpham;

class cart extends Model
{
    
    public $sanpham = null;
    public $totalPrice = 0;
    public $totalQuanty = 0;
    
    
     public function __construct($cart){
        if($cart){
            $this->sanpham = $cart->sanpham;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;
        }
    }
    public function AddCart($sanpham, $id_SP){
        $newProduct =['quanty'=> 0, 'price'=>$sanpham->gia, 'productInfo' => $sanpham];
        if($this->sanpham){
            if(array_key_exists($id_SP,$this->sanpham)){
                $newProduct = $this->sanpham[$id_SP];
            }
            
         }
    
        $newProduct['quanty']++;
        $newProduct['price'] = $sanpham->gia * $newProduct['quanty'];
        $this->sanpham[$id_SP] = $newProduct;
        $this->totalPrice +=  $sanpham->gia;
        $this->totalQuanty ++;
    }

    public function DeleteItemCart($id_SP){
        $this->totalQuanty -= $this->sanpham[$id_SP]['quanty'];
        $this->totalPrice -=   $this->sanpham[$id_SP]['price'];
        unset( $this->sanpham[$id_SP]);
    }

    public function UpdateItemCart($id_SP, $quanty){
        $this->totalQuanty -= $this->sanpham[$id_SP]['quanty'];
        $this->totalPrice -= $this->sanpham[$id_SP]['price']; 

        $this->sanpham[$id_SP]['quanty'] = $quanty;
        $this->sanpham[$id_SP]['price'] = $quanty * $this->sanpham[$id_SP]['productInfo']->gia;

        $this->totalQuanty += $this->sanpham[$id_SP]['quanty'];
        $this->totalPrice += $this->sanpham[$id_SP]['price'];


    }
    
}