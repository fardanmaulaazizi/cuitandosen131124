<?php

namespace App\Models;

use App\Models\Paket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DiscountFromBuying extends Model
{
    use HasFactory;
    public function paketBuyed()
    {
        return $this->belongsTo(Paket::class, 'paket_buyed');
    }

    // Relasi ke paket diskon (paket_discount)
    public function paketDiscount()
    {
        return $this->belongsTo(Paket::class, 'paket_discount');
    }
}
