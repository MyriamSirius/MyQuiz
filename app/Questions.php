<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'questions';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    // public $timestamps = false;

    public function levels()
    {
        return $this->belongsTo('App\Levels');
    }

    public function answers()
    {
        return $this->hasMany('App\Answers', 'questions_id');
    }

}