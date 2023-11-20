<?php

namespace App\Http\Controllers\Diskusi;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentDeleteController extends Controller
{
    //
    public function __invoke($id): RedirectResponse
    {
        Comment::find($id)->delete();
        

        return redirect()->back();
    }
}
