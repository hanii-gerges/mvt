<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(5)->create();

        User::create([
            'fullname' => 'maher',
            'email' => 'mahericpc@gmail.com',
            'password' => bcrypt('12345678'),
            'section_id' => 71,
        ]);

        User::create([
            'fullname' => 'najm',
            'email' => 'nabhaninajm@gmail.com',
            'password' => bcrypt('12345678'),
            'section_id' => 71,
        ]);

        User::create([
            'fullname' => 'hani',
            'email' => 'abualhen@gmail.com',
            'password' => bcrypt('12345678'),
            'section_id' => 71,
        ]);
    }
}
