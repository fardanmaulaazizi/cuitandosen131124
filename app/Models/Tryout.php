<?php

namespace App\Models;

use App\Models\Soal;
use App\Models\Paket;
use App\Models\Tambahan;
use App\Models\Pembahasan;
use App\Models\TryoutSession;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tryout extends Model
{
    use HasFactory;

    /**
     * Get all of the soal for the Tryout
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function soals(): HasMany
    {
        return $this->hasMany(Soal::class);
    }

    /**
     * Get the paket that owns the Tryout
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paket(): BelongsTo
    {
        return $this->belongsTo(Paket::class);
    }

    /**
     * Get all of the sessions for the Tryout
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sessions(): HasMany
    {
        return $this->hasMany(TryoutSession::class);
    }

    /**
     * Get all of the pembahasans for the Tryout
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pembahasans(): HasMany
    {
        return $this->hasMany(Pembahasan::class);
    }

    /**
     * Get all of the tambahans for the Tryout
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tambahans(): HasMany
    {
        return $this->hasMany(Tambahan::class);
    }
}
