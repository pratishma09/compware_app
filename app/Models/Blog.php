<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'blogs_name',
        'blogs_author',
        'blogs_desc',
        'blogs_image',
      ];
      protected static function boot()
      {
          parent::boot();
  
          static::creating(function ($blog) {
              $blog->blogs_slug = Str::slug($blog->blogs_name);
          });
      }
}
