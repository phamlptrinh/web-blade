<?php

namespace App\Http\Controllers;

use App\Models\CapDo;
use App\Models\ChiNhanh;
use App\Models\GiangVien;
use App\Models\LopHoc;
use Illuminate\Http\Request;

class LopHocController extends Controller
{
    function index(){
        $list_lh = LopHoc::orderBy('id', 'desc')->with('getChiNhanh')->paginate(5);
        return view('lop/index', ['list_lh' => $list_lh]);
    }


    function add(){
        $list_cn = ChiNhanh::orderBy('id', 'desc')->get();
        $list_gv = GiangVien::orderBy('id', 'desc')->get();
        $list_cd = CapDo::orderBy('ten', 'desc')->get();
        return view('lop/add',['list_cn' => $list_cn, 'list_gv'=>$list_gv, 'list_cd'=>$list_cd]);
    }

    function edit(LopHoc $id){ //ham find tim theo primary key
        return view('lop/edit', ['lh' => $id]);
    }

    function store(Request $request){
        $name = $request->input('ten');
        $chi_nhanh_id = $request->input('chi_nhanh');
        $giang_vien_id = $request->input('giang_vien');
        $cap_do = $request->input('cap_do');
        
        //$cn = new Chinhanh($ten, $dia_chi, $phuong_xa, $quan_huyen, $tinh_tp);
        $lh = new LopHoc();
        $lh->name = $name;
        $lh->chi_nhanh_id = $chi_nhanh_id;
       
        $lh-> save();

        /* dump($ten);
        dump($email);
        dump($sdt); */
        /* dd($ten);
        dump($email);
        dump($sdt);  */

        return redirect()->route('lop.index');
    }

    /* function update(Request $request){
        $id = $request->input('id');
        $ten = $request->input('ten');
        $dia_chi = $request->input('dia_chi');
        $phuong_xa = $request->input('phuong_xa');
        $quan_huyen = $request->input('quan_huyen');
        $tinh_tp= $request->input('tinh_tp');

        //$cn = ChiNhanh::find($id);
        $cn->ten = $ten;
        $cn->dia_chi = $dia_chi;
        $cn->phuong_xa = $phuong_xa;
        $cn->quan_huyen = $quan_huyen;
        $cn->tinh_tp = $tinh_tp;
        $cn-> save();
        return back()->withInput()->with('status', 'Successful change');
        } */

    
}
