<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tags;




class TagsController extends Controller
{
    

    public function tagAction (Request $request){


        $tagsCollection = Tags::all();
        

        return 
        view('tags', [
            'tags' => $tagsCollection,
        ]);
     
    
   
  
    }

    public function tagSelect (Request $request, $id){


        $tags = Tags::find($id);
        

        return 
        view('tagsselect', [
            'currentTags' => $tags,
        ]);
     
    
   
  
    }

  
    }

    
