<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            'name' => 'متطوع',
        ]);
        Position::create([
            'name' => 'رئيس قسم',
        ]);
        Position::create([
            'name' => 'رئيس فرع',
        ]);
        Position::create([
            'name' => 'اداري',
        ]);
    }
}
