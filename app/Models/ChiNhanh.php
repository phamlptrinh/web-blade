<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChiNhanh extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'chi_nhanh';

    /* public function lop_hoc(): HasMany
    {
        return $this->hasMany(LopHoc::class);//đây là dạng ngằn gọn, par2 tự suy là
        tên table của lớp học _id, par3 tự suy là primary key của bảng cùng tên function.
    } */

    public function getLop() : HasMany{
        return $this->hasMany(Lop::class, 'chi_nhanh_id', 'id');
    }

    /* function __construct($ten, $dia_chi, $phuong_xa, $quan_huyen, $tinh_tp)
    {
        $this->ten = $ten;
        $this->dia_chi = $dia_chi;
        $this->phuong_xa = $phuong_xa;
        $this->quan_huyen = $quan_huyen;
        $this->tinh_tp = $tinh_tp;
    } */
}
