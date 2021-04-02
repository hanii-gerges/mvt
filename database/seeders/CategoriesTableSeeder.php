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
            'name' => 'طب عام'
        ]);
        
        Category::create([
            'name' => 'باطني وقناة هضمية'
        ]);
        
        Category::create([
            'name' => 'نسائية وتوليد'
        ]);
        Category::create([
            'name' => 'أنف وأذن وحنجرة'
        ]);

        Category::create([
            'name' => 'كلى ومسالك بولية'
        ]);

        Category::create([
            'name' => 'عظام وروماتيزم'
        ]);
        
        Category::create([
            'name' => 'أطفال'
        ]);
        
        Category::create([
            'name' => 'أعصاب'
        ]);
        
        Category::create([
            'name' => 'عيون'
        ]);
    }
}
