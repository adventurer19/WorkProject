<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        Category::factory()->times(10)->create();

//        User::all()->each(function ($user)  use($categories){
//            $id= $user->id;
//            $key = array_rand($categories);
//            $categoryName = $categories[$key];
//            $category = new Category([
//                'user_id'=>$id,
//                'name'=>$categoryName
//            ]);
//
//
//        });
//        //        Category::factory()->times(10)->create();



    }
}
