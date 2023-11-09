<?php
namespace App\Http\Controllers\Diskusi;
use App\Http\Controllers\Controller;
use App\Models\Diskusi;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DiskusiFilterController extends Controller
{
public function __invoke(Request $request): view
{
    $kategori = $request->input('kategori');

    $diskusis = Diskusi::when($kategori, function ($query) use ($kategori) {
        return $query->where('kategori', $kategori);
    })
    ->orderBy('created_at', 'desc') // Menambahkan pengurutan berdasarkan created_at descending
    ->get();

    return view('timeline', ['diskusi' => $diskusis]);
    
}
}