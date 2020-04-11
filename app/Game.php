<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function users() {
        return $this->hasMany(User::class);
    }

    public function rounds() {
        return $this->hasMany(Round::class);
    }

    public function getCurrentRound() {

        return count($this->rounds) ? $this->rounds()->where(['number' => $this->rounds()->max('number')])->first() : null;
    }
}
