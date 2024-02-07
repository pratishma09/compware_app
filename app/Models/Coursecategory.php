<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coursecategory extends Model
{
    use HasFactory;

    protected $fillable=[
        'coursecategory_name'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
