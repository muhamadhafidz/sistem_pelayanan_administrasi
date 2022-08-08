<?php

namespace App\Http\Controllers\Admin;

use App\Berita;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use Str;
use File;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Berita::get();

        return view('admin.pages.berita.index', [
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
        return view('admin.pages.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $point = $request->validate([
            'judul' => 'required|max:255|unique:beritas,judul',
            'isi' => 'required|max:255'
        ]);
        // dd($product);
        $image = $request->validate([
            'foto' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        
        $foto = $request->file('foto');
        
        $file_name = $foto->getFilename().".".strtolower($foto->getClientOriginalExtension());
    
        $file_location = "assets/admin/img/berita/";
        $img = Image::make($foto);
        
        $img->save($file_location.$file_name, 60);

        $image['foto'] = $file_location.$file_name;

        Berita::create([
            'judul' => $point['judul'],
            'isi' => $point['isi'],
            'slug' => Str::slug($point['judul'], '-'),
            'foto' => $image['foto']
        ]);

        return redirect()->route('admin.berita.index');
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
        $item = Berita::findOrFail($id);

        return view('admin.pages.berita.edit', [
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
        $item = Berita::findOrFail($id);

        $point = $request->validate([
            'judul' => 'required|max:255|unique:beritas,judul,'.$id,
            'isi' => 'required|max:255'
        ]);
        // dd($product);
        $image = $request->validate([
            'foto' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        
        $foto = $request->file('foto');
       
        $file_name = $foto->getFilename().".".strtolower($foto->getClientOriginalExtension());
    
        $file_location = "assets/admin/img/berita/";
        $img = Image::make($foto);
        
        $img->save($file_location.$file_name, 60);

        File::delete($item->foto);

        $item->foto = $file_location.$file_name;

        $item->save();

        return redirect()->route('admin.berita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Berita::findOrFail($id);

        File::delete($item->foto);

        $item->delete();

        return redirect()->route('admin.berita.index');
    }
}
