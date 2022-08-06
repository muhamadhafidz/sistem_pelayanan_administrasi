<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\User_detail;
use App\User_document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Image;
use File;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Str;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::with(['user_detail', 'user_document'])->where('id', '!=', Auth::user()->id)->get();
        // dd($data);
        return view('admin.pages.pengguna.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pengguna = $request->validate([
            'nik' => 'required|max:255|unique:users,nik',
            'email' => 'required|email|max:255|unique:users,email',
            'nama' => 'required|max:255',
            'no_tlp' => 'required|max:16',
        ]);
        $detail = $request->validate([
            'alamat' => 'required|max:255',
            'jenis_kelamin' => 'required|'.Rule::in(["LAKI-LAKI","PEREMPUAN"]),
            'status_nikah' => 'required|'.Rule::in(['sudah menikah','belum menikah']),
            'agama' => 'required|'.Rule::in(["Islam","Kristen Protestan","Katolik","Hindu","Buddha","Konghucu"]),
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'pekerjaan' => 'required|max:255',
        ]);

        $request->validate([
            'ktp' => 'required|image|mimes:jpeg,jpg,png',
            'kk' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        $password = Str::random(10);
        $pengguna['password'] = Hash::make($password);
        $userId = User::create($pengguna)->id;
        $detail['user_id'] = $userId;
        $document['user_id'] = $userId;
        User_detail::create($detail);

        $ktp = $request->file('ktp');
        $ktp_name = $ktp->getFilename().".".strtolower($ktp->getClientOriginalExtension());

        $ktp_location = "assets/admin/img/ktp/";
        $img = Image::make($ktp);
        $img->save($ktp_location.$ktp_name, 60);
        $foto_ktp = $ktp_location.$ktp_name;
        $document['ktp'] = $foto_ktp;
        
        $kk = $request->file('kk');
        
        $kk_name = $kk->getFilename().".".strtolower($kk->getClientOriginalExtension());

        $kk_location = "assets/admin/img/kk/";
        $img = Image::make($kk);
        $img->save($kk_location.$kk_name, 60);
        $foto_kk = $kk_location.$kk_name;
        $document['kk'] = $foto_kk;

        User_document::create($document);

        Alert::success('Data pengguna baru berhasil dibuat', '');
        return redirect()->route('admin.pengguna.index')->with([
            'password' => $password
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::with(['user_detail', 'user_document'])->findOrFail($id);
        // dd($data);
        return view('admin.pages.pengguna.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd();
        $pengguna = $request->validate([
            'nama' => 'required|max:255',
            'no_tlp' => 'required|max:16',
        ]);
        $detail = $request->validate([
            'alamat' => 'required|max:255',
            'jenis_kelamin' => 'required|'.Rule::in(["LAKI-LAKI","PEREMPUAN"]),
            'status_nikah' => 'required|'.Rule::in(['sudah menikah','belum menikah']),
            'agama' => 'required|'.Rule::in(["Islam","Kristen Protestan","Katolik","Hindu","Buddha","Konghucu"]),
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'pekerjaan' => 'required|max:255',
        ]);

        $document = $request->validate([
            'ktp' => 'image|mimes:jpeg,jpg,png',
            'kk' => 'image|mimes:jpeg,jpg,png',
        ]);

        $item = User::with(['user_detail', 'user_document'])->findOrFail($id);

        $item->update($pengguna);
        $item->user_detail->update($detail);

        $ktp = $request->file('ktp');
        if (isset($ktp)) {
            $ktp_name = $ktp->getFilename().".".strtolower($ktp->getClientOriginalExtension());
    
            $ktp_location = "assets/admin/img/ktp/";
            $img = Image::make($ktp);
            $img->save($ktp_location.$ktp_name, 60);
            $foto_ktp = $ktp_location.$ktp_name;
            File::delete($item->user_document->ktp);
            $item->user_document->ktp = $foto_ktp;
            $item->user_document->save();
        }
        
        $kk = $request->file('kk');
        if (isset($kk)) {
            $kk_name = $kk->getFilename().".".strtolower($kk->getClientOriginalExtension());
    
            $kk_location = "assets/admin/img/kk/";
            $img = Image::make($kk);
            $img->save($kk_location.$kk_name, 60);
            $foto_kk = $kk_location.$kk_name;
            File::delete($item->user_document->kk);
            $item->user_document->kk = $foto_kk;
            $item->user_document->save();
        }

        Alert::success('Data pengguna berhasil diubah', '');
        return redirect()->route('admin.pengguna.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.pengguna.index');
    }
}
