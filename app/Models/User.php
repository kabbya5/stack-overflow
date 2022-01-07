<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Question;
use App\Models\Answer;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function answers(){
        return $this->hasMany(Answer::class);
    }
    public function getAvatarAttribute(){
        $email = $this->email;
        $size = 32;
        return  "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?s=" . $size;
    }

    public function favorites(){
        return $this->BelongsToMany(Question::class,'favorites')->withTimestamps();
    }

    public function voteQuestions(){
        return $this->morphedByMany(Question::class, 'votable');
    }
    public function voteAnswers(){
        return $this->morphedByMany(Answer::class,'votable');
    }

    // public function voteQuestion(Question $question, $vote){
    //     $voteQuestions = $this->voteQuestions();
    //     if($voteQuestions->where('votable_id',$question->id)->exists()){
    //         $voteQuestions->updateExistingPivot($question, ['vote' => $vote]);
    //     }else{
    //         $voteQuestions->attach($question, ['vote' =>$vote]);
    //     }
    //     $question->load('votes');
    //     $downVotes = (int) $question->downVotes()->sum('vote');
    //     $upVotes = (int) $question->upVotes()->sum('vote');
    //     $question->votes_count = $upVotes + $downVotes;
    //     $question->save();
    // }

    // public function voteAnswer(Answer $answer,$vote){
    //     $voteAnsers = $this->voteAnswers();
    //     if($voteAnsers->where('votable_id',$answer->id)->exists()){
    //         $voteAnsers->updateExistingPivot($answer,['vote' => $vote]);
    //     }else{
    //         $voteAnsers->attach($answer,['vote' => $vote]);
    //     }
    //     $answer->load('votes');
    //     $downVotes = (int) $answer->downVotes()->sum('vote');
    //     $upVotes = (int) $answer->upVotes()->sum('vote');
    //     $answer->votes_count = $upVotes + $downVotes;
    //     $answer->save();
    // }
    public function voteAnswer(Answer $answer, $vote){
        $voteAnsers = $this->voteAnswers();
        $this->_vote($voteAnsers, $answer, $vote);
    }
    public function voteQUestion(Question $question, $vote){
        $voteQuestions= $this->voteQuestions();
        $this->_vote($voteQuestions, $question, $vote);
    }
    public function _vote($relationship, $model, $vote){
        if($relationship->where('votable_id', $model->id)->exists()){
            $relationship->updateExistingPivot($model,['vote' => $vote]);
        }else{
            $relationship->attach($model,['vote'=>$vote]);
        }

        $model->load('votes');
        $downVotes = (int) $model->downVotes()->sum('vote');
        $upVotes = (int) $model->upVotes()->sum('vote');
        $model->votes_count = $upVotes + $downVotes;
        $model->save();
    }

}
