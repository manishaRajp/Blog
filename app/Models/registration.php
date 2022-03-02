<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class registration extends Authenticatable
{
    use HasFactory, Notifiable;
    public $timestamps = false;
    protected $table = "registrations";
    protected $fillable = [
        'user_name',
        'password',
        're_password',
        'email',
        'profile',
    ];

    public function getProfileAttribute($value)
    {
        return $value ? asset('storage/profile' . '/' . $value) : NULL;
    }

    public function Userlikes()
    {
        return $this->belongsToMany('blog', 'likes', 'user_id', 'blog_id');
    }
}
