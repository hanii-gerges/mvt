<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'الاسعافات الاولية'
        ]);
        
        Category::create([
            'name' => 'طب الاسنان'
        ]);
        
        Category::create([
            'name' => 'امراض القلب'
        ]);
        Category::create([
            'name' => 'امراض العظام'
        ]);
    }
}
