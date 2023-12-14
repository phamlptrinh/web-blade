<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HocVien_Lop extends Model
{
    use HasFactory;
    protected $table = "hoc_vien_lop";
    protected $primaryKey = ['hoc_vien_id', 'lop_id'];
    public $incrementing = false;
    
}
