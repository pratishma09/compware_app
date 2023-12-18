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
}
