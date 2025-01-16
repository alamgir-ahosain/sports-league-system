<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class matches extends Model
{

    use HasFactory;
    protected $fillable = [


        'date',
        'home_team',
        'home_logo',
        'away_team',
        'away_logo',
        'home_score',
        'away_score',
        'home_result',
        'away_result'
    ];
    
}
