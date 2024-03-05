<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable=[
        'team_name',
        'team_post',
        'team_role',
        'team_email',
        'team_description',
        'team_signature',
        'team_image'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function teams()
    {
        return $this->hasMany(Course::class);
    }
    public function studentcertificates(){
        return $this->belongsToMany(StudentCertificate::class);
    }
    public function requestcertificates(){
        return $this->belongsToMany(RequestCertificate::class);
    }
}
