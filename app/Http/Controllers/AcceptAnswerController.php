<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Policies\AnswerPolicy;

class AcceptAnswerController extends Controller
{
    public function AcceptAnswer(Answer $answer){
        $this->authorize('accept',$answer);
        $answer->question->acceptBestAnswer($answer);
        return back();
    }
}
