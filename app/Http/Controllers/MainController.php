<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Quizzes;
use App\User;


class MainController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     //
    // }

    //

    public function homeAction (Request $request){
        

        $quizzesCollection = Quizzes::all()->shuffle();
        // var_dump($quizzesCollection);
        // die();
        
        

        

        return 
        view('home', [
            'quizzesCollection' => $quizzesCollection,
            
        ]);
  
    }
}



// public function adminAction()
//     {
//         if (!UserSession::isAdmin()) {

//             abort(403);
//         }

//         $platformCollection = Platform::all();

//         return view('admin', [
//             'platformCollection' => $platformCollection
//         ]);
//     }