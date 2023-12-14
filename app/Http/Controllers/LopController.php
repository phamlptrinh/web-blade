<?php

namespace App\Http\Controllers;

use App\Models\CapDo;
use App\Models\ChiNhanh;
use App\Models\GiangVien;
use App\Models\HocVien;
use App\Models\HocVien_Lop;
use App\Models\Lop;
use App\Services\HocVienServices;
use App\Services\LopServices;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LopController extends Controller
{
    public function __construct(protected HocVienServices 
    $hv_services, protected LopServices $lop_services){}

    function index(Request $re){
        $danh_sach = $this->lop_services->getAll($re->all())
        ['danh_sach'];
        //dd($danh_sach);
        
        return view('lop/index', ['list_lh' => $danh_sach,]);
    }
            /* $list_lh = Lop::orderBy('id', 'desc')
                    ->with('getChiNhanh')
                    ->with('getGiangVien')
                    ->with('getCapDo')
                    ->paginate(10);  */ 
    function add(){
        $list_cn = ChiNhanh::orderBy('id', 'desc')->get();
        $list_gv = GiangVien::orderBy('id', 'desc')->get();
        $list_cd = CapDo::orderBy('ten', 'desc')->get();
        return view('lop/add',
        ['list_cn' => $list_cn, 'list_gv'=>$list_gv, 'list_cd'=>$list_cd, ]);
    }
    
    function edit(Lop $id){ //ham find tim theo primary key
        $list_cn = ChiNhanh::orderBy('id', 'desc')->get();
        $list_gv = GiangVien::orderBy('id', 'desc')->get();
        $list_cd = CapDo::orderBy('ten', 'desc')->get();
        return view('lop/edit', ['lh' => $id, 'list_cn' => $list_cn, 'list_gv'=>$list_gv, 'list_cd'=>$list_cd, ]);
    }

    function store(Request $request){
        $this->lop_services->create($request->all());
        return redirect()->route('lop.index');
    }

    function update(Request $request){
        $this->lop_services->create($request->all());
        return back()->withInput()->with('status', 'Successful change');
    }

    function delete ($id){
        $this->lop_services->delete($id);
        return redirect()->route('lop.index');
    }

    function danh_sach_lop($id, Request $re){
        $data = $re->all();
        $data['id'] = $id;

        $arr = $this->hv_services->getAll($data);
        $danh_sach = $arr['danh_sach'];

        return view('lop/danh-sach-lop', [
            'list' => $danh_sach, ]);
        
    }

    function them_hoc_vien($id){

        $lop = Lop::find($id);
        $mang = $lop->hoc_vien()->pluck('hoc_vien_id');
        /* $mang_ids = [];
        foreach($mang as $item){
            $mang_ids [] = $item->id;
        } */
        //$list_hoc_vien= HocVien::doesntHave('lop')->get();
        $list_hoc_vien= HocVien::whereNotIn('id', $mang)->get();

        return view('lop/them_hoc_vien', ['id' => $lop, 'list' =>$list_hoc_vien,
            //'list' => $danh_sach,
        ]);
    }

    function store_hoc_vien(Request $request){
        
        $id = $request->input('id_lop');
        $ngay_dang_ky = $request->input('ngay_dang_ky');
        if(empty(trim($request->input('ngay_dang_ky'))) ){
            return back()->withInput()->with('status', 'Empty Register day!');
        }
        //if(!empty(trim($ngay_dang_ky)) ){ chua bat duoc truong hop array rong
        else{
            $hoc_vien_id = $request->input('hoc_vien_id',[]);//co [], neu ko tim duoc thi xem day la mang rong, nguoc lai la null
            $data = $request->all();
            $data['hoc_vien_id'] = $hoc_vien_id;
            $this->lop_services->store_hoc_vien($data);
            return redirect()->route('lop.danh_sach_lop', $request->input('id_lop'));
        }
    }

    function remove_hoc_vien ($lop_id, $hoc_vien_id){
        $lop = Lop::find($lop_id);
        //HocVien_Lop::destroy($hoc_vien_id, $lop_id);
        $lop->hoc_vien()->detach($hoc_vien_id);
        //HocVien_Lop::where('hoc_vien_id', $hoc_vien_id)->where('lop_id',$lop_id)->delete();
        return redirect()->route('lop.danh_sach', $lop_id);
    }
}
