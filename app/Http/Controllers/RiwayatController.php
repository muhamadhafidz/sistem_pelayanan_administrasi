<?php

namespace App\Http\Controllers;

use App\Document_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    {
        $reqs = Auth::user()->document_requests()->with('archive_document')->get();
        return view('user.pages.riwayat.index', [
            'reqs' => $reqs
        ]);
    }
}
