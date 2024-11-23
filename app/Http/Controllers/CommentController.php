<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $activityId)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $comment = Comment::create([
            'comment' => $request->comment,
            'user_id' => auth()->id(),
            'activities_id' => $activityId,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.')->withFragment('comment-' . $comment->id);
    }

    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        // Pastikan hanya user yang membuat komentar yang bisa mengeditnya
        if (auth()->id() !== $comment->user_id) {
            return back()->with('error', 'You are not authorized to edit this comment.');
        }

        // Validasi input
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        // Update komentar
        $comment->update([
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('activity_detail', $comment->activities_id)->withFragment('comment-'.$comment->id);
    }


    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $activityId = $comment->activities_id;

        $comment->delete();

        $last_comment = Comment::where('activities_id', $activityId)
                            ->latest() // Mengurutkan berdasarkan tanggal terbaru
                            ->first();

        $last_comment_id = $last_comment ? $last_comment->id : null;

        return redirect()->route('activity_detail', $activityId)->withFragment($last_comment_id ? 'comment-' . $last_comment_id : 'blog-comments');
    }

}
