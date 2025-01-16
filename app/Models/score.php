<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class score extends Model
{
    protected $fillable = [
        'match_id',
        'player_id',
        'team_id',
        'goals',
        'assists',
        'red_cards',
        'yellow_cards',
    ];

}
