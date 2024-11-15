<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Paket;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\MidtransController;

class OrderController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $paket = Paket::all();
        
        return view('admin.beli_paket.index', compact('paket'));
    }
    
    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        //
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(MidtransController $midtrans, Request $request)
    {
        $paket = Paket::findorfail($request->paket_id);
        //dd(auth()->user()->paketAktif());
        if (auth()->user()->paketAktif()->contains($request->paket_id)) {
            return redirect()->back()->with('error', 'Anda Sudah Membeli Paket Ini');
        }
        
        $order = new Order;
        $order->paket_id = $request->paket_id;
        $order->user_id = auth()->user()->id;
        if($request->discount_id) {
            $discount = Discount::findorfail($request->discount_id);
            $discount->is_used = true;
            $discount->save();
            
            if($discount->discount_type == 'nominal') {
                $order->harga = $paket->harga - $discount->value;
            }else{
                $order->harga = $paket->harga - ($paket->harga * $discount->value / 100);
            }
        }else{
            $order->harga = $paket->harga;
        }
        $order->limit_payment = Carbon::now()->addHours(24);
        $order->save();
        
        $snapToken = $midtrans->generateSnapToken($order, $request);
        
        return view('admin.beli_paket.pay', compact('order', 'snapToken'));
    }
    
    /**
    * Display the specified resource.
    */
    public function show(string $id)
    {
        $paket = Paket::findorfail($id);
        $discountsTimeBased = Discount::where('paket_id', $paket->id)
        ->where('periode_type', 'time-based')
        ->where('is_all', false)
        ->where('start_date', '<=', Carbon::now())
        ->where('end_date', '>=', Carbon::now())
        ->where('is_active', true)
        ->where('is_used', false)
        ->get();
        $discountsNominal = Discount::where('paket_id', $paket->id)
        ->where('periode_type', 'nominal')
        ->where('is_all', false)
        ->where('is_active', true)
        ->where('is_used', false)
        ->get();
        $discountsAllProducts = Discount::where('is_all', true)
        ->where('is_active', true)
        ->where('is_used', false)
        ->get();
        $discounts = $discountsTimeBased->merge($discountsNominal)->merge($discountsAllProducts);
        return view('admin.beli_paket.show', compact('paket', 'discounts'));
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(string $id)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, string $id)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
        //
    }
    
    public function history()
    {
        $berhasil = auth()->user()->orders->where('status', 'aktif');
        //dd($berhasil);
        $tunggu = auth()->user()->orders->where('status', 'pending')->where('limit_payment', '>=', Carbon::now());
        
        $gagal = auth()->user()->orders->where('status', 'pending')->where('limit_payment', '<', Carbon::now());
        
        return view('admin.beli_paket.history', compact('tunggu', 'gagal', 'berhasil'));
    }
    
    /* public function myPaket()
    {
        $order = auth()->user()->orders->where('status', 'aktif')->where('expired', '>=', Carbon::now());

        return view('admin.paket_saya.index', compact('order'));
        
    } */

    public function myPaket()
    {
        return view('admin.paket_saya.choose_kategori');
    }

    public function showPaket($id)
    {
        $paket = Paket::findorfail($id);

        return view('admin.paket_saya.show', compact('paket'));
    }

    public function payment(MidtransController $midtrans, $id)
    {
        $order = Order::findorfail($id);

        $snapToken = $midtrans->payAgain($order);

        return view('admin.beli_paket.pay', compact('order', 'snapToken'));
    }

    public function chooseKategori($kategori)
    {
		$order = [];
		if (auth()->user()->orders) {
        // Filter orders based on the status and expiration date
        $order = auth()->user()->orders->where('status', 'aktif')
            ->where('expired', '>=', Carbon::now())
            ->filter(function($q) use($kategori) {
                // Check if paket exists and then compare kategori
                return $q->paket && $q->paket->kategori == $kategori;
            });
    }
        return view('admin.paket_saya.index', compact('order', 'kategori'));
    }

    public function beliLanding(string $id)
    {
        $paket = Paket::findorfail($id);
        
        return view('landing.beli_paket.show', compact('paket'));
    }
}
