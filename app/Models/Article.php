<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        // fill gambar nanti aja
        'writer', 'article_title', 'article_contens', 'main_img', 'id_categories', 'id_sub_categories', 'slug'
    ];

    protected $hidden = [];

    // relasi antar table
    public function video()
    {
        return $this->hasOne(Video::class, 'id', 'id_video');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_categories', 'id');
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'id_sub_categories', 'id');
    }
}
