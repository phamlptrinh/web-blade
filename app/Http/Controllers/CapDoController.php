<?php

namespace App\Http\Controllers;

use App\Models\CapDo;
use Illuminate\Http\Request;

class CapDoController extends Controller
{
    function index(){
        $cd = CapDo::orderby('id','desc')->paginate(5);
        return view('capdo/index', ['list_cd' => $cd]);
    }

    function add(){
        return view('capdo/add');
    }

    function edit(CapDo $ten){
        return view('capdo/edit', ['cd' => $ten]);
    }

    function store (Request $re){
        $ten = $re->input('ten');
        $ten_exists = CapDo::where('ten', $ten)->count();
        if($ten_exists >0){
            return back()->withInput()->with('status', 'Existed Name!');
        }
        $ghi_chu = $re->input('ghi_chu');
        $cd = new CapDo();
        $cd->ten = $ten;
        $cd->ghi_chu = $ghi_chu;
        $cd->save();

        return redirect()->route('capdo.index');
    }

    function update(Request $re){
        $id = $re->input('id');
        $ten = $re->input('ten');
        $ghi_chu = $re->input('ghi_chu');

        $cd = CapDo::find($id);
        $cd->ten =$ten;
        $cd->ghi_chu = $ghi_chu;
        $cd->save();

        return back()->withInput()->with('status', 'Successful change');
    }

    function delete(CapDo $id){
        $id->delete();
        return back()->withInput()->with('status', 'Deleted Level: '.$id->ten);
    }
}
