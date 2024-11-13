<?php

namespace App\Models;

use App\Models\SoalSesi;
use App\Models\NilaiSesi;
use App\Models\PembahasanSesi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PilganSesi extends Model
{
    use HasFactory;

    /**
     * Get the soal_sesi that owns the PilganSesi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function soal_sesi(): BelongsTo
    {
        return $this->belongsTo(SoalSesi::class, 'soal_sesi_id');
    }

    /**
     * Get all of the pembahasan_sesis for the PilganSesi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pembahasan_sesis(): HasMany
    {
        return $this->hasMany(PembahasanSesi::class, 'pilgan_sesi_id');
    }

    /**
     * Get all of the nilai_sesis for the PilganSesi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nilai_sesis(): HasMany
    {
        return $this->hasMany(NilaiSesi::class, 'pilgan_sesi_id');
    }
}
