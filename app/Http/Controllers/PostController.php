<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Models\User;
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
	$post->title = $request->title;
	$post->body = $request->body;
    $post->user_id = $request->user()->id;
	$post->save();

    if($request->hasfile('imageName')){
        
	foreach ($request->file('imageName') as $image) {
        $postImage = new Image;
        $name = time().rand(1,100).'.'.$image->extension();
               $image->move(public_path('files'), $name);
               $postImage->imageName=$name;
               $postImage->post_id = $post->id;
               $postImage->save();
	}
}

    return back();
   }

   public function crud(){
       $post = Post::all();
       $img = Post::all();
       return  view('crud', compact('post', 'img'));
   }
}
