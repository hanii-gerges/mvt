<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriesTableSeeder::class,
            PositionsTableSeeder::class,
            SectionsTableSeeder::class,
            BranchesTableSeeder::class,
            UsersTableSeeder::class,
            EventsTableSeeder::class,
            ArticlesTableSeeder::class,
            TagsTableSeeder::class,
            QuestionsTableSeeder::class,
            NewsTableSeeder::class,
        ]);
    }
}
