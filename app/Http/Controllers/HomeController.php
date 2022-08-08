<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $berita = Berita::take(4)->get();
        return view('user.pages.home.index', [
            'berita' => $berita
        ]);
    }
}
