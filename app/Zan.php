<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zan extends Model
{
    protected $table = "zans";
    protected $fillable = ['user_id','question_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
