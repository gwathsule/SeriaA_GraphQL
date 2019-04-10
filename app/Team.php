<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable =
        [
            'technician',
            'qtd_yellow_cards',
            'qtd_red_cards',
            'position',
            'points',
            'name',
            'initials',
            'shield_image'
        ];
}
