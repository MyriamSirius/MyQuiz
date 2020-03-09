<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Utils\UserSession;




class UserController extends Controller
{
    

    public function signUpAction (Request $request){

        return view('signup');
     
    //    if ($request->getMethod() == 'POST') {
    //        // Le code à exécute lors de l'envoie du formulaire

    //        // Pour créer un nouvel utilisateur il faut créer un nouvel objet de la classe User
    //        $user = new User();
    //        $user->email = $request->input('email');
    //        //…
    //        $user->save();
    //    }
    //    return view('signup');
   
  
    }

    public function signUpSubmit (Request $request){

          
           // Le code à exécute lors de l'envoie du formulaire

           // Pour créer un nouvel utilisateur il faut créer un nouvel objet de la classe User
        
           $email = trim($request->input('email',''));
           $lastname = trim($request->input('name',''));
           $firstname = trim($request->input('firstname',''));
           $password = trim($request->input('password',''));
           $confirmPassword = trim($request->input('confirmPassword', ''));
        //    $updated_at = $request->input('updated_at',null);
        //    $created_at = $request->input('created_at',null);
        //    $status = $request->input('status', '1');
            

            $errors = []; // Stock les erreurs.

            if (empty($email)) {
                $errors[] ='Merci de bien vouloir remplir l\'email';
            }else if (filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) === false) {

                $errors[] = 'Email incorrect';
            }

            if(empty($firstname) || empty($lastname))
            {
                $errors[] = "Vous devez saisir votre nom et prénom";
            }

            if (empty($password)) {

                $errors[] = 'Mot de passe vide';
            }
    
            if (strlen($password) < 4) {
    
                $errors[] = 'Le mot de passe doit faire au moins 4 caractères';
            }
    
            if (empty($confirmPassword)) {
    
                $errors[] = 'Confirmation de mot de passe vide';
            }
    
            if ($password != $confirmPassword) {
    
                $errors[] = 'Les 2 mots de passe sont différents';
            }

            

            if (empty($errors)){
                
               // Vérification compte existant

               /*
                Je demande donc à éloquent de me trouver en BDD
                les utilisateurs qui ont leur champ "email" égal à $email.
                Eloquent, me répond toujours avec un objet Collection.
                Je demande donc à Collection donne moi ton premier résultat.
                Si il y a un résultat, j'obtiendrais un objet de type User.
                Si il n'y en a pas, j'obtiendrais un NULL.
                */

            $user = User::where('email', '=', $email)->first();
            if ($user) {

                $errors[] = 'Un compte avec cet email existe déjà';

            } else {

                $user = new User();

                // Encode via bcrypt (default) : http://php.net/manual/fr/function.password-hash.php
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Nouvelle instance de ma classe User
                $newUser = new User();
                $newUser->firstname = $firstname;
                $newUser->lastname = $lastname;
                $newUser->email = $email;
                $newUser->password = $hashedPassword;
                

                $newUser->save();

                // Redirect login
                return redirect()->route('signin');
                
            }
            
            }
            
            
            
            
            // else {
            //     $user->save();
            // }

           
       
       return view('signup', [ 'errors' => $errors,
       'values' => [
        'name' => $lastname,
        'firstname' => $firstname,
        'email' => $email
       ]
    ]);
        
        

        
  
    }

    public function signInAction (){

        return view('signin');
   
  
    }

    public function signInSubmit (Request $request){

        $errors = [];

        $email = trim($request->input('email', ''));
        $password = trim($request->input('password', ''));

        if (empty($email)) {

            $errors[] = 'Email vide';

        } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

            $errors[] = 'Email incorrect';
        }

        if (empty($password)) {

            $errors[] = 'Mot de passe vide';
        }

        if (strlen($password) < 4) {

            $errors[] = 'Le mot de passe doit faire au moins 4 caractères';
        }

        if (empty($errors)) {

            // Test si le compte existe
            $user = User::where('email', '=', $email)->first();

            // Si j'ai bien un user...
            if ($user) {

                // https://www.php.net/manual/fr/function.password-verify.php
                /*
                    La fonction de php password_verify va prendre 2 arguments
                    1er: le mdp saisi à vérifier (saisi par l'utilisateur)
                    2em: le mdp hashé présent en BDD

                    La fonction va hasher le 1er argument et le comparer avec le 2eme

                    Si ils sont identiques, alors c'est que le mdp saisi est le bon
                    Si ils sont différents, alors c'est que le mdp saisi est incorrect
                */
                if (password_verify($password, $user->password)) {

                    // TODO: retenir en session l'utilisateur connecté
                    // Je connecte mon utilisateur grace à la méthode "connect"
                    // de mon objet UserSession
                    UserSession::connect($user);

                    return redirect()->route('moncompte');

                } else {

                    $errors[] = 'L\'identifiant et/ou mot de passe incorrect';
                }

            // sinon...
            } else {

                $errors[] = 'L\'identifiant et/ou mot de passe incorrect';
            }
        }

        return view('user/signin', [
            'errors' => $errors,
            'values' => [
                'email' => $email
                // Note: pas de password (sécurité)
            ]
        ]);
  
    }

    public function loggoutAction()
    {
        UserSession::disconnect();

        return redirect()->route('home');
    }

    public function signAccountAction ()
    {
        return view('moncompte');
    }
}