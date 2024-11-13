<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use App\Models\Nilai;
use App\Models\Order;
use App\Models\Discount;
use App\Models\NilaiSesi;
use App\Models\TryoutSession;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'hp',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all of the sessions for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sessions(): HasMany
    {
        return $this->hasMany(TryoutSession::class);
    }

    /**
     * Get all of the nilais for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nilais(): HasMany
    {
        return $this->hasMany(Nilai::class);
    }

    /**
     * Get all of the orders for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function paketAktif()
    {
        return $this->orders->where('status', 'aktif')->where('expired', '>=', Carbon::now())
        ->pluck('paket_id');
    }

    /**
     * Get all of the nilai_sesis for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nilai_sesis(): HasMany
    {
        return $this->hasMany(NilaiSesi::class);
    }

    public function diskon(): HasMany
    {
        return $this->hasMany(Discount::class);
    }
}
