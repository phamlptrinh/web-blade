<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LopHoc extends Model
{
    use HasFactory;
    protected $table = 'lop_hoc';

    public function getChiNhanh(): BelongsTo
    {
        return $this->belongsTo(ChiNhanh::class, 'chi_nhanh_id');// quan trong la cai cot chi dinh nay
    }
}
