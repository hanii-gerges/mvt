<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_user',
        'to_user',
        'rate',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
