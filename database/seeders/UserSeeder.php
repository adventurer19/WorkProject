<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
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
        User::factory()->times(10)->create();
        $user = new User();
        $user->name='Nikolay';
        $user->email='nikolay01@abv.bg';
        $user->password = Hash::make('nikolay01');
        $user->email_verified_at = now();
        $user->remember_token = Str::random(10);
        $user->save();

    }
}
