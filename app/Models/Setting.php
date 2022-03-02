<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'website',
        'link_1',
        'link_2',
        'link_3',
    ];
    public function getLogoAttribute($value)
    {
        return $value ? asset('storage/profile' . '/' . $value) : NULL;
    }
}
