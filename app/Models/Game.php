<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
   protected $table = "games";
    protected $fillable = ['name', 'qtd_achievements'];

    public function achievements()
    {
        return $this->hasMany(Achievements::class, 'game_id');
   }

   protected static function booted()
   {
       self::addGlobalScope('ordered', function (Builder $builder) {
           $builder->orderBy('name');
       });
   }
}
