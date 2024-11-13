<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Nilai;
use App\Models\Paket;
use App\Models\Pilgan;
use App\Models\Tryout;
use App\Models\Pembahasan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TryoutSession;

class FreeTryoutController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        //
    }

    public function indexFree()
    {
        $tryouts = Tryout::where('kategori', 'gratis')->get();

        return view('admin.tryout_gratis.index', compact('tryouts'));
    }


    public function freeCreates()
    {        
        return view('admin.tryout_gratis.free_create');
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $tryout = new Tryout;
        $tryout->nama = $request->nama;
        $tryout->paket_id = $request->paket_id;
        $tryout->kategori = $request->kategori;
        $tryout->waktu = $request->waktu;
        $tryout->save();
        
        if ($request->paket_id == 0) {
            return redirect('admin-free-tryout')->with('status', 'Data Berhasil Ditambahkan');

        } else {
            return redirect('admin-free-tryout')->with('status', 'Data Berhasil Ditambahkan');
        }
        
    }
    
    /**
    * Display the specified resource.
    */
    public function show(string $id)
    {
        $tryout = Tryout::findorfail($id);
        $token = Str::random(32);
        
        session(['tryout_token' => $token]);
        
        return view('admin.tryout_gratis.show', compact('tryout', 'token'));
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(string $id)
    {
        $tryout = Tryout::findorfail($id);
        
        return view('admin.tryout_gratis.edit', compact('tryout'));
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, string $id)
    {
        $tryout = Tryout::findorfail($id);
        $tryout->nama = $request->nama;
        $tryout->kategori = $request->kategori;
        $tryout->waktu = $request->waktu;
        $tryout->save();
        
        return $tryout;
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
        //
    }
    
    public function tambahSoal($id)
    {
        $tryout = Tryout::findorfail($id);
        
        return view('admin.tryout_gratis.create_soal', compact('tryout'));
    }
    
    public function storeSoal(Request $request)
    {
        $soal = new Soal;
        $soal->tryout_id = $request->tryout_id;
        $soal->deskripsi = $request->deskripsi;
        $soal->kategori = $request->kategori;
        $soal->save();
        
        if ($request->jawaban != null) {
            foreach ($request->jawaban as $key => $value) {
                $pilgan = new Pilgan;
                $pilgan->soal_id = $soal->id;
                $pilgan->deskripsi = $value;
                $pilgan->nilai = $request->nilai[$key];
                $pilgan->save();
            }
        }
        
        return redirect('admin-free-tryout/'.$request->tryout_id.'/edit')->with('status', 'Data Berhasil Ditambahkan');
    }
    
    public function editSoal($id)
    {
        $soal = Soal::findorfail($id);
        
        return view('admin.tryout_gratis.edit_soal', compact('soal'));
    }
    
    public function updateSoal(Request $request, $id)
    {
        $soal = Soal::findorfail($id);
        $soal->deskripsi = $request->deskripsi;
        $soal->kategori = $request->kategori;
        $soal->save();
        
        if ($request->jawaban != null) {
            foreach ($request->jawaban as $key => $value) {
                $pilgan = new Pilgan;
                $pilgan->soal_id = $soal->id;
                $pilgan->deskripsi = $value;
                $pilgan->nilai = $request->nilai[$key];
                $pilgan->save();
            }
        }
        
        
        return redirect('admin-free-tryout/'.$soal->tryout_id.'/edit')->with('status', 'Data Berhasil Diubah');
    }
    
    public function hapusSoal($id)
    {
        $soal = Soal::findorfail($id);
        $nomor = $soal->tryout_id;
        
        Soal::destroy($id);
        
        return redirect('admin-free-tryout/'.$nomor.'/edit')->with('status', 'Data Berhasil Diubah');
    }
    
    public function mulai($id, $token)
    {
        // Check if a session already exists for the user and tryout
        //dd($token);
        if (session()->has('tryout_token')) {
            if (session()->get('tryout_token') !== $token) {
                $session = new TryoutSession;
                $session->user_id = auth()->user()->id;
                $session->tryout_id = $id;
                $session->start_time = now();
                $session->save();
            } else {
                $existingSession = TryoutSession::where('user_id', auth()->user()->id)
                ->where('tryout_id', $id)->where('status', 'active')
                ->first();
                
                if ($existingSession) {
                    $session = $existingSession;
                    return view('admin.tryout_gratis.session', compact('session'));
                }
                
                // If no session exists, create a new session
                $session = new TryoutSession;
                $session->user_id = auth()->user()->id;
                $session->tryout_id = $id;
                $session->start_time = now();
                $session->save();
            }       
        } else {
            $session = new TryoutSession;
            $session->user_id = auth()->user()->id;
            $session->tryout_id = $id;
            $session->start_time = now();
            $session->save();
        }
        
        return view('admin.tryout_gratis.session', compact('session'));
    }
    
    public function stopSession($id)
    {
        $session = TryoutSession::findorfail($id);
        $session->status = 'completed';
        $session->save();
        
        return $session;
    }
    
    public function uploadJawaban(Request $request)
    {
        $nilai = Nilai::updateOrCreate(
            ['user_id' => auth()->user()->id, 'session_id' => $request->session, 'soal_id' => $request->soal],
            ['jawaban' => $request->jawaban, 'nilai' => $request->nilai, 'pilgan_id' => $request->pilgan]
        );
        
        return $nilai;
    }
    
    public function hasilTest($id)
    {
        $session = TryoutSession::findorfail($id);
        $session->status = 'completed';
        $session->save();
        
        return view('admin.tryout_gratis.hasil', compact('session'));
    }
    
    public function removePG($id)
    {
        //dd($id);
        $pg = Pilgan::destroy($id);
        
        return $pg;
    }

    public function listHasil($id)
    {
        $tryout = Tryout::findorfail($id);

        return view('admin.tryout_gratis.list_hasil', compact('tryout'));
    }

    public function editPembahasan($id)
    {
        $soal = Soal::findorfail($id);

        return view('admin.tryout_gratis.edit_pembahasan', compact('soal'));
    }

    public function storePembahasan(Request $request, $id)
    {
        $soal = Soal::findorfail($id);

        $pm = Pembahasan::updateOrCreate(
            ['tryout_id' => $soal->tryout->id, 'soal_id' => $soal->id],
            ['deskripsi' => $request->deskripsi, 'url_video1' => $request->url_video1, 'url_video2' => $request->url_video2, 'url_video3' => $request->video3, 'pilgan_id' => $request->answer]
        );

        return redirect('admin-free-tryout/'.$soal->tryout_id.'/edit')->with('status', 'Data Berhasil Diubah');
    }

    public function pembahasan($id)
    {
        $ts = TryoutSession::findorfail($id);

        if ($ts->tryout->pembahasans != null) {
            $pembahasan = $ts->tryout->pembahasans;

            return view('admin.tryout_gratis.pembahasan', compact('pembahasan', 'ts'));
        } else {
            $pembahasan = null;

            return redirect()->back()->with('error', 'Pembahasan Belum Tersedia');
        }
        
    }
}
