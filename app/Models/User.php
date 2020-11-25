<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    /*
    One of the benefits of this trait is the access
    to a few helper methods that your model can use to 
    inspect the authenticated user’s token and scopes.
    */
    use HasFactory, Notifiable, HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'top_user',
        'status',
        'position_id',
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
