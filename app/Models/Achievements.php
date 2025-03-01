<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievements extends Model
{

    protected $fillable = ['id', 'name', 'game_id'];
    public function Game()
    {
        return $this->belongsTo(Game::class);
    }



}
