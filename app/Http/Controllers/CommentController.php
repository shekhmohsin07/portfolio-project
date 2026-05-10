<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{

    public function index()
    {
        $comments = Comment::with('blog')
                    ->latest()
                    ->paginate(10);

        return view('backend.pages.blogs.comments.index', compact('comments'));
    }

    public function approve(Comment $comment)
    {
        $comment->update([
            'status' => 'approved'
        ]);

        return back()->with('success', 'Comment approved');
    }


    public function reject(Comment $comment)
    {
        $comment->update([
            'status' => 'rejected'
        ]);

        return back()->with('success', 'Comment rejected');
    }


    public function pending(Comment $comment)
    {
        $comment->update([
            'status' => 'pending'
        ]);

        return back()->with('success', 'Comment pending now');
    }

    public function store(Request $request)
    {
        $request->validate([
            'blog_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
        ]);

        Comment::create([
            'blog_id' => $request->blog_id,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Comment added successfully');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('success', 'Comment deleted');
    }
}
