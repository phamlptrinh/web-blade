<?php

namespace App\Services;

use App\Models\CapDo;
use App\Models\ChiNhanh;
use App\Models\GiangVien;
use App\Models\HocVien;
use App\Models\Lop;
use Carbon\Carbon;

class LopServices{

    private function convertToDate($ngay){
        return Carbon::createFromFormat('d/m/Y h:i:s', $ngay." 00:00:00");
    }

    public function getAll($data = []){// tren 3 parameter thi nen gom lai thanh mang, cho no gia tri mac dinh la mang rong
        $sort = isset($data['sort']) ? $data['sort'] : '';
        $ten = $data['ten'] ?? '';
        $chi_nhanh_id = $data['chi_nhanh_id'] ?? '';
        $giang_vien_id = $data['giang_vien_id'] ?? '';
        $giang_vien = $data['giang_vien'] ?? '';
        $cap_do_id = $data['cap_do_id'] ?? '';
        $thoi_luong = $data['thoi_luong'] ?? '';
        $ngay_bat_dau_from= $data['ngay_bat_dau_from'] ?? '';
        $ngay_bat_dau_to= $data['ngay_bat_dau_to'] ?? '';
        $ngay_ket_thuc_from = $data['ngay_ket_thuc_from'] ?? '';
        $ngay_ket_thuc_to = $data['ngay_ket_thuc_to'] ?? '';
        $ngay_dk_bd = $data['ngay_dk_bd'] ?? '';
        $ngay_dk_kt = $data['ngay_dk_kt'] ?? '';
        $hoc_vien_id = $data['hoc_vien'] ?? '';
        $pageSize = $data['pageSize'] ?? '10';

        /* //xet root de biet dang tim tu dau           CACH NAY DAI DONG QUA, KHONG CAN THIET
        $chi_nhanh_id_root = $data['chi_nhanh_root'] ?? '';
        $giang_vien_id_root = $data['giang_vien_root'] ?? '';
        $cap_do_id_root = $data['cap_do_root'] ?? '';
        $query = Lop::orderBy('id', 'desc');

        //tao query theo if root
        if(!empty(trim($chi_nhanh_id_root))){
            $arr['chi_nhanh'] = ChiNhanh ::find($chi_nhanh_id_root);
            $query = $arr['chi_nhanh']->getLop();
        }
        if(!empty(trim($giang_vien_id_root))){
            $arr['giang_vien'] = GiangVien ::find($giang_vien_id_root);
            $query = $arr['giang_vien']->getLop();
        }
        if(!empty(trim($cap_do_id_root))){
            $arr['cap_do'] = CapDo ::find($cap_do_id_root);
            $query = $arr['cap_do']->getLop();
        */

        //query
        if(!empty(trim($hoc_vien_id))){
            $arr['hoc_vien'] = HocVien ::find($hoc_vien_id);
            $query = $arr['hoc_vien']->getLop();
        }
        else{
            $query = Lop::query();
        }
        
        //where clause
        if(!empty(trim($ten)) ){
            $query->where('ten', 'like', "%".$ten."%");
        }
        if(!empty(trim($giang_vien)) ){
            $query_giang_vien = GiangVien::where('ten', 'like', "%".$giang_vien."%")->pluck('id');
            $query->whereIn('giang_vien_id', $query_giang_vien);
        }
        if(!empty(trim($chi_nhanh_id)) ){ 
            $query->where('chi_nhanh_id', $chi_nhanh_id);
        }
        if(!empty(trim($giang_vien_id)) ){ 
            $query->where('giang_vien_id', $giang_vien_id);
        }
        if(!empty(trim($cap_do_id)) ){ 
            $query->where('cap_do_id', $cap_do_id);
        }
        if(!empty(trim($thoi_luong)) ){ 
            $query->where('thoi_luong', $thoi_luong);
        }
        if(!empty($ngay_bat_dau_from) ){ 
            $query->wherePivot('ngay_bat_dau', '>=', 
                $this->convertToDate($ngay_bat_dau_from));
        }
        if(!empty($ngay_bat_dau_to) ){ 
            $query->wherePivot('ngay_bat_dau', '<=', 
                $this->convertToDate($ngay_bat_dau_to)->addDay());
        }
        if(!empty($ngay_ket_thuc_from) ){ 
            $query->wherePivot('ngay_ket_thuc', '>=', 
                $this->convertToDate($ngay_ket_thuc_from));
        }
        if(!empty($ngay_ket_thuc_to) ){ 
            $query->wherePivot('ngay_ket_thuc', '<=', 
                $this->convertToDate($ngay_ket_thuc_to)->addDay());
        }
        if(!empty($ngay_dk_bd) ){ 
            $query->wherePivot('created_at', '>=',
                $this->convertToDate($ngay_dk_bd));
        }
        if(!empty($ngay_dk_kt) ){ 
            $query->wherePivot('created_at', '<=',
                $this->convertToDate($ngay_dk_kt)->addDay());
        }

        //sap xep
        switch($sort){
            case 'Teacher' : $query -> orderBy('giang_vien_id');break;
            case 'Level' : $query -> orderBy('cap_do_id');break;
            case 'Branch' : $query -> orderBy('chi_nhanh_id');break;
            case 'Name' : $query -> orderBy('ten');break;
            case 'Time' : $query -> orderBy('thoi_luong');break;
            case 'Start date' : $query -> orderBy('ngay_bat_dau');break;
            case 'End date' : $query -> orderBy('ngay_ket_thuc');break;
            case 'Register day' : $query -> orderByPivot('created_at');break;
            default:break;
        }

        $arr['danh_sach'] = $query ->with('getChiNhanh')
                                    ->with('getGiangVien')
                                    ->with('getCapDo') 
                                    ->paginate($pageSize);
        return $arr;
    }
    public function getById($id){
        return Lop::find($id);
    }
    public function create($data = []){
        $id = $data['id'];
        $name = $data['ten'];
        $chi_nhanh_id = $data['chi_nhanh'];
        $giang_vien_id = $data['giang_vien'];
        $cap_do_id = $data['cap_do'];
        $thoi_luong = $data['thoi_luong'];
        $ngay_bat_dau= $data['ngay_bat_dau'];
        $ngay_ket_thuc = $data['ngay_ket_thuc'];

        if(!empty(trim($id))){
            $lh = Lop::find($id);
        }
        else{  $lh = new Lop(); }
        
        $lh->ten = $name;
        $lh->chi_nhanh_id = $chi_nhanh_id;
        $lh->giang_vien_id = $giang_vien_id;
        $lh->cap_do_id = $cap_do_id;
        $lh->ngay_bat_dau =$ngay_bat_dau;
        $lh->ngay_ket_thuc = $ngay_ket_thuc;
        $lh->thoi_luong = $thoi_luong;
       
        return $lh -> save();
    }

    /* dd($ngay_bat_dau);//validate before after
        dd($ngay_ket_thuc); */



    /* public function update($data =[]){
        $id = $data['id'];
        $name = $data['ten'];
        $chi_nhanh_id = $data['chi_nhanh'];
        $giang_vien_id = $data['giang_vien'];
        $cap_do_id = $data['cap_do'];
        $thoi_luong = $data['thoi_luong'];
        $ngay_bat_dau= $data['ngay_bat_dau'];//Carbon::createFromFormat('d/m/Y', $data'ngay_bat_dau'));
        $ngay_ket_thuc = $data['ngay_ket_thuc'];//Carbon::createFromFormat('d/m/Y', $data'ngay_ket_thuc'));

        dd($ngay_bat_dau);//validate before after

        $lh = Lop::find($id);
        $lh->ten = $name;
        $lh->chi_nhanh_id = $chi_nhanh_id;
        $lh->giang_vien_id = $giang_vien_id;
        $lh->cap_do_id = $cap_do_id;
        $lh->ngay_bat_dau =$ngay_bat_dau;
        $lh->ngay_ket_thuc = $ngay_ket_thuc;
        $lh->thoi_luong = $thoi_luong;
       
        return $lh -> save();
    } */
    public function delete($id){
        return $this -> getById($id) -> delete();
    }

    public function store_hoc_vien($data = []){
        $id = $data['id_lop'];
        $hoc_vien_id = $data['hoc_vien_id'];
        $ngay_dang_ky = $data['ngay_dang_ky'];
        //if(!empty(trim($ngay_dang_ky)) ){ chua bat duoc truong hop array rong
        $lop = $this -> getById($id);
        $lop->hoc_vien()->attach($hoc_vien_id, 
        ['created_at' => Carbon::createFromFormat('d/m/Y h:i:s', $ngay_dang_ky." 00:00:00"), 
        'updated_at' => now()]);
    }
}