<?php

namespace App\Http\Controllers;

use App\Models\ChiNhanh;
use App\Models\HocVien;
use App\Models\Lop;
use App\Services\HocVienServices;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HocVienController extends Controller
{
    /* private $hv_ser = new HocVienServices();

    public function __construct(HocVienServices $hv_ser)
    {
        $this->hv_ser = $hv_ser;
    } */

    public function __construct(
        protected HocVienServices $hv_ser){}

    function index(Request $re){
        $sort = $re->input('sort');
        $ten = $re->input('ten');
        $email = $re->input('email');
        $ngay_sinh_bd = $re->input('ngay_sinh_bd');
        $ngay_sinh_kt = $re->input('ngay_sinh_kt');
        /* dump($ngay_sinh_bd);
        dd($ngay_sinh_kt); */

        $hv_services = new HocVienServices();
        $danh_sach = $hv_services->getAll($re->all())['danh_sach'];
        return view('hocvien/index', [
            'list_hocvien' => $danh_sach, 
            'sort_way' => $sort, 
            'ten'=>$ten, 
            'email' => $email, 
            'ngay_sinh_bd'=>$ngay_sinh_bd, 
            'ngay_sinh_kt'=>$ngay_sinh_kt,
        ]); 
    }

    function add(){
        return view('hocvien/add');
    }
    
    function edit(HocVien $id){ //ham find tim theo primary key
        return view('hocvien/edit', ['item' => $id, ]);
    }

    function editHV(Request $re){ //ham find tim theo primary key
        $id = $re->input('id');

        $hv = $this->hv_ser->getById($id);
        return response()->json([
            'item' => $hv,
        ]);
    }

    function store(Request $request){
        $this->hv_ser->create($request->all());
        return redirect()->route('hoc_vien.index');
    }

    function storeHV(Request $request){
        $this->hv_ser->create($request->all());
        $result = 'Successfully Added';
        return response()->json([
            'result' => $result,
        ]);
    }

    function update(Request $request){
        $this->hv_ser->update($request->all());
        return back()->withInput()->with('status', 'Successful change');
    }

    function updateHV(Request $request){
        $this->hv_ser->update($request->all());
        $result = 'Successfully Updated';
        return response()->json([
            'result' => $result,
        ]);
    }

    function delete ($id){
        $this->hv_ser-> delete($id);
        return redirect()->route('hoc_vien.index');
    }

    function deleteHV (Request $re){
        $id = $re->input('id');
        $this->hv_ser-> delete($id);
        $result = 'Successfully deleted';
        return response()->json([
            'result' => $result,
        ]);
    }

    function danh_sach_lop($id, Request $re){
        /* 
        $chi_nhanh_id = $data['chi_nhanh'];
        $giang_vien_id = $data['giang_vien'];
        $cap_do_id = $data['cap_do'];
        $thoi_luong = $data['thoi_luong'];
        $ngay_bat_dau_from= $data['ngay_bat_dau'];//Carbon::createFromFormat('d/m/Y', $data['ngay_bat_dau']);
        $ngay_bat_dau_to= $data['ngay_bat_dau'];
        $ngay_ket_thuc_from = $data['ngay_ket_thuc'];//Carbon::createFromFormat('d/m/Y', $data['ngay_ket_thuc']); 
        $ngay_ket_thuc_to = $data['ngay_ket_thuc'];
        $ngay_dk_bd = $data['ngay_dk_bd'];
        $ngay_dk_kt = $data['ngay_dk_kt'];
        $hoc_vien_id = $data['hoc_vien'] ?? ''; */
        $sort = $re->input('sort');
        $ten = $re->input('ten');
        $chi_nhanh = $re->input('chi_nhanh');
        $ngay_dk_bd = $re->input('ngay_dk_bd');
        //dd($ngay_dk_bd);
        $ngay_dk_kt = $re->input('ngay_dk_kt');
        
        $hv = HocVien :: find($id);//$id truyen di chi la id
        $query = $hv->getLop();
        
        if(!empty(trim($ten)) ){ // Laravel da trim gium roi
            $query->where('ten', 'like', "%".$ten."%");
        }
        if(!empty(trim($chi_nhanh)) ){ // Laravel da trim gium roi
            $query_chi_nhanh = ChiNhanh::where('ten', 'like', "%".$chi_nhanh."%")->pluck('id');
            $query->whereIn('chi_nhanh_id', $query_chi_nhanh);
        }
        if(!empty($ngay_dk_bd) ){ 
            $query->wherePivot('created_at', '>=', $ngay_dk_bd);
        }
        if(!empty($ngay_dk_kt) ){ 
            $query->wherePivot('created_at', '<=', Carbon::createFromFormat('Y-m-d', $ngay_dk_kt)->addDay());
        }

        //sap xep
        switch($sort){
            case 'day' : $query -> orderByPivot('created_at');break;
            case 'st_day' : $query -> orderBy('ngay_bat_dau');break;
            case 'en_day' : $query -> orderBy('ngay_ket_thuc');break;
            case 'name' : $query -> orderBy('ten');break;
            default:break;
        }
        $danh_sach = $query
                    ->get();//lan nay thi hoc vien phai la ham

        return view('hocvien/danh-sach-lop', [
            'list' => $danh_sach, 'hocvien' => $hv, 'sort_way' => $sort, 
            'ten'=>$ten, 'chi_nhanh' => $chi_nhanh, 'ngay_dk_bd'=>$ngay_dk_bd, 'ngay_dk_kt'=>$ngay_dk_kt,
        ]);
        
    }

    function them_lop($id){
        $hv = HocVien :: find($id);
        $mang = $hv->getLop()->pluck('lop_id');
        $list_lop= Lop::whereNotIn('id', $mang)->get();

        return view('hocvien/them_lop', ['hocvien' => $hv, 'list' => $list_lop,
        ]);
    }

    function store_lop(Request $request){
        
        $id = $request->input('id_hocvien');
        $ngay_dang_ky = $request->input('ngay_dang_ky');
        if(empty(trim($ngay_dang_ky)) ){
            return back()->withInput()->with('status', 'Empty Register day!');
        }
        //if(!empty(trim($ngay_dang_ky)) ){ chua bat duoc truong hop array rong
        else{
            $lop_id = $request->input('lop_id',[]);
            $hv = HocVien::find($id);
            $hv->getLop()->attach($lop_id, 
            ['created_at' => $ngay_dang_ky, 'updated_at' => now()]);
        }

        //dd($id);
        /* $count = $lop->hoc_vien()->where('hoc_vien_id', $hoc_vien_id)->count();
        if($count == 0){
            $lop->hoc_vien()->attach($hoc_vien_id);
        } */
       

        /* dump($ten);
        dump($email);
        dump($sdt); */
        
        /*dump($email);
        dump($sdt);  */

        return redirect()->route('hoc_vien.danh_sach_lop', $id);
    }

    function remove_lop ( $hoc_vien_id, $lop_id){
        $hv = HocVien::find($hoc_vien_id);
        $hv->getLop()->detach($lop_id);
        return redirect()->route('hoc_vien.danh_sach_lop', $hoc_vien_id);
    }

    function index2(Request $re){
        $sort = $re->input('sort');
        $ten = $re->input('ten');
        $email = $re->input('email');
        $ngay_sinh_bd = $re->input('ngay_sinh_bd');
        $ngay_sinh_kt = $re->input('ngay_sinh_kt');
        /* dump($ngay_sinh_bd);
        dd($ngay_sinh_kt); */

        $hv_services = new HocVienServices();
        $danh_sach = $hv_services->getAll($re->all())['danh_sach'];
        return view('hocvien/index_copy', [
            'list_hocvien' => $danh_sach, 
            'sort_way' => $sort, 
            'ten'=>$ten, 
            'email' => $email, 
            'ngay_sinh_bd'=>$ngay_sinh_bd, 
            'ngay_sinh_kt'=>$ngay_sinh_kt,
        ]); 
    }

    public function getListHv(Request $re){
        $hv_services = new HocVienServices();
        $danh_sach = $hv_services->getAll($re->all())['danh_sach'];

        return response()->json([
            'list' => $danh_sach,
            //'pagination' => (string) $danh_sach->links(),
        ]);
    }
}

