<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bills;
use App\bill_detail;
use App\khachhang;
use App\sanpham;

class orderController extends Controller
{
    public function managerorder()
    {
        $bill = bills::orderby('created_at','DESC')->get();
        
        return view('pageadmin.manager_order')->with(compact('bill'));
    }
    public function viewtongquan()
    {
        $bill = bills::where('note',1)->count();
        return view('pageadmin.tongquan')->with(compact('bill'));
    }

    public function view_order($id_bill)
    {
        $bill_details = bill_detail::where('id_bill',$id_bill)->get();
        $bill = bills::where('id_bill',$id_bill)->get();
        foreach ($bill as $key => $or){
            $id_KH = $or->id_KH;
        }
        $KH = khachhang::where('id_KH',$id_KH)->first();
           
        $bill_details = bill_detail::with('product')
        ->where('id_bill',$id_bill)
        ->join('sanpham','bill_detail.id_SP','=','sanpham.id_SP')
        
        ->get();
        return view('pageadmin.view_order',compact('bill_details','KH'));
    }
}
// ->join('roles', 'nhanvien.id_roles', '=', 'roles.id_roles')