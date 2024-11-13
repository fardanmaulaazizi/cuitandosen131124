<?php

namespace App\Models;

use App\Models\User;
use App\Models\Nilai;
use App\Models\Tryout;
use App\Models\NilaiSesi;
use App\Models\Subsession;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TryoutSession extends Model
{
    use HasFactory;
    
    /**
    * Get the tryout that owns the TryoutSession
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function tryout(): BelongsTo
    {
        return $this->belongsTo(Tryout::class);
    }
    
    /**
    * Get the user that owns the TryoutSession
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    /**
    * Get all of the nilais for the TryoutSession
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function nilais(): HasMany
    {
        return $this->hasMany(Nilai::class, 'session_id', 'id');
    }
    
    /**
    * Get all of the subsessions for the TryoutSession
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function subsessions(): HasMany
    {
        return $this->hasMany(Subsession::class, 'tryout_session_id');
    }
    
    /**
    * Get all of the nilai_sesis for the TryoutSession
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function nilai_sesis(): HasMany
    {
        return $this->hasMany(NilaiSesi::class, 'tryout_sesi_id');
    }
    
    public function total_nilai()
    {
        $soal = $this->tryout->soals;
        $soal_tambahan = $this->tryout->tambahans;
        
        $tot_nilai = 0;
        $tot_nilai_tambahan = 0;
        
        foreach ($soal as $value) {
            if (!empty($value->pilgans)) {
                $max_nilai = $value->pilgans->max('nilai');
                $tot_nilai += $max_nilai;
            }
        }
        
        if (!empty($soal_tambahan)) {
            foreach ($soal_tambahan as $key2 => $value2) {
                if (!empty($value2->soal_sesis)) {
                    foreach ($value2->soal_sesis as $key3 => $value3) {
                        if (!empty($value3->pilgan_sesis)) {
                            $max_nilai = $value3->pilgan_sesis->max('nilai');
                            $tot_nilai_tambahan += $max_nilai;
                        }
                    }
                }
                
            }
        }
        
        return $tot_nilai + $tot_nilai_tambahan;
    }
    
    public function nilaiPerKategori()
    {
        $nilai = [];
        $kategori = [];
        
        $soal = $soal = $this->tryout->soals;
        
        $uniqueKategori = $soal->pluck('kategori')->unique();
        //dd($uniqueKategori);
        
        $kategori = $uniqueKategori->toArray();
        
        foreach ($kategori as $key => $value) {
            //dd($value);
            $jumlahNilai = 0;
            
            $nilai_kategori = $this->nilais()->whereHas('soal', function($q) use($value) {
                $q->where('kategori', $value);
            })->get();
            //dd($nilai_kategori);
            
            if (!empty($nilai_kategori)) {
                foreach ($nilai_kategori as $key2 => $value2) {
                    $jumlahNilai += $value2->nilai;
                }
            }
            
            $nilai[$value] = $jumlahNilai;
        }
        
        // from sesi tambahan
        $kategoriTambahan = [];
        $uniqueSubsession = $this->nilai_sesis;
        
        foreach ($uniqueSubsession as $nilaiSesi) {
            if ($nilaiSesi->subsession && $nilaiSesi->subsession->tambahan) {
                $namaTambahan = $nilaiSesi->subsession->tambahan->nama;
                if (!in_array($namaTambahan, $kategoriTambahan)) {
                    $kategoriTambahan[] = $namaTambahan;
                }
            }
        }
        
        foreach ($kategoriTambahan as $key3 => $value3) {
            $sumNilai = 0;
            
            $nilaiTambahan = $this->nilai_sesis()->whereHas('subsession.tambahan', function($q) use($value3) {
                $q->where('nama', $value3);
            })->get();
            
            if (!empty($nilaiTambahan)) {
                foreach ($nilaiTambahan as $key4 => $value4) {
                    $sumNilai += $value4->nilai;
                }
            }
            
            $nilai[$value3] = $sumNilai;
        }
        
        //dd($kategoriTambahan);
        //dd($nilai);

        return $nilai;
        
    }
    
    public function nilaiMaxPerKategori()
    {
        $nilai = [];
        $kategori = [];
        
        $soal =  $this->tryout->soals;
        
        $uniqueKategori = $soal->pluck('kategori')->unique();
        //dd($uniqueKategori);
        
        $kategori = $uniqueKategori->toArray();
        
        if (!empty($kategori)) {
            foreach ($kategori as $key => $value) {
                $jumlahNilai = 0;

                $soalKat = $soal->where('kategori', $value);
                
                foreach ($soalKat as $key2 => $value2) {
                    $jumlahNilai += $value2->pilgans->max('nilai');
                }
                
                $nilai[$value] = $jumlahNilai;
            }
        }
        
        // from sesi tambahan
        $kategoriTambahan = [];
        $uniqueSubsession = $this->nilai_sesis;
        
        foreach ($uniqueSubsession as $nilaiSesi) {
            if ($nilaiSesi->subsession && $nilaiSesi->subsession->tambahan) {
                $namaTambahan = $nilaiSesi->subsession->tambahan->nama;
                if (!in_array($namaTambahan, $kategoriTambahan)) {
                    $kategoriTambahan[] = $namaTambahan;
                }
            }
        }
        
        foreach ($kategoriTambahan as $key3 => $value3) {
            $jumlahNilai = 0;
            
            $tambahan = $this->tryout->tambahans->where('nama', $value3)->first();
            
            if (!empty($tambahan)) {
                foreach ($tambahan->soal_sesis as $key4 => $value4) {
                    $jumlahNilai += $value4->pilgan_sesis->max('nilai');
                }
            }

            $nilai[$value3] = $jumlahNilai;
        }
        
        return $nilai;
    }
}
