<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Question;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Question::class;

    public function definition()
    {
        return [
            'title' => rtrim($this->faker->sentence(rand(5, 10)), "."),
            'body'  => $this->faker->paragraphs(rand(3,7), true),
            'views' => rand(0,10),
            'best_answer_id' => rand(0,10),
            'votes' => rand(-3,10),
        ];
    }
}
