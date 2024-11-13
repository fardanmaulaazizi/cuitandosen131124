<?php

namespace App\Models;

use App\Models\Soal;
use App\Models\Nilai;
use App\Models\Pembahasan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pilgan extends Model
{
    use HasFactory;
    
    /**
    * Get the soal that owns the Pilgan
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function soal(): BelongsTo
    {
        return $this->belongsTo(Soal::class);
    }
    
    /**
    * Get all of the nilais for the Pilgan
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function nilais(): HasMany
    {
        return $this->hasMany(Nilai::class);
    }
    
    /**
    * Get the pembahasan associated with the Pilgan
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function pembahasan(): HasOne
    {
        return $this->hasOne(Pembahasan::class);
    }
}
