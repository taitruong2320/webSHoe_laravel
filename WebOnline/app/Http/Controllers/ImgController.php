<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\img;
use App\sanpham;

class ImgController extends Controller
{
    public function get ()
    {
        $imgs = img::All();

        $sanpham = sanpham::All();
        
        return view('pageadmin.img',compact('imgs','sanpham'));
    }
    public function add (Request $request)
    {


        $img = new img();
        $img->image = $request->filepath;
 
        $img->id_SP = $request->idSP;

        
        
        $img->save();
        return redirect('img');
    }
}
