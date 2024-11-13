<?php

namespace App\Models;

use App\Models\Paket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;

    /**
     * Get the paket that owns the Video
     *
     * @return \Illuminate\DatabPaketEloquent\Relations\BelongsTo
     */
    public function paket(): BelongsTo
    {
        return $this->belongsTo(Paket::class);
    }
}
