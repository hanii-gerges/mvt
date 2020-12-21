<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    use HasFactory;

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
