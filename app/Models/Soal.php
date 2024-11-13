<?php

namespace App\Models;

use App\Models\Nilai;
use App\Models\Pilgan;
use App\Models\Tryout;
use App\Models\Pembahasan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Soal extends Model
{
    use HasFactory;

    /**
     * Get the tryout that owns the Soal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tryout(): BelongsTo
    {
        return $this->belongsTo(Tryout::class);
    }

    /**
     * Get all of the pilgans for the Soal
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pilgans(): HasMany
    {
        return $this->hasMany(Pilgan::class);
    }

    /**
     * Get all of the nilais for the Soal
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nilais(): HasMany
    {
        return $this->hasMany(Nilai::class);
    }


    /**
     * Get the pembahasan associated with the Soal
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pembahasan(): HasOne
    {
        return $this->hasOne(Pembahasan::class);
    }
}
