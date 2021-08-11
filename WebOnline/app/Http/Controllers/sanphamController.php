<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sanpham;
use App\nhom;
use App\nhaCC;
use App\Cart;
class sanphamController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function sanpham()
    // {
    //     return view('pageadmin.sanpham');
    // }
    
     public function get ()
    {
        $sanphams = sanpham::join('nhomsanpham', 'sanpham.id_nhom', '=', 'nhomsanpham.id_nhom')
        ->join('nhacc' , 'sanpham.id_nhaCC' , '=' , 'nhacc.id_nhaCC')
        ->paginate(5);
        $nhom = nhom::all();
        $nhacc = nhacc::all();
        
        return view('pageadmin.sanpham',compact('sanphams','nhom','nhacc'));
    }
    public function add (Request $request)
    {


        $sanpham = new sanpham();
        $sanpham->ten_SP = $request->tenSP;
        $sanpham->id_nhom = $request->idNhom;
        $sanpham->gia = $request->gia;
        $sanpham->so_luong = $request->soLuong;
        $sanpham->hinh = $request->filepath;
        $sanpham->id_nhaCC = $request->idNCC;

        
        
        $sanpham->save();
        return redirect('sanpham');
    }
    public function update(Request $request , $id )
    {
        $sanpham = sanpham::find($id);
        
        $sanpham->id_nhom = $request->tenNhom;
        $sanpham->ten_SP = $request->tenSP;
        $sanpham->gia = $request->gia;
        $sanpham->so_luong = $request->soLuong;
        $sanpham->hinh = $request->filepath;
        $sanpham->id_nhaCC = $request->tenNCC;
        
        $sanpham->save();
        return redirect('sanpham');
    }
    public function delete($id)
    {
        sanpham::destroy($id);
        return back();
       
    }
    public function search($key)
    {
        $sanphams = sanpham::join('nhomsanpham', 'sanpham.id_nhom', '=', 'nhomsanpham.id_nhom')
        ->join('nhacc' , 'sanpham.id_nhaCC' , '=' , 'nhacc.id_nhaCC')
        ->where('ten_SP','like','%'.$key.'%')
        ->paginate(5);
        $nhom = nhom::all();
        $nhacc = nhacc::all();
        return view('pageadmin.sanpham',compact('sanphams','nhom','nhacc','key'));
    }
}