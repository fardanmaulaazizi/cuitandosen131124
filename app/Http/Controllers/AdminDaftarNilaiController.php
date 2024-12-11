<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Tryout;
use Illuminate\Http\Request;

class AdminDaftarNilaiController extends Controller
{
    public function index(){
        $paket = Paket::all();
        return view('admin.daftar_nilai.index', compact('paket'));
    }

    public function tryout($id)
    {
        $paket = Paket::findorfail($id);
        return view('admin.daftar_nilai.tryout', compact('paket'));
    }

    public function listHasil($id)
    {
        $tryout = Tryout::with(['sessions' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->findOrFail($id);
        
        $tryoutSession = $tryout->sessions()->orderBy('created_at', 'desc')->get();
        return view('admin.daftar_nilai.list_hasil', compact('tryoutSession', 'tryout'));
    }
    
}
