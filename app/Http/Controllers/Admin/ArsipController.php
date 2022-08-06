<?php

namespace App\Http\Controllers\Admin;

use App\Document_request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function index()
    {
        $data = Document_request::with(['user', 'archive_document'])->where('status', 'selesai')->get();

        return view('admin.pages.arsip.index', [
            'data' => $data
        ]);
    }

    public function cetak($id)
    {
        $data = Document_request::with(['ready_document_request'])->findOrFail($id);

        return $data->ready_document_request->file_dokumen;

    }
}
