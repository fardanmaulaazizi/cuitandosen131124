<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Materi;
use Illuminate\Http\Request;

class AdminMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function creates($id)
    {
        $paket = Paket::findorfail($id);
        
        return view('admin.materi.create', compact('paket'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $materi = new Materi;
        $materi->paket_id = $request->paket_id;
        $materi->nama = $request->nama;
        $materi->deskripsi = $request->deskripsi;
        
        for ($i=1; $i < 4; $i++) { 
            if ($request->hasfile('url_file'.$i)) {
                $file = $request->file('url_file'.$i);
                $filename = $file->getClientOriginalName();
                $file->move(public_path('materi'), $filename);
                $materi->{'url_file'.$i} = $filename;
            }
        }

        $materi->save();

        return redirect('admin-atur/atur/'.$request->paket_id)->with('status', 'Data Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $materi = Materi::findorfail($id);

        return view('admin.materi.show', compact('materi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $materi = Materi::findorfail($id);

        return view('admin.materi.edit', compact('materi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());

        $materi = Materi::findorfail($id);
        $materi->nama = $request->nama;
        $materi->deskripsi = $request->deskripsi;
        
        for ($i=1; $i < 4; $i++) { 
            if ($request->hasfile('url_file'.$i)) {
                $file = $request->file('url_file'.$i);
                $filename = $file->getClientOriginalName();
                $file->move(public_path('materi'), $filename);
                $materi->{'url_file'.$i} = $filename;
            }
        }

        $materi->save();

        return redirect('admin-atur/atur/'.$materi->paket_id)->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materi = Materi::destroy($id);

        return redirect('admin-atur/atur/'.$materi->paket_id)->with('status', 'Data Berhasil Dihapus');
    }

    public function removeFile(Request $request)
    {
        $materi = Materi::findorfail($request->materi);
        $materi->{'url_file'.$request->urutan} = null;
        $materi->save();

        return $materi;
    }
}
