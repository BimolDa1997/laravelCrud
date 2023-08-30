<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post_info;

class postController extends Controller
{
    public function CreatePost(Request $request){
        $postInfo = $request->validate([
            'title' => 'required',
            'body'  => 'required'
        ]);

        $postInfo['title'] = strip_tags($postInfo['title']);
        $postInfo['body']  = strip_tags($postInfo['body']);
        $postInfo['user_id'] = auth()->id();
        Post_info::create($postInfo);
        return redirect('/');
      }
}
