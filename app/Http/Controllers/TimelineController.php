<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diskusi;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TimelineController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        return view('timeline', [
            'diskusi' => Diskusi::latest('id')->get(),
        ]);
    }
}
