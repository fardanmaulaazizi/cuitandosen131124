<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Video;
use Illuminate\Http\Request;

class AdminVideoController extends Controller
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
    
    public function creates($id)
    {
        $paket = Paket::findorfail($id);
        
        return view('admin.video.create', compact('paket'));
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $video = new Video;
        $video->paket_id = $request->paket_id;
        $video->nama = $request->nama;
        $video->deskripsi = $request->deskripsi;
        $video->url_video = $request->url_video;
        
        if ($request->hasFile('url_video_stored'))
        {
            $path = $request->file('url_video_stored')->store('videos', ['disk' =>  'my_files']);
            $video->url_video_stored = $path;
        }
        
        $video->save();
        
        return redirect('admin-atur/atur/'.$request->paket_id)->with('status', 'Data Berhasil Ditambahkan');
    }
    
    /**
    * Display the specified resource.
    */
    public function show(string $id)
    {
        $video = Video::findorfail($id);
        
        return view('admin.video.show', compact('video'));
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(string $id)
    {
        $video = Video::findorfail($id);
        
        return view('admin.video.edit', compact('video'));
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, string $id)
    {
        $video = Video::findorfail($id);
        $video->nama = $request->nama;
        $video->deskripsi = $request->deskripsi;
        $video->url_video = $request->url_video;
        $video->save();
        
        return redirect('admin-atur/atur/'.$video->paket_id)->with('status', 'Data Berhasil Ditambahkan');
        
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
        Video::destroy($id);
        
        return redirect('admin-atur/atur/'.$video->paket_id)->with('status', 'Data Berhasil Ditambahkan');
    }
}
