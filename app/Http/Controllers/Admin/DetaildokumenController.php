<?php

namespace App\Http\Controllers\Admin;

use App\Approval_detail;
use App\Archive_document;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use File;

class DetaildokumenController extends Controller
{
    public function index()
    {
        $arc = Archive_document::get();
        $acc = Approval_detail::first();
        return view('admin.pages.detail-dokumen.index', [
            'arc' => $arc,
            'acc' => $acc
        ]);
    }

    public function update(Request $request)
    {
        $doc = $request->validate([
            'sktm' => 'nullable',
            'spkck' => 'nullable',
            'domisili' => 'nullable',
            'usaha' => 'nullable',
            'hilang' => 'nullable'
        ]);
        
        $detail = $request->validate([
            'ttd_digital' => 'nullable|image|mimes:jpeg,jpg,png',
            'nama_kades' => 'string'
        ]);

        $arc = Archive_document::get();

        $file = $request->file('sktm');
        if ($file) {
            if (strtolower($file->getClientOriginalExtension()) != "doc" && strtolower($file->getClientOriginalExtension()) != "docx") {
                Alert::error('file dokumen tidak diterima', '');
                return redirect()->route('admin.detailDokument');
            }
            $file_name = "sktm.".$file->getClientOriginalExtension();
            $file_location = "assets/archive";
            $stored_file = $file->move($file_location, $file_name);
            $arc[0]->file_dokumen = $stored_file->getPathname();
        }

        $file = $request->file('spkck');
        if ($file) {
            if (strtolower($file->getClientOriginalExtension()) != "doc" && strtolower($file->getClientOriginalExtension()) != "docx") {
                Alert::error('file dokumen tidak diterima', '');
                return redirect()->route('admin.detailDokument');
            }
            $file_name = "spkck.".$file->getClientOriginalExtension();
            $file_location = "assets/archive";
            $stored_file = $file->move($file_location, $file_name);
            $arc[1]->file_dokumen = $stored_file->getPathname();
        }

        $file = $request->file('domisili');
        if ($file) {
            if (strtolower($file->getClientOriginalExtension()) != "doc" && strtolower($file->getClientOriginalExtension()) != "docx") {
                Alert::error('file dokumen tidak diterima', '');
                return redirect()->route('admin.detailDokument');
            }
            $file_name = "domisili.".$file->getClientOriginalExtension();
            $file_location = "assets/archive";
            $stored_file = $file->move($file_location, $file_name);
            $arc[2]->file_dokumen = $stored_file->getPathname();
        }
        
        $file = $request->file('hilang');
        if ($file) {
            if (strtolower($file->getClientOriginalExtension()) != "doc" && strtolower($file->getClientOriginalExtension()) != "docx") {
                Alert::error('file dokumen tidak diterima', '');
                return redirect()->route('admin.detailDokument');
            }
            $file_name = "hilang.".$file->getClientOriginalExtension();
            $file_location = "assets/archive";
            $stored_file = $file->move($file_location, $file_name);
            $arc[3]->file_dokumen = $stored_file->getPathname();
        }

        $file = $request->file('usaha');
        if ($file) {
            if (strtolower($file->getClientOriginalExtension()) != "doc" && strtolower($file->getClientOriginalExtension()) != "docx") {
                Alert::error('file dokumen tidak diterima', '');
                return redirect()->route('admin.detailDokument');
            }
            $file_name = "usaha.".$file->getClientOriginalExtension();
            $file_location = "assets/archive";
            $stored_file = $file->move($file_location, $file_name);
            $arc[4]->file_dokumen = $stored_file->getPathname();
        }
        $arc[0]->save();
        $arc[1]->save();
        $arc[2]->save();
        $arc[3]->save();
        $arc[4]->save();
        
        $acc = Approval_detail::first();
        $acc->nama_kades = $detail['nama_kades'];

        $ttd = $request->file('ttd_digital');
        if ($ttd) {
            
            $file_name = $ttd->getFilename().".".strtolower($ttd->getClientOriginalExtension());
        
            $file_location = "assets/admin/img/ttd_kades/";
            $img = Image::make($ttd);
            
            $img->save($file_location.$file_name, 60);

            File::delete($acc->ttd);

            $acc->ttd_digital = $file_location.$file_name;
        }

        $acc->save();


        return redirect()->route('admin.detailDokument');
    }
}
