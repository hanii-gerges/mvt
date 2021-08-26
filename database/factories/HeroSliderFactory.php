<?php

namespace Database\Factories;

use App\Models\HeroSlider;
use Illuminate\Database\Eloquent\Factories\Factory;

class HeroSliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HeroSlider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->title(),
            "body" => $this->faker->realText(100),
            'order' => $this->faker->numberBetween(1,1000),
            "type" => $this->faker->randomElement(["i","v"])

        ];
    }
}
