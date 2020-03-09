<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'answers';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    // public $timestamps = false;

    // public function questions()
    // {
    //     return $this->belongsTo('App\Questions', 'questions_id');
    // }

}