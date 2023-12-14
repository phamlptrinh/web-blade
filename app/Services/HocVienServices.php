<?php

namespace App\Services;

use App\Models\HocVien;
use App\Models\Lop;
use Carbon\Carbon;

class HocVienServices{

    public function getAll($data = [])
    {// tren 3 parameter thi nen gom lai thanh mang, cho no gia tri mac dinh la mang rong       
        $sort = isset($data['sort']) ? $data['sort'] : '';
        $ten = $data['ten'] ?? '';//day la cach viet ngan gon cua cai tren
        $email = $data['email'] ?? '';
        $ngay_sinh_bd = $data['ngay_sinh_bd'] ?? '';//neu dung Cacbon o day thi ko xet empty duoc
        $ngay_sinh_kt = $data['ngay_sinh_kt'] ?? '';
        $ngay_dk_bd = $data['ngay_dk_bd'] ?? '';
        $ngay_dk_kt = $data['ngay_dk_kt'] ?? '';
        $lop_id = $data['id'] ?? '';
        $pageSize = $data['pageSize'] ?? '10';

        if(!empty($lop_id)){
            /* $arr['lop'] = Lop ::find($lop_id);
            $query = $arr['lop']->hoc_vien(); */
            $query = HocVien::query()->whereHas('lop', function($builder) use ($lop_id){
                //nếu không có use lop thì nó sẽ không biet lop lấy ở đâu
                //use cho biết sẽ dùng những biến nào ở bên ngoài use ($lop_id, $pageSize)
                //js và c# thì không cần use
                $builder->where('id', $lop_id);
            });// whereHas dùng để build cái subQuery của lớp học
        }
        else{
            $query = HocVien::query();}

        
        if(!empty(trim($ten)) ){
            $query->where('ten', 'like', "%".$ten."%");
        }
        if(!empty(trim($email)) ){ 
            $query->where('email', 'like', "%".$email."%");
        }
        if(!empty($ngay_sinh_bd) ){ 
            $query->where('ngay_sinh', '>=', 
            Carbon::createFromFormat('d/m/Y h:i:s', $ngay_sinh_bd." 00:00:00"));
            //co 1 khoang trang trong format thoi cung se bi loi
            // h:i:s', $ngay_sinh_bd." 00:00:00" neu ko co doan nay thi no them vao gio utc
        }
        if(!empty($ngay_sinh_kt) ){ 
            $query->where('ngay_sinh', '<=', 
            Carbon::createFromFormat('d/m/Y h:i:s', $ngay_sinh_kt." 00:00:00")->addDay());
            //23:59:59 ko duoc vi no noi Hour can not be higher than 12
        }
        if(!empty($ngay_dk_bd) ){ 
            $query->wherePivot('created_at', '>=',
            Carbon::createFromFormat('d/m/Y h:i:s', $ngay_dk_bd." 00:00:00"));
        }
        if(!empty($ngay_dk_kt) ){ 
            $query->wherePivot('created_at', '<=',
            Carbon::createFromFormat('d/m/Y h:i:s', $ngay_dk_kt." 00:00:00")->addDay());
            //điều này yêu cầu khi đăng ký thì giờ đăng ký phải khác 00:00:00
        }

        //sap xep
        switch($sort){
            case 'email' : $query -> orderBy('email');break;
            case 'birth_day' : $query -> orderBy('ngay_sinh');break;
            case 'sdt' : $query -> orderBy('sdt');break;
            case 'name' : $query -> orderBy('ten');break;
            case 'day' : $query -> orderByPivot('created_at');break;
            default:break;
        }

        $arr['danh_sach'] = $query -> orderBy('id', 'desc') -> paginate($pageSize);

        return $arr;
    }
    public function getById($id){
        // ket hop voi cache
        return HocVien::find($id);
    }
    public function create($data =[]){
        $name = $data['ten'] ?? '';
        $email = $data['email'] ?? '';
        $sdt = $data['sdt'] ?? '';
        $ngay_sinh= $data['ngay_sinh'] ?? '';

        $hv = new HocVien();
        $hv->ten = $name;
        $hv->email = $email;
        $hv->ngay_sinh = $ngay_sinh;
        $hv->sdt = $sdt;
        $hv->save();
        return $hv;
    }
    public function update($data = []){
        $name = $data['ten'] ?? '';
        $email = $data['email'] ?? '';
        $sdt = $data['sdt'] ?? '';
        $id = $data['id'] ?? '';
        $ngay_sinh= $data['ngay_sinh'] ?? '';

        $hv = $this->getById($id);
        $hv->ten = $name;
        $hv->email = $email;
        $hv->ngay_sinh = $ngay_sinh;
        $hv->sdt = $sdt;
        $hv->save();
        return $hv;
    }
    public function delete($id){
        return $this -> getById($id) -> delete();
    }
}