<?php

namespace App\Models;

use App\Models\Tryout;
use App\Models\SoalSesi;
use App\Models\Subsession;
use App\Models\PembahasanSesi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tambahan extends Model
{
    use HasFactory;

    /**
     * Get the tryout that owns the Tambahan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tryout(): BelongsTo
    {
        return $this->belongsTo(Tryout::class);
    }

    /**
     * Get all of the soal_sesis for the Tambahan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function soal_sesis(): HasMany
    {
        return $this->hasMany(SoalSesi::class);
    }

    /**
     * Get all of the pembahasan_sesis for the Tambahan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pembahasan_sesis(): HasMany
    {
        return $this->hasMany(PembahasanSesi::class);
    }

    /**
     * Get all of the subsessions for the Tambahan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subsessions(): HasMany
    {
        return $this->hasMany(Subsession::class);
    }
}
