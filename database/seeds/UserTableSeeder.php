<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Tun Aung',
            'email' => 'tunaung@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        User::create([
            'name' => 'Aung Mg',
            'email' => 'aungmg@gmail.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
