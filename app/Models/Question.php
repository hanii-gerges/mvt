<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'fullname',
        'age',
        'phone',
        'email',
        'reply_method',
        'social_link',
        'title',
        'body',
        'sharable_name',
        'sharable_content',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function answer()
    {
        return $this->hasOne(Answer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
}
