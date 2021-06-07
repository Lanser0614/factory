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

	foreach ($request->file('images') as $image) {
		$postImage = new Image;
		$name = $image->getClientOriginalName();
		$path = public_path('images/post/').$post->id.'/'.$name;
		$image->move($path);
		$postImage->post_id = $post->id;
		$postImage->image_path = $path;
		$postImage->save();
	}

    return back();
   }

   public function crud(){
       $post = Post::with(['images'])->get();
       return  view('crud', compact('post'));
   }
}
