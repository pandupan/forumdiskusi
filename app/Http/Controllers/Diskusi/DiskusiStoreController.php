<?php

namespace App\Http\Controllers\Diskusi;

use App\Http\Controllers\Controller;
use App\Models\Diskusi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class DiskusiStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): RedirectResponse
    {
              // Validasi form
    $request->validate([
        'content' => 'required|string',
        'kategori' => 'nullable|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Simpan foto ke server jika ada
    if ($request->hasFile('foto')) {
        $photoPath = $request->file('foto')->store('diskusi_photos', 'public');
    }

    // Simpan data ke database
    Diskusi::create([
        'user_id' => Auth::id(),
        'content' => $request->input('content'),
        'kategori' => $request->input('kategori'),
        'foto' => isset($photoPath) ? $photoPath : null,
    ]);

    return redirect()->back();              
    }

  
}
