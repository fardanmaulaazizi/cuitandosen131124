<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMateri
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $activeOrders = auth()->user()->orders->where('status', 'aktif')->where('expired', '>=', Carbon::now());

        $pakets = [];
        foreach ($activeOrders as $key => $value) {
            $paket = $value->paket;
			if($paket) {
            foreach ($paket->materis as $vd) {
                $pakets[] = $vd->id;
            }
			}
        }

        $requestedPaketId = $request->route('id');

        if (!in_array($requestedPaketId, $pakets) && auth()->user()->role != 'admin') {
            abort(403, 'Anda Belum Membeli Paket Ini');
        }

        return $next($request);
    }
}
