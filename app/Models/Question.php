<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function user(){
        return $this->belongsto(User::class);
    }
    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function getUrlAttribute(){
        return route('questions.show',$this->id);
    }
    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }
    public function getStatusAttribute(){
        if($this->answers > 0){
            if ($this->best_answer_id){
                return "answered-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }
 
}
