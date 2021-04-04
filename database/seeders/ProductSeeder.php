<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();

        $product->name = "T-Shirt";
        $product->description = "T-Shirt for male with classic fashion.";
        $product->price = 450;
        $product->image = "img\\1617388082.jpg";
        $product->category_id = 1;
        $product->save();
    }
}
