<?php

namespace App\Http\Controllers\Diskusi;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentEditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id): View
    {
        $comment = Comment::find($id);

        $this->authorize('update', $comment);

        return view('comment.edit', [
            'comment' => $comment,
        ]);
    }
}
