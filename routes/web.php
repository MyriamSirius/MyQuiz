<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

$router->get('/', [
    // La clé de tableau "as" me permet d'assigner un nom à la route
    'as' => 'home',
    // La clé de tableau "uses" me permet d'assigner un controller/méthode à la route
    'uses' => 'MainController@homeAction'
]);


$router->get('/quiz/{id}', [
    // La clé de tableau "as" me permet d'assigner un nom à la route
    'as' => 'quiz',
    // La clé de tableau "uses" me permet d'assigner un controller/méthode à la route
    'uses' => 'QuizController@quizAction'
]);

$router->post('/quiz/{id}', [
    // La clé de tableau "as" me permet d'assigner un nom à la route
    'as' => 'quizpost',
    // La clé de tableau "uses" me permet d'assigner un controller/méthode à la route
    'uses' => 'QuizController@quizPost'
]);




$router->get('/signup', [
    // La clé de tableau "as" me permet d'assigner un nom à la route
    'as' => 'signup',
    // La clé de tableau "uses" me permet d'assigner un controller/méthode à la route
    'uses' => 'UserController@signUpAction'
]);

$router->post('/signup', [
    // La clé de tableau "as" me permet d'assigner un nom à la route
    'as' => 'signupsubmit',
    // La clé de tableau "uses" me permet d'assigner un controller/méthode à la route
    'uses' => 'UserController@signUpSubmit'
]);

$router->get('/account', [
    // La clé de tableau "as" me permet d'assigner un nom à la route
    'as' => 'moncompte',
    // La clé de tableau "uses" me permet d'assigner un controller/méthode à la route
    'uses' => 'UserController@signAccountAction'
]);

$router->get('/signin', [
    // La clé de tableau "as" me permet d'assigner un nom à la route
    'as' => 'signin',
    // La clé de tableau "uses" me permet d'assigner un controller/méthode à la route
    'uses' => 'UserController@signInAction'
]);

$router->post('/signin', [
    // La clé de tableau "as" me permet d'assigner un nom à la route
    'as' => 'signinsubmit',
    // La clé de tableau "uses" me permet d'assigner un controller/méthode à la route
    'uses' => 'UserController@signInSubmit'
]);

$router->get('/tags', [
    // La clé de tableau "as" me permet d'assigner un nom à la route
    'as' => 'tags',
    // La clé de tableau "uses" me permet d'assigner un controller/méthode à la route
    'uses' => 'TagsController@tagAction'
]);

$router->get('/tags/{id}/quiz', [
    // La clé de tableau "as" me permet d'assigner un nom à la route
    'as' => 'tagsselect',
    // La clé de tableau "uses" me permet d'assigner un controller/méthode à la route
    'uses' => 'TagsController@tagSelect'
]);

$router->get('/loggout', [
    'uses'  => 'UserController@loggoutAction',
    'as'    => 'loggout'
]);