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
        'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,avi,mov,doc,docx,pdf|max:102400', // Menambahkan tipe file yang diizinkan
    ]);

    // Simpan foto ke server jika ada
    if ($request->hasFile('file')) {
        $filePath = $request->file('file')->store('diskusi_files', 'public');
    }

    // Simpan data ke database
    Diskusi::create([
        'user_id' => Auth::id(),
        'content' => $request->input('content'),
        'kategori' => $request->input('kategori'),
        'file' => isset($filePath) ? $filePath : null,
    ]);

    return redirect()->back();              
    }

  
}
