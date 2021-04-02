<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::create([
            'name' => 'الحسكة',
        ]);
        Branch::create([
            'name' => 'دير الزور',
        ]);
        Branch::create([
            'name' => 'الرقة',
        ]);
        Branch::create([
            'name' => 'حلب',
        ]);
        Branch::create([
            'name' => 'ادلب',
        ]);
        Branch::create([
            'name' => 'اللاذقية',
        ]);
        Branch::create([
            'name' => 'طرطوس',
        ]);
        Branch::create([
            'name' => 'حماة',
        ]);
        Branch::create([
            'name' => 'حمص',
        ]);
        Branch::create([
            'name' => 'دمشق',
        ]);
        Branch::create([
            'name' => 'السويداء',
        ]);
        Branch::create([
            'name' => 'درعا',
        ]);
        Branch::create([
            'name' => 'القنيطرة',
        ]);
    }
}
