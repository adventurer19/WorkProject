<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{

  /**
   * Run the database seeds.
   *
   * @return void
   */
    public function run()
    {

      //$data = ['food','drinks','phone','cars','cloths','education','technologies','music','entrainment','vacation'];

        $data = [
        'kebab',
        'wine',
        'Samsung-S8',
        'RangeRover',
        'T-shirt',
        'notebook',
        'laptop',
        'microphone',
        'puzzle',
        'umbrella',
        ];
        for ($i = 1; $i <= 10; $i++) {
            $product = new Product([
            'user_id' => $i,
            'category_id' => $i,
            'name' => $data[$i - 1],
            'description' => 'This is default description',
            'image' => 'uploads/default.png',
            ]);
            $product->save();
        }
    }
}
