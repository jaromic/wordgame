<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ([
                     [
                         'name' => 'Eva',
                         'email' => 'eva@example.com'
                     ],
                     [
                         'name' => 'Linda',
                         'email' => 'linda@example.com'
                     ],
                     [
                         'name' => 'Michael',
                         'email' => 'michael@example.com'
                     ],
                 ] as $userData) {

            $user = new User();
            $user->name = $userData['name'];
            $user->email = $userData['email'];
            $user->password = Hash::make($userData['name']);
            $user->save();
        }
    }
}
