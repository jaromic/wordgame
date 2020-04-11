<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function round()
    {
        return $this->belongsTo(Round::class);
    }

    public function throwDice()
    {
        $letters = '';

        foreach (Dice::all() as $dice) {
            $result = random_int(0, 5);
            $letters .= $dice->getLetters()[$result];
        }
        $this->content = $letters;
        $this->save();
    }
}
