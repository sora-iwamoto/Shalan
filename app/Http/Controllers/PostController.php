<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function store (Post $post, Request $request) {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect("/home");
    }
}
