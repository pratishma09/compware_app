<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentcertificate extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'email',
        'image',
        'verificationId',
        'startdate',
        'enddate',
        'duration',
        'trainer_title',
        'course_id',
        'team_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }
}
