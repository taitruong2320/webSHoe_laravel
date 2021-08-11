<?php

namespace App\Http\Controllers;
use DB;
use App\sanpham;
use App\shop; 
use App\img;   
use Illuminate\Http\Request;

class shopsingleController extends Controller
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
    public function shopsingle($id)
    {
        $viewhinh = img::all();
         $sanpham = sanpham::where('id_SP',$id)->first();
        return view('page.shopsingle',compact('sanpham','viewhinh'));
    }
}   