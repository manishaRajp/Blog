<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'user_id',
        'description',
        'image',
        'slug',
        'shorlink',
        'category_id',
        'status',
        'published_at'
    ];
    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function Userlikes()
    {
        return $this->belongsToMany(registration::class, 'likes');
    }
    //like count process
    public function likes()
    {
        return $this->hasMany(Like::class, 'blog_id', 'id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    // public function comments()
    // {
    //     return $this->hasMany(Comment::class)->whereNull('id');
    // }
    public function comments()
    {
        return $this->belongsToMany(User::class, 'comments');
    }
    //count how many comments in blog
    public function blogComment()
    {
        return $this->hasMany(Comment::class, 'blog_id', 'id');
    }

    public function getProfileAttribute($value)
    {
        return $value ? asset('storage/profile' . '/' . $value) : NULL;
    }
    //slug
    public function setSlugAttribute()
    {
        $this->attributes['slug'] = Str::slug($this->title, "-");
    }

}
