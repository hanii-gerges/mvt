<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'head_id' => User::all()->random()->id,
            'title' => $this->faker->realText(20),
            'body' => $this->faker->realText(150),
            'status' => $this->faker->randomElement([0,1]),
        ];
    }
}
