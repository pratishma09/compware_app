<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    use HasFactory;

    protected $fillable=[
        'enroll_name',
        'course_id',
        'enroll_phone',
        'enroll_email',
        'enroll_schedule'
    ];
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    
}
