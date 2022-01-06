<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\User;
use App\Models\Answer;

class UsersQuestionsAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('answers')->delete();
        \DB::table('questions')->delete();
        \DB::table('users')->delete();

        \App\Models\User::factory()->count(10)->create()->each(function($u){
            $u->questions()
            ->saveMany(
                \App\Models\Question::factory()->count(rand(1,5))->make()
            )->each(function($a){
                $a->answers()->saveMany(
                    \App\Models\Answer::factory()->count(rand(1, 3))->make()
                );
            });
        }); 

    }
}
