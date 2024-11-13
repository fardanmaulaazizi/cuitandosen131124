<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\Tryout;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTryout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
		if (auth()->user()->role == 'admin') {
        return $next($request);
    }
        $activeOrders = auth()->user()->orders->where('status', 'aktif')->where('expired', '>=', Carbon::now());

        $pakets = [];
        foreach ($activeOrders as $key => $value) {
            $paket = $value->paket;
            foreach ($paket->tryouts as $vd) {
                $pakets[] = $vd->id;
            }

            $free = Tryout::where('paket_id', 0)->get();

            foreach ($free as $fr) {
                $pakets[] = $fr->id;
            }
        }

        $requestedPaketId = $request->route('id');

        if (!in_array($requestedPaketId, $pakets) && auth()->user()->role != 'admin') {
            abort(403, 'Anda Belum Membeli Paket Ini');
        }

        return $next($request);
    }
}
