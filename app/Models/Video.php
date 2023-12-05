<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'videos';

    protected $fillable = [
        'video_title', 'link', 'link_thumbnail', 'id_sub_categories'
    ];

    protected $hidden = [];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'id_sub_categories', 'id');
    }
}
