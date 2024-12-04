<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'author' => 'nullable|max:255',
            'content' => 'required',
        ]);
    
        $comment = $post->comments()->create($request->all());
    
        // Notify the post owner
        $post->user->notify(new CommentNotification($comment));
    
        return redirect()->route('posts.index')->with('success', 'Comment added successfully.');
    }
    

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('posts.index')->with('success', 'Comment deleted successfully.');
    }
}
