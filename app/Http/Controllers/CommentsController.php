<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|max:1024'
        ]);

        $comment = new \App\Models\Comment();
        $comment->content = $request->comment;
        $comment->user_id = auth()->user()->id;
        $comment->tierlist_id = $request->tierlist_id;
        $comment->save();
        return redirect()->back();
    }
}
