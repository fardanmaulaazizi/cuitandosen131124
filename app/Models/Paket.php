<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Video;
use App\Models\Materi;
use App\Models\Tryout;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paket extends Model
{
    use HasFactory;

    /**
     * Get all of the materis for the Paket
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materis(): HasMany
    {
        return $this->hasMany(Materi::class);
    }

    /**
     * Get all of the videos for the Paket
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function videos(): HasMany
    {
        return $this->hasMany(Video::class);
    }

    /**
     * Get all of the tryouts for the Paket
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tryouts(): HasMany
    {
        return $this->hasMany(Tryout::class);
    }

    /**
     * Get all of the orders for the Paket
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
