<?php

namespace App\Http\Controllers\Diskusi;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id): RedirectResponse
    {
        $comment = Comment::find($id);

        $comment->update([
            'comment' => request('comment'),
        ]);

        return redirect()->back();
    }
}
