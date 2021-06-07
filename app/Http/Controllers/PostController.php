<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
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


   public function edit(Request $request){
    $post = Post::find($request->id);
    return view('edit', compact('post'));
    
   }




   public function update(Request $request){
;




    $title=$request->title;
    $body=$request->body;

   

    $post = Post::find($request->id);

	$post->title = $title;
    
	$post->body = $body;

    $post->user_id = $request->user()->id;

	$post->save();


    // if($request->hasfile('imageName')){
        
    //     foreach ($request->file('imageName') as $image) {
    //         $postImage = Image::find($request->id);
    //         $name = time().rand(1,100).'.'.$image->extension();
    //                $image->move(public_path('files'), $name);
    //                $postImage->imageName=$name;
    //                $postImage->post_id = $post->id;
    //                $postImage->save();
    //     }
    // }

    // return redirect('crud');

   }
}
