<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question_user extends Model
{
    protected $table = 'question_user';

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
