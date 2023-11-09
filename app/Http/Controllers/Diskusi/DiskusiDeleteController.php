<?php

namespace App\Http\Controllers\Diskusi;

use App\Http\Controllers\Controller;
use App\Models\Diskusi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DiskusiDeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id): RedirectResponse
    {
        Diskusi::find($id)->delete();
        

        return redirect()->back();
    }
}
