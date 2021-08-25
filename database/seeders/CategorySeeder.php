<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = "Men's Fashion";
        $category->slug = "A new style cloths for men.";
        $category->save();

        $category = new Category();
        $category->name = "Women's Fashion";
        $category->slug = "A new style cloths for women.";
        $category->save();

        $category = new Category();
        $category->name = "Electronic Devices";
        $category->slug = "Phone, Laptop, PC, Gaming Console, etc.";
        $category->save();

        $category = new Category();
        $category->name = "Electronic Accessories";
        $category->slug = "Electronic parts of Phone, Laptop, PC, and so on.";
        $category->save();
    }
}
