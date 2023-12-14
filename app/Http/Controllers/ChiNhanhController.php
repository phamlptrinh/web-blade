<?php

namespace App\Http\Controllers;

use App\Models\ChiNhanh;
use Illuminate\Http\Request;

class ChiNhanhController extends Controller
{
    function index(){
        $cn = ChiNhanh::orderBy('id','desc')->paginate(10);
        return view('chinhanh/index', ['list_cn' => $cn]);
    }

    function add(){
        return view('chinhanh/add');
    }

    function edit(ChiNhanh $id){ //ham find tim theo primary key
        return view('chinhanh/edit', [
            'cn' => $id
        ]);
    }

    function store(Request $request){
        $ten = $request->input('ten');
        $dia_chi = $request->input('dia_chi');
        $phuong_xa = $request->input('phuong_xa');
        $quan_huyen = $request->input('quan_huyen');
        $tinh_tp= $request->input('tinh_tp');

        //$cn = new Chinhanh($ten, $dia_chi, $phuong_xa, $quan_huyen, $tinh_tp);
        $cn = new Chinhanh();
        $cn->ten = $ten;
        $cn->dia_chi = $dia_chi;
        $cn->phuong_xa = $phuong_xa;
        $cn->quan_huyen = $quan_huyen;
        $cn->tinh_tp = $tinh_tp;
        $cn-> save();

        /* dump($ten);
        dump($email);
        dump($sdt); */
        /* dd($ten);
        dump($email);
        dump($sdt);  */

        return redirect()->route('chinhanh.index');
    }

    function update(Request $request){
        $id = $request->input('id');
        $ten = $request->input('ten');
        $dia_chi = $request->input('dia_chi');
        $phuong_xa = $request->input('phuong_xa');
        $quan_huyen = $request->input('quan_huyen');
        $tinh_tp= $request->input('tinh_tp');

        $cn = ChiNhanh::find($id);
        $cn->ten = $ten;
        $cn->dia_chi = $dia_chi;
        $cn->phuong_xa = $phuong_xa;
        $cn->quan_huyen = $quan_huyen;
        $cn->tinh_tp = $tinh_tp;
        $cn-> save();
        return back()->withInput()->with('status', 'Successful change');
        }

    
    function delete(ChiNhanh $id){
        $id->delete();
        return back()->withInput()->with('status', 'Deleted Branch: '.$id->ten);
    }
    
}
