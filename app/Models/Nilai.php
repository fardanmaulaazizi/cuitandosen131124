<?php

namespace App\Models;

use App\Models\Soal;
use App\Models\User;
use App\Models\Pilgan;
use App\Models\TryoutSession;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nilai extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    /**
     * Get the pilgan that owns the Nilai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pilgan(): BelongsTo
    {
        return $this->belongsTo(Pilgan::class);
    }

    /**
     * Get the tryout_session that owns the Nilai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tryout_session(): BelongsTo
    {
        return $this->belongsTo(TryoutSession::class, 'session_id', 'id');
    }

    /**
     * Get the soal that owns the Nilai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function soal(): BelongsTo
    {
        return $this->belongsTo(Soal::class);
    }

    /**
     * Get the user that owns the Nilai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
