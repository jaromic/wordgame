<?php

use App\Dice;
use Illuminate\Database\Seeder;

class DiceSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Dice::getDiceInitStrings() as $initString) {
            $newDice = new Dice();
            $newDice->setLetters($initString);
            $newDice->save();
        }
    }
}
