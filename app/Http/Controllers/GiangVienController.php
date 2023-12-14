<?php

namespace App\Http\Controllers;

use App\Models\GiangVien;
use Illuminate\Http\Request;

class GiangVienController extends Controller
{
    function index(){
        $giangvien = GiangVien::orderBy('id', 'desc')->paginate(10); //cai dau tien la :: may cai sau la mui ten, may cai thuc su thuc thi thi de cuoi, neu de no o truoc thi no truy van lun, bo qua may cai lenh sau
        return view('giangvien/index', [
            'list_giangvien' => $giangvien
        ]);
    }

    function add(){
        //$giangvien = GiangVien::paginate(10);
        return view('giangvien/add');
    }

    function edit(Request $request, GiangVien $id){ //ham find tim theo primary key
        
        //$giangvien = GiangVien::find();
        return view('giangvien/edit', [
            'gv' => $id
        ]);
    }

    function store(Request $request){
        $ten = $request->input('ten');
        $email = $request->input('email');

        // cach kiem tra == null dung duoc o day vi laravel da trim input san
        //neu khong, nhap "   " se pass duoc buoc test nay

        if(empty(trim($ten)) ){
            return back()->withInput()->with('status', 'Empty Name!');
        }

        if(empty(trim($email))){
            return back()->withInput()->with('status', 'Empty Email!');
        }

        //$email_exists = GiangVien::where('email', $email)->first();
        $email_exists = GiangVien::where('email', $email)->count();
        if($email_exists >0){
            return back()->withInput()->with('status', 'Existed Email!');
        }

        $sdt = $request->input('sdt');

        $giangvien = new GiangVien();
        $giangvien->ten = $ten;
        $giangvien->email = $email;
        $giangvien->sdt = $sdt;
        $giangvien-> save();

        /* dump($ten);
        dump($email);
        dump($sdt); */
        /* dd($ten);
        dump($email);
        dump($sdt);  */

        return redirect()->route('giangvien.index');//trong class xu ly cua server, route lay noi bo
    }

    function update(Request $request){
        $id = $request->input('id');
        $ten = $request->input('ten');
        $email = $request->input('email');
        $sdt = $request->input('sdt');

        $giangvien = GiangVien::find($id);
        $giangvien->ten = $ten;
        $giangvien->email = $email;
        $giangvien->sdt = $sdt;
        $giangvien-> save();
        return back()->withInput()->with('status', 'Profile updated!');
        //return redirect('giangvien');//han che dung ten ngoai vi no thuong thay doi
        //return redirect()->route('giangvien.index')->with('status', 'Profile updated!');//dung cai nay it thay doi hon
        // thuong thi edit xong van o lai trang edit de coi can sua gi thi sua luon
    }

    function delete (GiangVien $gv){
        $gv->delete();
        return redirect()->route('giangvien.index');
    }
}
