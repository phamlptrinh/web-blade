<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class HocVien extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'hoc_vien';

    function getLop() : BelongsToMany{
        return $this->belongsToMany(Lop::class, 'hoc_vien_lop', 'hoc_vien_id', 'lop_id')
        ->withTimestamps();
    }
}
