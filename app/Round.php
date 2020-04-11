<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    const ROUND_TIME_SECONDS = 5; // 3 * 60;

    protected $dates = [
        'started_at',
    ];

    public function game() {
        return $this->belongsTo(Game::class);
    }

    public function initialize() {
        $this->number = $this->game->rounds()->max('number')+1;
        $this->field()->save(new Field());
    }

    public function isCurrent() {
        return ($this->number == $this->game->rounds()->max('number'));
    }

    public function start() {
        $this->started_at = time();
        $this->save();
    }

    public function getRemainingTime() {
        return max(0, $this->started_at->getTimestamp() + self::ROUND_TIME_SECONDS - time());
    }

    public function field() {
        return ($this->hasOne(Field::class));
    }
}
