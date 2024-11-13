<?php

namespace App\Models;

use App\Models\Tambahan;
use App\Models\NilaiSesi;
use App\Models\TryoutSession;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subsession extends Model
{
    use HasFactory;

    /**
     * Get the session that owns the Subsession
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function session(): BelongsTo
    {
        return $this->belongsTo(TryoutSession::class, 'tryout_session_id');
    }

    /**
     * Get the tambahan that owns the Subsession
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tambahan(): BelongsTo
    {
        return $this->belongsTo(Tambahan::class);
    }

    /**
     * Get all of the nilai_sesis for the Subsession
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nilai_sesis(): HasMany
    {
        return $this->hasMany(NilaiSesi::class);
    }
}
