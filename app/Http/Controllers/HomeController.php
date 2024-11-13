<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Paket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index()
    {
        return view('home');
    }
    
    public function admin()
    {
        $paket = Paket::all();
        $jumlah_paket = Paket::all()->count();
        $paket_anda = auth()->user()->paketAktif()->count();
        $menunggu_pembayaran = auth()->user()->orders->where('status', 'pending')->where('limit_payment', '>=', Carbon::now())->count();

        return view('admin.tryout', compact('jumlah_paket', 'paket_anda', 'menunggu_pembayaran', 'paket'));
    }

    public function changeTheme($theme)
    {
        $user = auth()->user();
        $user->theme = $theme;
        $user->save();

        return $user;
    }
}
