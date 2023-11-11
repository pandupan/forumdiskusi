<?php

namespace App\Http\Controllers\Diskusi;

use App\Http\Controllers\Controller;
use App\Models\Diskusi;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DiskusiCommentsController extends Controller
{
    public function __invoke($id): View
    {
        $diskusi = Diskusi::find($id);

        $this->authorize('view', $diskusi);

        return view('diskusi.show', [
            'diskusi' => $diskusi,
        ]);
    }
}
