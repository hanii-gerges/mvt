<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Position;
use App\Models\Section;
use App\Models\Branch;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'position_id' => Position::all()->random()->id,
            'section_id' => Section::all()->random()->id,
            'branch_id' => Branch::all()->random()->id,
            'fullname' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'bio' => $this->faker->realText(300),
            'status' => $this->faker->randomElement([0,1]),
        ];
    }
}
