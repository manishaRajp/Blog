<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CreateBlog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'slug',
        'shorlink',
        'category_id',
        'status',
        'published_at'
    ];
    public function getProfileAttribute($value)
    {
        return $value ? asset('storage/profile' . '/' . $value) : NULL;
    }
    public function setSlugAttribute()
    {
        $this->attributes['slug'] = Str::slug($this->title, "-");
    }
}
