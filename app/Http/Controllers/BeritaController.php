<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
  
        if(isset($request->cari)){
            $berita = Berita::where('judul', 'like','%'.$request->cari.'%')->paginate(12);
        }else {
            $berita = Berita::paginate(12);
        }
        return view('user.pages.berita.index', [
            'berita' => $berita
        ]);
    }

    public function detail($slug)
    {
  
        $berita = Berita::where('slug', $slug)->firstOrFail();

        return view('user.pages.berita.detail', [
            'berita' => $berita
        ]);
    }
}
