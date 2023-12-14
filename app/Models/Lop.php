<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lop extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'lop';

    function getChiNhanh() : BelongsTo{
        return $this->belongsTo(ChiNhanh::class, 'chi_nhanh_id');
    }

    function getGiangVien() : BelongsTo{
        return $this->belongsTo(GiangVien::class, 'giang_vien_id');
    }

    function getCapDo() : BelongsTo{
        return $this->belongsTo(CapDo::class, 'cap_do_id');
    }

    function getHocVien() : BelongsToMany{
        return $this
        ->belongsToMany(HocVien::class, 'hoc_vien_lop', 'lop_id', 'hoc_vien_id')//par3 là cột id của $this trong bảng pivot
        ->withPivot('updated_at', 'created_at');
    }   
}

/* function getHocVien() : HasMany{ //cai nay thi chi lay duoc id cua hoc vien
    return $this->hasMany(HocVien_Lop::class, 'lop_id');
} */

//them cach truy van cac thuoc tinh them trong bang trung gian
        // no khong thuc hien cau truy van nen se ko co loi o day
        //neu dung ->withTimestamps() phai dam bao co 2 cot cua Timestamps