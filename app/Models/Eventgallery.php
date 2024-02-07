<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Eventgallery extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function images(){
        return $this->hasMany(Image::class);
    }
    protected static function boot()
      {
          parent::boot();
  
          static::creating(function ($eventgallery) {
              $eventgallery->eventgallery_slug = Str::slug($eventgallery->gallery_name);
          });
      }
}
