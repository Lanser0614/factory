<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function take(){
       $tak =  Post::all();
       return $tak;
   }
}
