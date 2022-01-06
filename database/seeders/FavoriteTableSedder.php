<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\User;

class FavoriteTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('favorites')->delete();

        $users = User::pluck('id')->all();
        $numberOfUser = count($users);
        foreach(Question::all() as $question){
            for ($i = 0; $i <rand(0, $numberOfUser); $i++){
                $user = $users[$i];
                $question->favorites()->attach($user);
            }
        }
    }
}
