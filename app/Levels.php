<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Levels extends Model
{


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'levels';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    // public $timestamps = false;

    public function questions()
    {
        return $this->hasMany('App\Questions');
    }

    public function getCssClass()
    {
        $css_class_name = '';

        switch($this->id){
            case 1:
                $css_class_name = 'beginner';
                break;
            case 2:
                $css_class_name = 'medium';
                break;
            case 3:
                $css_class_name = 'expert';
                break;
        }

        return 'level--' . $css_class_name;
    }

}