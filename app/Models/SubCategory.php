<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'sub_categories';

    protected $fillable = [
        'name_sub_categories', 'slug'
    ];

    protected $hidden = [];
}
