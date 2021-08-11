<?php

namespace App\Http\Controllers;
use DB;
use App\sanpham;
use App\khachhang;
use App\cart;
use App\bills;
use App\bill_detail;
use Illuminate\Http\Request;
use Session;

class cartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function _construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 
    
    public function AddCart(Request $req, $id)
    {
        //dd($id);
        $product = DB::table('sanpham')->where('id_SP',$id)->first();
        // dd($product);
         if($product != null){
            
             $oldCart = Session('Cart') ? Session('Cart') : null;
             $newCart = new Cart($oldCart);
             $newCart->AddCart($product, $id);

             $req->Session()->put('Cart', $newCart);
            
         }
         
        return view('page.cart2', compact('newCart')); 
        
    }
    
    public function DeleteItemCart(Request $req, $id)
    {
          
            $oldCart = Session('Cart') ? Session('Cart') : null; 
            $newCart = new Cart($oldCart);
            $newCart->DeleteItemCart($id);

           if(Count( $newCart->sanpham) > 0){
               $req->Session()->put('Cart', $newCart);
           }else{
               $req->Session()->forget('Cart');
           }
        
           return view('page.cart2', compact('newCart')); 
    }  
        
    
    public function cart()
    {
       
        return view('page.cart');
    }
    public function ViewListCart(){

        return view('page.cart');
    }
    public function DeleteListItemCart(Request $req, $id)
    {
        
            $oldCart = Session('Cart') ? Session('Cart') : null; 
            $newCart = new Cart($oldCart);
            $newCart->DeleteItemCart($id);

           if(Count( $newCart->sanpham) > 0){
               $req->Session()->put('Cart', $newCart);
           }else{
               $req->Session()->forget('Cart');
           }
        
        return view('page.list-cart');
    }  
    
    public function SaveListItemCart(Request $req, $id, $quanty )
    {
        $oldCart = Session('Cart') ? Session('Cart') : null; 
        $newCart = new Cart($oldCart);
        $newCart->UpdateItemCart($id, $quanty );

        $req->Session()->put('Cart', $newCart); 
       
    
        
       return view('page.list-cart'); 
    }
        
    public function getcheckout(Request $req){
        
        
        return view('page.checkout'); 
        
    }
    public function postcheckout(Request $req){
        $cart = Session::get('Cart');
       
        // cumtomer = khachhang
        $cumtomer = new khachhang;
        $cumtomer->ten = $req->name;
        $cumtomer->ngay_sinh = $req->ngSinh;
        $cumtomer->email = $req->email;
        $cumtomer->dia_chi = $req->address;
        $cumtomer->sdt = $req->phone;
        $cumtomer->pass = $req->pw;
        $cumtomer->save();

        $bill = new bills;
        $bill->id_KH = $cumtomer->id_KH;
        // $bill->date_oder = date('d-m-Y');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment;
        $bill->note = 1;
        $bill->save();

        
        foreach ($cart->sanpham as $key => $value) {
            $bill_detail = new bill_detail;
            $bill_detail->id_bill = $bill->id_bill;
            $bill_detail->id_SP = $key;
            $bill_detail->quanty = $value['quanty'];
            $bill_detail->price = $value['price']/$value['quanty'];
            $bill_detail->save();
        }
        Session::forget('Cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
        
         
        
    } 
    
}