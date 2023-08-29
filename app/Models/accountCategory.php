<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accountCategory extends Model
{
    protected $table = 'account_category';

    use HasFactory;
    protected $guarded = [];
}
