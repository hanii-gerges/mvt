<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'فوائد الليمون',
        ]);

        Tag::create([
            'name' => 'بشرة',
        ]);

        Tag::create([
            'name' => 'تجميل',
        ]);

        Tag::create([
            'name' => 'الارق',
        ]);

        
    }
}
