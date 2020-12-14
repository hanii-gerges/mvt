<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::all()->random()->id,
            'fullname' => $this->faker->name,
            'age' => $this->faker->numberBetween(10,100),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'reply_method' => $this->faker->randomElement(['whatsapp','facebook','email']),
            'social_link' => $this->faker->url,
            'title' => $this->faker->realText(20),
            'body' => $this->faker->realText(150),
            'status' => $this->faker->randomElement([0,1]),
            'sharable_name' => $this->faker->randomElement([0,1]),
            'sharable_content' => $this->faker->randomElement([0,1]),
        ];
    }
}
