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

Auth::routes();

Route::get('/', 'HomeController@index')->name('user.home');
Route::get('/berita', 'BeritaController@index')->name('user.berita');
Route::get('/berita/{slug}', 'BeritaController@detail')->name('user.berita.detail');
Route::get('/admin/login', 'AdminloginController@index')->name('admin.login');

Route::middleware(['auth'])
    ->group(function(){

        Route::middleware(['isUser'])
            ->group(function(){
                Route::get('/dashboard', 'DashboardController@index')->name('user.dashboard');

                Route::get('/riwayat', 'RiwayatController@index')->name('user.riwayat');

                Route::get('/pengajuan', 'AjukanController@index')->name('user.pengajuan');
                Route::post('/pengajuan/ajukan', 'AjukanController@ajukan')->name('user.pengajuan.ajukan');
                Route::put('/pengajuan/batal/{id}', 'AjukanController@batal')->name('user.pengajuan.batal');
            });

        Route::middleware(['isBoth'])
            ->group(function(){
                Route::resource('admin/dashboard', 'Admin\DashboardController', [
                    'as' => 'admin'
                ]);

                Route::get('admin/pengajuan', 'Admin\PengajuanController@index')->name('admin.pengajuan');

                Route::post('admin/profil/updatePassword', 'Admin\ProfilController@updatePassword')->name('admin.profil.updatePassword');
                Route::post('admin/profil/ubahFoto', 'Admin\ProfilController@ubahFoto')->name('admin.profil.ubahFoto');
                Route::resource('admin/profil', 'Admin\ProfilController', [
                    'as' => 'admin'
                ]);
            });

        Route::middleware(['isAdmin'])
            ->group(function(){
                
                Route::get('admin/detail-dokumen', 'Admin\DetaildokumenController@index')->name('admin.detailDokument');
                Route::post('admin/detail-dokumen', 'Admin\DetaildokumenController@update')->name('admin.detailDokument.update');

                Route::resource('admin/pengguna', 'Admin\PenggunaController', [
                    'as' => 'admin'
                ]);
                Route::put('admin/pengajuan/batal/{id}', 'Admin\PengajuanController@batal')->name('admin.pengajuan.batal');
                Route::put('admin/pengajuan/setujui/{id}', 'Admin\PengajuanController@setujui')->name('admin.pengajuan.setujui');

                Route::resource('admin/berita', 'Admin\BeritaController', [
                    'as' => 'admin'
                ]);
            });

        Route::middleware(['isKades'])
            ->group(function(){

                Route::put('admin/pengajuan/tandatangan/{id}', 'Admin\PengajuanController@tandatangan')->name('admin.pengajuan.tandatangan');

                Route::get('admin/arsip', 'Admin\ArsipController@index')->name('admin.arsip');
                Route::get('admin/arsip/cetak/{id}', 'Admin\ArsipController@cetak')->name('admin.arsip.cetak');
            });
            
            

        
    });