<?php

namespace App\Models;

use App\Models\User;
use App\Models\SoalSesi;
use App\Models\PilganSesi;
use App\Models\Subsession;
use App\Models\TryoutSession;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NilaiSesi extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the tryout_session that owns the NilaiSesi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tryout_session(): BelongsTo
    {
        return $this->belongsTo(TryoutSession::class, 'tryout_session_id');
    }

    /**
     * Get the subsession that owns the NilaiSesi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subsession(): BelongsTo
    {
        return $this->belongsTo(Subsession::class);
    }

    /**
     * Get the user that owns the NilaiSesi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the pilgan_sesi that owns the NilaiSesi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pilgan_sesi(): BelongsTo
    {
        return $this->belongsTo(PilganSesi::class, 'pilgan_sesi_id');
    }

    /**
     * Get the soal_sesi that owns the NilaiSesi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function soal_sesi(): BelongsTo
    {
        return $this->belongsTo(SoalSesi::class, 'soal_sesi_id');
    }
}
