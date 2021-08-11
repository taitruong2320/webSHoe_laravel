<?php

namespace App\Http\Controllers;
use DB;
use App\sanpham;
use App\nhom;
use Illuminate\Http\Request;

class shopController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function shop()
    {
        $product = sanpham::paginate(6);
        return view('page.shop', compact('product'));
    }
    
    public function loaisanpham($type)
    {
        $loaisp = sanpham::where('id_nhom',$type)->get();
        return view('page.loaiSP',compact('loaisp'));
    }

    public function search($key){
         $product = sanpham::where('ten_SP','like','%'.$key.'%')->paginate(6);

         return view('page.shop' ,compact('product','key')); 
    }
}
