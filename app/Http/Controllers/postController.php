<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post_info;

class postController extends Controller
{
    
    public function DeletePost(Post_info $post){
        if(auth()->user()->id === $post['user_id']){
            $post->delete();
        }
       return redirect('/');
    }
    public function ShowPost(Post_info $post){
        if(auth()->user()->id!==$post['user_id']){
            return redirect('/');
        }
       return view('edit-post',['post' => $post]);
    }

    public function EditPost(Post_info $post, Request $request ){
            $fields = $request->validate([
              'title' => 'required',
              'body'  => 'required'
            ]);
            $fields['title'] = strip_tags($fields['title']);
            $fields['body']  = strip_tags($fields['body']);
            $post->update($fields);
            return redirect('/');
    }

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
