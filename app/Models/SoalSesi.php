<?php

namespace App\Models;

use App\Models\Tambahan;
use App\Models\NilaiSesi;
use App\Models\PilganSesi;
use App\Models\PembahasanSesi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SoalSesi extends Model
{
    use HasFactory;

    /**
     * Get the tambahan that owns the SoalSesi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tambahan(): BelongsTo
    {
        return $this->belongsTo(Tambahan::class);
    }

    /**
     * Get all of the pilgan_sesis for the SoalSesi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pilgan_sesis(): HasMany
    {
        return $this->hasMany(PilganSesi::class, 'soal_sesi_id');
    }

    /**
     * Get the pembahasan_sesi associated with the SoalSesi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pembahasan_sesi(): HasOne
    {
        return $this->hasOne(PembahasanSesi::class, 'soal_sesi_id');
    }

    /**
     * Get all of the nilai_sesis for the SoalSesi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nilai_sesis(): HasMany
    {
        return $this->hasMany(NilaiSesi::class, 'soal_sesi_id');
    }
}
