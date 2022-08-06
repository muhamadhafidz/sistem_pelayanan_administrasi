<?php

namespace App\Http\Controllers;

use App\Archive_document;
use App\Document_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AjukanController extends Controller
{
    public function index()
    {
        $arcs = Archive_document::get();
        return view('user.pages.pengajuan.index', [
            'arcs' => $arcs
        ]);
    }

    public function ajukan(Request $request)
    {
        $data = $request->validate([
            'keperluan' => 'required|string|max:30',
            'document' => 'required|integer',
        ]);

        Document_request::create([
            'user_id' => Auth::user()->id,
            'archive_document_id' => $data['document'],
            'keperluan' => $data['keperluan'],
            'status' => 'ditinjau',
            'keterangan' => 'menunggu verifikasi data oleh admin',
        ]);
        Alert::success('Dokumen Berhasil Diajukan', 'Data kamu akan terlebih dahulu diverifikasi oleh admin');
        return redirect()->route('user.riwayat');
    }

    public function batal($id)
    {
        $req = Document_request::findOrFail($id);

        $req->status = 'dibatalkan';
        $req->keterangan = 'Pengajuan dibatalkan oleh pengguna';
        $req->save();
        Alert::success('Pengajuan dokumen berhasil dibatalkan', '');
        return redirect()->route('user.riwayat');
    }
}
