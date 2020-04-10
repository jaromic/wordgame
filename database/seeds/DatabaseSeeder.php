<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seeders = [
            DiceSeeder::class,
            GameSeeder::class,
            UserSeeder::class,
        ];
        foreach ($seeders as $seeder) {
            $this->call($seeder);
        }
    }
}
