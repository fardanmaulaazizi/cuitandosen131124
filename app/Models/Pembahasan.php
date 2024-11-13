<?php

namespace App\Models;

use App\Models\Soal;
use App\Models\Pilgan;
use App\Models\Tryout;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembahasan extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the tryout that owns the Pembahasan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tryout(): BelongsTo
    {
        return $this->belongsTo(Tryout::class);
    }

    /**
     * Get the soal that owns the Pembahasan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function soal(): BelongsTo
    {
        return $this->belongsTo(Soal::class);
    }

    /**
     * Get the pilgana that owns the Pembahasan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pilgana(): BelongsTo
    {
        return $this->belongsTo(Pilgan::class);
    }
}
