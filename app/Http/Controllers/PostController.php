<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
   public function take(){
       $tak =  Post::all();
       return $tak;
   }

   public function index(){
       return view('welcome');
   }

   public function store(Request $request){


  
    $post = new Post();
    $post->title=$request->title;
    $post->body=$request->body;
    $post->user_id = $request->user()->id;
    $post->save();
    return $post;
   }
}
