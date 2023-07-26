<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = ['reg_code', 'dis_code', 'dis_name'];

    public function regions()
    {
        return $this->belongsTo(Region::class, 'reg_code');
    }
}
