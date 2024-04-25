<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'path', 'type'];
    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return env('APP_URL') . '/' . $this->path;
    }
}
