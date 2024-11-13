<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AturPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /* public function index()
    {
        $paket = Paket::all();

        return view('admin.atur_paket.index', compact('paket'));
    } */

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket = Paket::all();

        return view('admin.atur_paket.choose_kategori', compact('paket'));
    }

    public function indexKategori($kategori)
    {
        $paket = Paket::where('kategori', $kategori)->get();

        //dd($kategori);
        return view('admin.atur_paket.index', compact('paket', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.atur_paket.create');
    }

    public function createKategori($kategori)
    {
        return view('admin.atur_paket.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $paket = new Paket;
        $paket->nama = $request->nama;
        $paket->deskripsi = $request->deskripsi;
        $paket->harga = $request->harga;
        $paket->durasi = $request->durasi;
        $paket->grup_wa = $request->grup_wa;
        $paket->kategori = $request->kategori;
        $paket->grup_telegram = $request->grup_telegram;

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            
            $filename = $file->getClientOriginalName();
            $filename = pathinfo($filename, PATHINFO_FILENAME) . '.webp';
            
            $path = public_path('img/banner-paket');
            $location = $path . '/' . $filename;
            
            $image = Image::make($file)->encode('webp', 25);
            $image->save($location, 60);
            
            // Assign filename to appropriate variable dynamically (e.g., $produk->url_foto1, $produk->url_foto2, etc.)
            $paket->{'url_foto'} = $filename;
        }
        $paket->save();

        return redirect('admin-atur')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paket = Paket::findorfail($id);

        return view('admin.atur_paket.edit', compact('paket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $paket = Paket::findorfail($id);
        $paket->nama = $request->nama;
        $paket->deskripsi = $request->deskripsi;
        $paket->harga = $request->harga;
        $paket->durasi = $request->durasi;
        $paket->grup_wa = $request->grup_wa;
        $paket->grup_telegram = $request->grup_telegram;

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            
            $filename = $file->getClientOriginalName();
            $filename = pathinfo($filename, PATHINFO_FILENAME) . '.webp';
            
            $path = public_path('img/banner-paket');
            $location = $path . '/' . $filename;
            
            $image = Image::make($file)->encode('webp', 25);
            $image->save($location, 60);
            
            // Assign filename to appropriate variable dynamically (e.g., $produk->url_foto1, $produk->url_foto2, etc.)
            $paket->{'url_foto'} = $filename;
        }
        $paket->save();

        return redirect('admin-atur')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
		//dd('hai');
        $paket = Paket::findorfail($id);
		
		$paket->tryouts()->delete();
		$paket->videos()->delete();
		$paket->materis()->delete();
		
		$paket->destroy($id);
		
		return redirect('admin-atur')->with('status', 'Data Berhasil Dihapus');
    }

    public function atur($id)
    {
        $paket = Paket::findorfail($id);

        return view('admin.atur_paket.atur', compact('paket'));
    }
}
