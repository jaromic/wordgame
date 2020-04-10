<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dice extends Model
{

    public function setLetters(string $letters = '')
    {
        $lettersArray = str_split($letters, 1);
        sort($lettersArray);
        $this->letters = implode('', $lettersArray);
    }

    /**
     * @return array
     */
    public static function getDiceInitStrings()
    {
        return [
            'AIXORF',
            'ABILRT',
            'APECDM',
            'ASOIRM',
            'AQOMBJ',
            'EKNTOU',
            'ELRWIU',
            'EATIOA',
            'ERALCS',
            'ENULGY',
            'EDONST',
            'EZAVND',
            'ERINSH',
            'ELUPTS',
            'ETIVNG',
            'EFSHEI',
        ];
    }

    /**
     * @return string[]
     */
    public function getLetters() : array {
        return str_split($this->letters);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return implode(', ', str_split($this->letters));
    }

}
