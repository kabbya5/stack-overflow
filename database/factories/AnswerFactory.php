<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Answer;

class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Answer::class;

    public function definition()
    {
        return [
            'body' => $this->faker->paragraph(rand(4,6)),
            'user_id' => \App\Models\User::pluck('id')->random(),
            'votes_count' => rand(-3,10),
        ];
    }
}
