<?php

namespace App\Http\Controllers\Diskusi;

use App\Http\Controllers\Controller;
use App\Models\Diskusi;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiskusiEditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id): View
    {
        $diskusi = Diskusi::find($id);

        $this->authorize('update', $diskusi);

        return view('diskusi.edit', [
            'diskusi' => $diskusi,
        ]);
    }
}
