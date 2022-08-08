<?php

namespace App\Http\Controllers\Admin;

use App\Approval_detail;
use App\Document_request;
use App\Http\Controllers\Controller;
use App\Ready_document_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use PhpOffice\PhpWord\TemplateProcessor;
use Str;

class PengajuanController extends Controller
{
    public function index()
    {
        $data = Document_request::with(['user', 'archive_document'])->where('status', '!=', 'selesai')->get();

        return view('admin.pages.pengajuan.index', [
            'data' => $data
        ]);
    }

    public function batal($id)
    {
        $req = Document_request::findOrFail($id);

        $req->status = 'dibatalkan';
        $req->keterangan = 'Pengajuan dibatalkan oleh admin';
        $req->save();
        Alert::success('Pengajuan dokumen berhasil dibatalkan', '');
        return redirect()->route('admin.pengajuan');
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

    public function tandatangan($id)
    {
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

        $req = Document_request::with(['user.user_detail', 'archive_document'])->findOrFail($id);
        $req->status = 'selesai';
        $req->keterangan = 'Dokumen telah berhasil dibuat dan dapat dicetak';
        $req->save();
        $totalSuratSelesai = Document_request::where('status', 'selesai')->count();
        $req->nomor_surat = strval(intval($totalSuratSelesai)).'/'.$req->updated_at->isoFormat('DD').'/'.$req->updated_at->isoFormat('MM').'/'.$req->updated_at->isoFormat('YYYY');
        $req->save();

        $templateProcessor = new TemplateProcessor($req->archive_document->file_dokumen);
        $templateProcessor->setValue('nosur', $req->nomor_surat);
        $templateProcessor->setValue('nama', $req->user->nama);
        $templateProcessor->setValue('ttl', $req->user->user_detail->tempat_lahir.', '.$req->user->user_detail->tanggal_lahir->isoFormat('DD MMMM YYYY'));
        $templateProcessor->setValue('nik', $req->user->nik);
        $templateProcessor->setValue('jk', $req->user->user_detail->jenis_kelamin);
        $templateProcessor->setValue('agama', $req->user->user_detail->agama);
        $templateProcessor->setValue('pk', $req->user->user_detail->pekerjaan);
        $templateProcessor->setValue('nikah', $req->user->user_detail->status_nikah);
        $templateProcessor->setValue('alamat', $req->user->user_detail->alamat);
        $templateProcessor->setValue('keperluan', $req->keperluan);
        $templateProcessor->setValue('tgl_surat', $req->updated_at->isoFormat('DD MMMM YYYY'));

        $dataKades = Approval_detail::first();

        $templateProcessor->setValue('kades', $dataKades->nama_kades);
        $templateProcessor->setImageValue('ttd', array('path' => $dataKades->ttd_digital, 'height' => 60, ));

        $reNosur = str_replace('/', '_', $req->nomor_surat);
        $pathToSave = 'assets/user/dokumen/'.$req->user->nik.'_'.$reNosur.'.doc';
        $templateProcessor->saveAs($pathToSave);
        
        $savePdfPath = 'assets/user/dokumen/'.$req->user->nik.'_'.$reNosur.'.pdf';

        $sendRequestUpload = Http::withHeaders([
            'cache-control' => 'no-cache',
            'content-type' => 'application/json',
            'x-oc-api-key' => 'b5513cc9ec7be3956dddd46a8b80f8ae'
        ])->post('https://api.api2convert.com/v2/jobs', [
            "conversion" => [
                "category"=> "document",
                "target" => "pdf"
            ]
        ]);
        $dataRequestUpload = $sendRequestUpload->json();
        $jobId = $dataRequestUpload['id'];
        $jobServer = $dataRequestUpload['server'];
        $uuid = Str::uuid();

        $doc = fopen($pathToSave, 'r');

        $uploadFile = Http::withHeaders([
            'cache-control' => 'no-cache',
            'x-oc-upload-uuid' => $uuid->toString(),
            'x-oc-api-key' => 'b5513cc9ec7be3956dddd46a8b80f8ae'
        ])->attach(
            'file', $doc
        )->post($jobServer.'/upload-file/'.$jobId);

        $status = true;

        while($status) {
            $getFile = Http::withHeaders([
                'cache-control' => 'no-cache',
                'x-oc-api-key' => 'b5513cc9ec7be3956dddd46a8b80f8ae'
            ])->get('https://api.api2convert.com/v2/jobs/'.$jobId);
            
            if ($getFile->json()['status']['code'] == 'completed') {
                $status = false;
            }
            
        }


        $getPdf = file_get_contents($getFile->json()['output'][0]['uri']);
        file_put_contents($savePdfPath, $getPdf);

        Ready_document_request::create([
            'document_request_id' => $req->id,
            'file_dokumen' => $savePdfPath
        ]);

        Alert::success('Dokumen berhasil ditanda tangani', '');
        return redirect()->route('admin.pengajuan');
    }
}
