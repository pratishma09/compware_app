<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;

    protected $fillable=[
        'course_name',
        'course_schedule',
        'course_desc',
        'course_logo',
        'course_fee',
        'course_startdate',
        'course_enddate',
        'course_pdf',
        'team_id',
        'coursecategory_id'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }
    public function coursecategory()
    {
        return $this->belongsTo(Coursecategory::class, 'coursecategory_id', 'id');
    }
    public function enrolls()
    {
        return $this->hasMany(Enroll::class);
    }
    public function enrollments()
    {
        return $this->belongsToMany(Enroll::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            $course->course_slug = Str::slug($course->course_name);
        });
    }
}
