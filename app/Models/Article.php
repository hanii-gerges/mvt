<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Article extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable =
    [
        'user_id',
        'category_id',
        'title',
        'body',
        'status',
        
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

  
}
