<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\User_detail;
use App\User_document;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Image;
use File;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'ktp' => ['required', 'image', 'mimes:jpeg,jpg,png'],
            'kk' => ['required', 'image', 'mimes:jpeg,jpg,png'],
            'nama' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:17', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_tlp' => ['required', 'string', 'max:15'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'alamat' => ['required', 'string', 'max:255'],
            'pekerjaan' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', Rule::in(["LAKI-LAKI","PEREMPUAN"])],
            'status_nikah' => ['required', Rule::in(['sudah menikah','belum menikah'])],
            'agama' => ['required', Rule::in(["Islam","Kristen Protestan","Katolik","Hindu","Buddha","Konghucu"])],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'nama' => $data['nama'],
            'nik' => $data['nik'],
            'no_tlp' => $data['no_tlp'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        User_detail::create([
            'user_id' => $user->id,
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'alamat' => $data['alamat'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'agama' => $data['agama'],
            'pekerjaan' => $data['pekerjaan'],
            'status_nikah' => $data['status_nikah'],
        ]);

        $document['user_id'] = $user->id;

        $ktp = $data['ktp'];
        $ktp_name = $ktp->getFilename().".".strtolower($ktp->getClientOriginalExtension());

        $ktp_location = "assets/admin/img/ktp/";
        $img = Image::make($ktp);
        $img->save($ktp_location.$ktp_name, 60);
        $foto_ktp = $ktp_location.$ktp_name;
        $document['ktp'] = $foto_ktp;
        
        $kk = $data['kk'];
        
        $kk_name = $kk->getFilename().".".strtolower($kk->getClientOriginalExtension());

        $kk_location = "assets/admin/img/kk/";
        $img = Image::make($kk);
        $img->save($kk_location.$kk_name, 60);
        $foto_kk = $kk_location.$kk_name;
        $document['kk'] = $foto_kk;

        User_document::create($document);

        return $user;
    }
}
