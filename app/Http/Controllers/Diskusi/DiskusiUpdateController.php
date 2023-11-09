<?php

namespace App\Http\Controllers\Diskusi;

use App\Http\Controllers\Controller;
use App\Models\Diskusi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DiskusiUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id): RedirectResponse
    {
        $diskusi = Diskusi::find($id);

        $diskusi->update([
            'content' => request('content'),
        ]);

        return redirect()->back();
    }
}
