<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requestcertificate extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'contact',
        'startdate',
        'enddate',
        'duration',
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
