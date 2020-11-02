<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::create([
            'name' => 'الاسعافات الاولية',
        ]);
        Section::create([
            'name' => 'الاعلام',
        ]);
        Section::create([
            'name' => 'التصميم',
        ]);
        Section::create([
            'name' => 'التواصل الاجتماعي',
        ]);
        Section::create([
            'name' => 'الدعم اللوجستي',
        ]);
        Section::create([
            'name' => 'المعلومات الطبية',
        ]);
        Section::create([
            'name' => 'التوعية',
        ]);
        Section::create([
            'name' => 'العلاقات العامة',
        ]);
    }
}
