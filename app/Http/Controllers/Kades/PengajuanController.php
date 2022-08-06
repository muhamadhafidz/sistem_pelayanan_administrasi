<?php

namespace App\Http\Controllers\Kades;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        $data = Document_request::with(['user', 'archive_document'])->get();

        return view('admin.pages.pengajuan.index', [
            'data' => $data
        ]);
    }

    public function setujui($id)
    {
        $req = Document_request::findOrFail($id);
        $req->status = 'diproses';
        $req->keterangan = 'Pengajuan telah disetujui, menunggu pembubuhan tanda tangan oleh kepala desa';
        $req->save();
        Alert::success('Pengajuan dokumen berhasil disetujui', '');
        return redirect()->route('admin.pengajuan');
    }
}
