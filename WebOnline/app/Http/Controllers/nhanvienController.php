<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\NhanVien;
use App\bophan;
use App\Role;
class nhanvienController extends Controller
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
    // public function nhanvien()
    // {
    //     return view('pageadmin.nhanvien');
    // }

    public function get()
    {
        $nhanviens = nhanvien::join('bophan', 'nhanvien.id_BP', '=', 'bophan.id_BP')
        ->join('roles', 'nhanvien.id_roles', '=', 'roles.id_roles')
        ->paginate(5);

        $bophan = bophan::All();

        $roles = role::All();

        return view('pageadmin.nhanvien' ,compact('nhanviens','bophan','roles')); 
    }

    public function add(Request $request)
    {
        $nhanvien = new nhanvien();
        $nhanvien->ten = $request->tennhanvien;
        $nhanvien->id_BP = $request->idBP;
        $nhanvien->ngay_sinh = $request->ngaysinh;
        $nhanvien->dia_chi = $request->diachi;
        $nhanvien->sdt = $request->sdt;
        $nhanvien->pass = $request->pass;
        $nhanvien->id_roles = $request->idrole;

        $nhanvien->save();
        return redirect('nhanvien');
    }
    

    public function update(Request $request , $id )
    {
        $nhanvien = NhanVien::find($id);

        $nhanvien->ten = $request->tenNV;
        $nhanvien->id_BP = $request->maBP;
        $nhanvien->ngay_sinh = $request->ngaysinh;
        $nhanvien->dia_chi = $request->diachi;
        $nhanvien->sdt = $request->sdt;
        $nhanvien->pass = $request->pass;
        $nhanvien->id_roles = $request->chucvu;

        $nhanvien->save();
        return redirect('nhanvien');
    }

    public function delete($id)
    {
        nhanvien::destroy($id);
        return back();
    }
    

    public function search($key)
    {
        // $nhanviens = nhanvien::where('ten','like','%'.$key.'%')->paginate(2);

        // return view('pageadmin.nhanvien' ,compact('nhanviens','key')); 

        $nhanviens = nhanvien::join('bophan', 'nhanvien.id_BP', '=', 'bophan.id_BP')
        ->join('roles', 'nhanvien.id_roles', '=', 'roles.id_roles')
        ->where('nhanvien.ten','like','%'.$key.'%')
        ->paginate(5);

        $bophan = bophan::All();

        $roles = role::All();

        return view('pageadmin.nhanvien' ,compact('nhanviens','bophan','roles', 'key')); 

    }

}
