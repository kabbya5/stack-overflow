<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
class FavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store (Question $question){
        $question->favorites()->attach(auth()->id());
        return back();
    }

    public function destroy(Question $question){
        $question->favorites()->detach(auth()->id());
        return back();
    }

    public function vote(Question $question){
        $vote = (int) request()->vote;
        auth()->user()->voteQuestion($question, $vote);
        return back();
    }
    public function answerVote(Answer $answer){
        $vote = (int) request()->vote;
        auth()->user()->voteAnswer($answer,$vote);
        return back();
    }
}
