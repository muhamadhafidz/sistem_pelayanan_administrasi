<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use File;
use Illuminate\Validation\Rule;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Auth::user()->with(['user_detail', 'user_document'])->first();
        return view('user.pages.profil.index', [
            'item' => $item
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
        //
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
        //
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
        $item = Auth::user()->load(['user_detail', 'user_document']);

        $pengguna = $request->validate([
            'nama' => 'required|max:255',
            'nik' => 'required|max:17|unique:users,nik,'.$item->id,
            'email' => 'required|email|unique:users,email,'.$item->id,
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
        return redirect()->route('user.profil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updatePassword(Request $request)
    {
        $item = $request->validate([
            'password_old' => 'required|min:8|max:16',
            'password_new' => 'required|min:8|max:16',
            'password_confirm' => 'required',
        ]);

        $activeUser = Auth::user();
        if ($item['password_new'] == $item['password_confirm']) {
            if (Hash::check($item['password_old'],$activeUser->password)) {
                $activeUser->update([
                    'password' => Hash::make($item['password_new']),
                ]);
                Alert::success('Password berhasil diubah', '');
            }else {
                Alert::error('Gagal merubah password', 'password lama yang anda masukan salah');
            }
        }else {
            Alert::error('Gagal merubah password', 'konfirmasi password tidak cocok');
        }
        
        return redirect()->route('user.profil.index');
        

    }

    public function updateFoto(Request $request)
    {
        $data = $request->validate([
            'foto' => 'required|mimes:png,jpg,jpeg'
        ]);

        $user = Auth::user();

        $file = $request->file('foto');
        $file_name = $file->getFilename().".".strtolower($file->getClientOriginalExtension());
        
        $file_location = "assets/user/img/profil/";
        $img = Image::make($file);

        $img->save($file_location.$file_name, 50);

        $data['foto'] = $file_location.$file_name;

        if ($user->foto != "-") {
            File::delete($user->foto);
        }

        $user->update([
            'foto' => $data['foto']
        ]);

        // dd($test);

        return redirect()->route('user.profil.index');        
    }
}
