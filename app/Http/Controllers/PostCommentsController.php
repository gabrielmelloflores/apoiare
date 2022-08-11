<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post){
        // add a comment to the given post

        //validation
        request()->validate([
            'body' => 'required'
        ]);

        $create = [
            'body' => request('body')
        ];

        if(request()->user()) {
            $create['user_id'] = request()->user()->id;
        }else{
            $create['name'] = request('name') ?? 'Anônimo';
        }

        $post->comments()->create($create);

        return back();
    }
}
