<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class GiangVien extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'giang_vien';

    public function getLop() : HasMany{
        return $this->hasMany(Lop::class, 'giang_vien_id', 'id');
    }
}
