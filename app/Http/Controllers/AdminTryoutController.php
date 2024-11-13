<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Nilai;
use App\Models\Paket;
use App\Models\Pilgan;
use App\Models\Tryout;
use App\Models\SoalSesi;
use App\Models\Tambahan;
use App\Models\NilaiSesi;
use App\Models\Pembahasan;
use App\Models\PilganSesi;
use App\Models\Subsession;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TryoutSession;
use App\Models\PembahasanSesi;

class AdminTryoutController extends Controller
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
    
    /**
    * Show the form for creating a new resource.
    */
    public function creates($id)
    {
        $paket = Paket::findorfail($id);
        
        return view('admin.tryout.create', compact('paket'));
    }
    
    /**
    * Show the form for creating a new resource.
    */
    public function miniCreates($id)
    {
        $paket = Paket::findorfail($id);
        
        return view('admin.tryout.mini_create', compact('paket'));
    }
    
    public function freeCreates()
    {        
        return view('admin.tryout.free_create');
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
            return redirect('admin-atur/atur/'.$request->paket_id)->with('status', 'Data Berhasil Ditambahkan');
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
        
        return view('admin.tryout.show', compact('tryout', 'token'));
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(string $id)
    {
        $tryout = Tryout::findorfail($id);
        
        return view('admin.tryout.edit', compact('tryout'));
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
        
        return view('admin.tryout.create_soal', compact('tryout'));
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
        
        return redirect('admin-tryout/'.$request->tryout_id.'/edit')->with('status', 'Data Berhasil Ditambahkan');
    }
    
    public function editSoal($id)
    {
        $soal = Soal::findorfail($id);
        
        return view('admin.tryout.edit_soal', compact('soal'));
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
        
        
        return redirect('admin-tryout/'.$soal->tryout_id.'/edit')->with('status', 'Data Berhasil Diubah');
    }
    
    public function hapusSoal($id)
    {
        $soal = Soal::findorfail($id);
        $nomor = $soal->tryout_id;
        
        Soal::destroy($id);
        
        return redirect('admin-tryout/'.$nomor.'/edit')->with('status', 'Data Berhasil Diubah');
    }
    
    public function mulai($id, $token)
    {
        // Check if a session already exists for the user and tryout
        //dd($token);
        $tryout = Tryout::findorfail($id);

        if (session()->has('tryout_token')) {
            if (session()->get('tryout_token') !== $token) {
                $session = new TryoutSession;
                $session->user_id = auth()->user()->id;
                $session->tryout_id = $id;
                $session->start_time = now();
                $session->save();

                foreach ($tryout->tambahans as $ty) {
                    $subs = new Subsession;
                    $subs->tryout_session_id = $session->id;
                    $subs->tambahan_id = $ty->id;
                    $subs->status = 'active';
                    $subs->save();
                }
            } else {
                $existingSession = TryoutSession::where('user_id', auth()->user()->id)
                ->where('tryout_id', $id)->where('status', 'active')
                ->first();

                if ($existingSession) {
                    if ($existingSession->status == 'completed') {
                        return redirect('admin-tryout/hasil-test/'.$existingSession->id);
                    }

                    $session = $existingSession;
                    return view('admin.tryout.session', compact('session'));
                }
                
                // If no session exists, create a new session
                $session = new TryoutSession;
                $session->user_id = auth()->user()->id;
                $session->tryout_id = $id;
                $session->start_time = now();
                $session->save();

                foreach ($tryout->tambahans as $ty) {
                    $subs = new Subsession;
                    $subs->tryout_session_id = $session->id;
                    $subs->tambahan_id = $ty->id;
                    $subs->status = 'active';
                    $subs->save();
                }
            }       
        } else {
            $session = new TryoutSession;
            $session->user_id = auth()->user()->id;
            $session->tryout_id = $id;
            $session->start_time = now();
            $session->save();

            foreach ($tryout->tambahans as $ty) {
                $subs = new Subsession;
                $subs->tryout_session_id = $session->id;
                $subs->tambahan_id = $ty->id;
                $subs->status = 'active';
                $subs->save();
            }
        }
        
        return view('admin.tryout.session', compact('session'));
    }
    
    public function stopSession($id)
    {
        $session = TryoutSession::findorfail($id);

        foreach ($session->subsessions as $key => $value) {
            //dd($value);
            if ($value->status == 'active') {
                $session->status = 'pending';
                $session->save();

                if ($value->start_time === null) {
                    $value->start_time = now();
                    $value->save();
                }

                return view('admin.tryout.subsession', compact('value'));
            }
        }

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

        foreach ($session->subsessions as $key => $value) {
            //dd($value);
            if ($value->status == 'active') {
                $session->status = 'pending';
                $session->save();

                if ($value->start_time === null) {
                    $value->start_time = now();
                    $value->save();
                }

                return view('admin.tryout.subsession', compact('value'));
            }
        }

        $session->status = 'completed';
        $session->save();
        
        return view('admin.tryout.hasil', compact('session'));
    }

    public function hasilTestAdmin($id)
    {
        $session = TryoutSession::findorfail($id);

        foreach ($session->subsessions as $key => $value) {
            //dd($value);
            if ($value->status == 'active') {
                $session->status = 'pending';
                $session->save();

                if ($value->start_time === null) {
                    $value->start_time = now();
                    $value->save();
                }

                return view('admin.tryout.subsession', compact('value'));
            }
        }

        $session->status = 'completed';
        $session->save();
        
        return view('admin.tryout.hasil_admin_view', compact('session'));
    }
    
    public function removePG($id)
    {
        //dd($id);
        $pg = Pilgan::destroy($id);
        
        return $pg;
    }
    
    public function listHasil($id)
    {
        $tryout = Tryout::with(['sessions' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->findOrFail($id);
        
        return view('admin.tryout.list_hasil', compact('tryout'));
    }
    
    public function editPembahasan($id)
    {
        $soal = Soal::findorfail($id);
        
        return view('admin.tryout.edit_pembahasan', compact('soal'));
    }
    
    public function storePembahasan(Request $request, $id)
    {
        $soal = Soal::findorfail($id);
        
        $pm = Pembahasan::updateOrCreate(
            ['tryout_id' => $soal->tryout->id, 'soal_id' => $soal->id],
            ['deskripsi' => $request->deskripsi, 'url_video1' => $request->url_video1, 'url_video2' => $request->url_video2, 'url_video3' => $request->video3, 'pilgan_id' => $request->answer]
        );
        
        return redirect('admin-tryout/'.$soal->tryout_id.'/edit')->with('status', 'Data Berhasil Diubah');
    }
    
    public function pembahasan($id)
    {
        $ts = TryoutSession::findorfail($id);
        
        if ($ts->tryout->pembahasans != null) {
            $pembahasan = $ts->tryout->pembahasans;
            
            return view('admin.tryout.pembahasan', compact('pembahasan', 'ts'));
        } else {
            $pembahasan = null;
            
            return redirect()->back()->with('error', 'Pembahasan Belum Tersedia');
        }
        
    }
    
    public function storeSesi(Request $request, $id)
    {
        $tambah = new Tambahan;
        $tambah->tryout_id = $id;
        $tambah->nama = $request->nama;
        $tambah->waktu = $request->waktu;
        $tambah->save();
        
        return redirect()->back()->with('status', 'Data Berhasil Diubah');
    }
    
    public function updateSesi(Request $request, $id)
    {
        $tambah = Tambahan::findorfail($id);
        $tambah->nama = $request->nama;
        $tambah->waktu = $request->waktu;
        $tambah->save();
        
        return redirect()->back()->with('status', 'Data Berhasil Diubah');
    }
    
    public function tambahSoalSesi($id)
    {
        $sesi = Tambahan::findorfail($id);
        
        return view('admin.tryout.create_soal_sesi', compact('sesi'));
    }
    
  
    public function storeSoalSesi(Request $request)
    {
        $soal = new SoalSesi;
        $soal->tambahan_id = $request->sesi_id;
        $soal->deskripsi = $request->deskripsi;
        $soal->save();
        
        if ($request->jawaban != null) {
            foreach ($request->jawaban as $key => $value) {
                $pilgan = new PilganSesi;
                $pilgan->soal_sesi_id = $soal->id;
                $pilgan->deskripsi = $value;
                $pilgan->nilai = $request->nilai[$key];
                $pilgan->save();
            }
        }
        
        return redirect('admin-tryout/'.$soal->tambahan->tryout->id.'/edit')->with('status', 'Data Berhasil Ditambahkan');
    }

    public function editSoalSesi($id)
    {
        $soal = SoalSesi::findorfail($id);
        
        return view('admin.tryout.edit_soal_sesi', compact('soal'));
    }

    //unfinished
    public function updateSoalSesi(Request $request, $id)
    {
        $soal = SoalSesi::findorfail($id);
        $soal->deskripsi = $request->deskripsi;
        $soal->save();
        
        if ($request->jawaban != null) {
            foreach ($request->jawaban as $key => $value) {
                $pilgan = new PilganSesi;
                $pilgan->soal_sesi_id = $soal->id;
                $pilgan->deskripsi = $value;
                $pilgan->nilai = $request->nilai[$key];
                $pilgan->save();
            }
        }

        if($request->id_curr != null){
            foreach ($request->id_curr as $key2 => $value2) {
                $pilgan = PilganSesi::findorfail($value2);
                $pilgan->deskripsi = $request->jawaban_curr[$key2];
                $pilgan->nilai = $request->nilai_curr[$key2];
                $pilgan->save();
            }
        }
        
        
        return redirect('admin-tryout/'.$soal->tambahan->tryout->id.'/edit')->with('status', 'Data Berhasil Diubah');
    }

    public function hapusSoalSesi($id)
    {
        $soal = SoalSesi::findorfail($id);
        $pilgans = $soal->pilgan_sesis()->delete();
        $nomor = $soal->tambahan->tryout->id;
        
        SoalSesi::destroy($id);
        
        return redirect('admin-tryout/'.$nomor.'/edit')->with('status', 'Data Berhasil Diubah');
    }

    public function editPembahasanSesi($id)
    {
        $soal = SoalSesi::findorfail($id);
        
        return view('admin.tryout.edit_pembahasan_sesi', compact('soal'));
    }

    public function storePembahasanSesi(Request $request, $id)
    {
        $soal = SoalSesi::findorfail($id);
        
        $pm = PembahasanSesi::updateOrCreate(
            ['tambahan_id' => $soal->tambahan->id, 'soal_sesi_id' => $soal->id],
            ['deskripsi' => $request->deskripsi, 'url_video1' => $request->url_video1, 'url_video2' => $request->url_video2, 'url_video3' => $request->video3, 'pilgan_sesi_id' => $request->answer]
        );
        
        return redirect('admin-tryout/'.$soal->tambahan->tryout->id.'/edit')->with('status', 'Data Berhasil Diubah');
    }

    public function uploadJawabanSesi(Request $request)
    {
        $subs = Subsession::findorfail($request->session);

        $nilai = NilaiSesi::updateOrCreate(
            ['user_id' => auth()->user()->id, 'tryout_sesi_id' => $subs->session->id, 'subsession_id' => $request->session, 'soal_sesi_id' => $request->soal],
            ['jawaban' => $request->jawaban, 'nilai' => $request->nilai, 'pilgan_sesi_id' => $request->pilgan]
        );
        
        return $nilai;
    }

    public function hasilTestSesi($id)
    {
        $subs = Subsession::findorfail($id);
        $session = $subs->session;

        $subs->status = 'completed';
        $subs->save();

        foreach ($session->subsessions as $key => $value) {
            //dd($value);
            if ($value->status == 'active') {
                $session->status = 'pending';
                $session->save();

                if ($value->start_time === null) {
                    $value->start_time = now();
                    $value->save();
                }

                return view('admin.tryout.subsession', compact('value'));
            }
        }

        $session->status = 'completed';
        $session->save();
        
        return view('admin.tryout.hasil', compact('session'));
    }

    public function stopSessionSesi($id)
    {
        $subs = Subsession::findorfail($id);
        $session = $subs->session;

        $subs->status = 'completed';
        $subs->save();

        foreach ($session->subsessions as $key => $value) {
            //dd($value);
            if ($value->status == 'active') {
                $session->status = 'pending';
                $session->save();

                if ($value->start_time === null) {
                    $value->start_time = now();
                    $value->save();
                }
                

                return view('admin.tryout.subsession', compact('value'));
            }
        }

        $session->status = 'completed';
        $session->save();
        
        return $session;
    }
}
