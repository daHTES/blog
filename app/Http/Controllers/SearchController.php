<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller{


        public function index(Request $request){

            $request->validate([
                'sea' => 'required',
            ]);

            $s = $request->sea;
            $posts = Post::where('title', 'LIKE', "%{$s}%")->with('category')->paginate(2);
            return view('posts.search', compact('posts', 's'));

        }


}
