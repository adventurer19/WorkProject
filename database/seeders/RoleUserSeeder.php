<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // setting all users by default to have role_id on 2
        // table roles -> id 1 is Admin and id 2 is User,
        // so role_id = 2 means that the user is assign to have role user.
        // check table role_user
        User::all()->each(function ($user){
            $user->roles()->attach([
               'role_id'=>2,
            ]);

        });
        $user = User::where('name','nikolay')->first();
        $user->roles()->attach([
           'role_id'=>1
        ]);


        //fix syntax

//        $user = User::all()->last()->first();
//        $user->roles()->attach([
//            'role_id'=>1
//        ]);


    }
}
