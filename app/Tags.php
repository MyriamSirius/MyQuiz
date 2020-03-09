<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    // public $timestamps = false;

    public function quizzes()
    {
        return $this->belongsToMany('App\Quizzes', 'quizzes_has_tags');
    }

}