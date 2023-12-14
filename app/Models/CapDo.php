<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class CapDo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'cap_do';


    function getLop():HasMany{
        return $this->hasMany(Lop::class, 'cap_do_id');
    }

    /* function __construct($ten, $ghi_chu)
    {
        $this->ten = $ten;
        $this->ghi_chu = $ghi_chu;
    } */
}
