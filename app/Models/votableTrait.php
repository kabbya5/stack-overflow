<?php 
namespace App\Models;

trait VotableTrait
{
    public function votes(){
        return $this->morphToMany(User::class, 'votable');
    }
    public function upVotes(){
        return $this->votes()->wherePivot('vote', 1);
    }
    public function downVotes(){
        return $this->votes()->wherePivot('vote', -1);
    }
}