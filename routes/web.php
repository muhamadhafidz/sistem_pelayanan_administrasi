<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('user.home');

Route::middleware(['auth'])
    ->group(function(){

        Route::get('/dashboard', 'DashboardController@index')->name('user.dashboard');

        Route::get('/riwayat', 'RiwayatController@index')->name('user.riwayat');

        Route::get('/pengajuan', 'AjukanController@index')->name('user.pengajuan');
        Route::post('/pengajuan/ajukan', 'AjukanController@ajukan')->name('user.pengajuan.ajukan');
        Route::put('/pengajuan/batal/{id}', 'AjukanController@batal')->name('user.pengajuan.batal');


        Route::middleware(['isBoth'])
            ->group(function(){
                Route::resource('admin/dashboard', 'Admin\DashboardController', [
                    'as' => 'admin'
                ]);

                Route::get('admin/pengajuan', 'Admin\PengajuanController@index')->name('admin.pengajuan');
            });

        Route::middleware(['isAdmin'])
            ->group(function(){
                
                

                Route::resource('admin/pengguna', 'Admin\PenggunaController', [
                    'as' => 'admin'
                ]);
                Route::put('admin/pengajuan/batal/{id}', 'Admin\PengajuanController@batal')->name('admin.pengajuan.batal');
                Route::put('admin/pengajuan/setujui/{id}', 'Admin\PengajuanController@setujui')->name('admin.pengajuan.setujui');
            });

        Route::middleware(['isKades'])
            ->group(function(){

                Route::put('admin/pengajuan/tandatangan/{id}', 'Admin\PengajuanController@tandatangan')->name('admin.pengajuan.tandatangan');

                Route::get('admin/arsip', 'Admin\ArsipController@index')->name('admin.arsip');
                Route::get('admin/arsip/cetak/{id}', 'Admin\ArsipController@cetak')->name('admin.arsip.cetak');
            });
            
            

        Route::post('admin/profil/updatePassword', 'Admin\ProfilController@updatePassword')->name('admin.profil.updatePassword');
        Route::post('admin/profil/ubahFoto', 'Admin\ProfilController@ubahFoto')->name('admin.profil.ubahFoto');
        Route::resource('admin/profil', 'Admin\ProfilController', [
            'as' => 'admin'
        ]);
    });