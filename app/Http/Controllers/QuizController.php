<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Quizzes;
use App\User;
use App\Questions;
use App\Levels;
use App\Tags;
use App\Answers;
use App\Utils\UserSession;



class QuizController extends Controller
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

    public function quizAction ($id){
       

        $idQuiz = Quizzes::find($id);
        // var_dump($id);
        // var_dump($idQuiz->title);
        // die();

        $answers = Answers::all();
        
        
        $tags=Quizzes::find($id)->tags;

        // $questions = Quizzes::find($id)->questions;

        // $nbquestion=$questions->count();
        // var_dump($nbquestion);
        // die();


        // Je vérifie que le quiz existe bien !
        if (empty($idQuiz)) {

            /* Si le quiz n'existe pas c'est que:
                Soit Ben à codé le site avec ces pieds...
                Soit un petit malin a changé les url manuellement !

                Du coup, quoi qu'il arrive, je redirige vers la home !
            */
            return redirect()->route('home');
        }

        $usersCollection = User::all();
 
        $questions = Quizzes::find($id)->questions;


        if (!UserSession::isConnected()) {
        return 
        view('quiz', [
            'quiz' => $idQuiz,
            'answers' => $answers,
            'tags'=> $tags,

        ]);
        }else {
            return 
            view('quizjeu', [
                'quiz' => $idQuiz,
                'answers' => $answers,
                'questions'=> $questions,
                'tags'=> $tags,
                'user'=>$usersCollection

            ]);
        }
  
    }

    public function quizPost (Request $request,$id){

        $idQuiz = Quizzes::find($id);
        $answers = Answers::all();
        $tags=Quizzes::find($id)->tags;
        $usersCollection = User::all();
        $questions = Quizzes::find($id)->questions;
        $questionId = $idQuiz->id;
        $retour = ($request->input());
        $answerId = Answers::find($id)->id;
        
            // dump($retour[$answerId]);
            // dump($answerId);
            // dump($retour);
            
        
        
        $score = 0;
        foreach ($retour as $questionId=>$answerId){
            if ($questionId == $answerId){
                $score ++;
            
        };};
        
        /*

        foreach ($questions as $question) 


            $showQuestions = [
                [
                    'id' => ,
                    'name' => ,
                    'answers' => [
                        [
                            'description' => ,
                            'isRightAnswer' => true/false,
                            'wasChosen' => true/fals
                        ]
                    ]
                ]
            ]
            
        */
        

            
            

            
       
            return  view('quizpost', [
                'retour' => $retour,
                'quiz' => $idQuiz,
                'answers' => $answers,
                'questions'=> $questions,
                'tags'=> $tags,
                'user'=>$usersCollection,
                'score'=>$score,
                
                
            ]);
        

        }
  
    
}
