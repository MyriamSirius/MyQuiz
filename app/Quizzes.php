<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quizzes extends Model
{


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quizzes';

    public function questions()
    {
        return $this->hasMany('App\Questions');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'app_users_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tags', 'quizzes_has_tags');
    }

}