<?php

namespace App\Models;

use App\Models\SoalSesi;
use App\Models\Tambahan;
use App\Models\PilganSesi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PembahasanSesi extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the tambahan that owns the PembahasanSesi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tambahan(): BelongsTo
    {
        return $this->belongsTo(Tambahan::class);
    }

    /**
     * Get the soal_sesi that owns the PembahasanSesi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function soal_sesi(): BelongsTo
    {
        return $this->belongsTo(SoalSesi::class, 'soal_sesi_id');
    }

    /**
     * Get the pilgan_sesi that owns the PembahasanSesi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pilgan_sesi(): BelongsTo
    {
        return $this->belongsTo(PilganSesi::class, 'pilgan_sesi_id');
    }
}
