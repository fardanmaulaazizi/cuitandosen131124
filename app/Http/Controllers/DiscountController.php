<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paket;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Models\DiscountFromBuying;

class DiscountController extends Controller
{
    public function index()
    {
        $regularDiscounts = Discount::all();
        $buyingDiscounts = DiscountFromBuying::with(['paketBuyed', 'paketDiscount'])->get();
        // @dd($buyingDiscounts);
        return view('admin.atur_diskon.index', compact('regularDiscounts', 'buyingDiscounts'));
    }

    public function create(){
        $users = User::all();
        $pakets = Paket::all();
        return view('admin.atur_diskon.create', compact('users', 'pakets'));
    }

    public function edit($id){
        $discount = Discount::find($id);
        $users = User::all();
        $pakets = Paket::all();
        return view('admin.atur_diskon.edit', compact('discount', 'users', 'pakets'));
    }

    public function update(Request $request, $id){
        $discount = Discount::find($id);
        $discount->name = $request->name;
        $discount->user_id = $request->user_id;
        if($request->paket_id == 0){
            $discount->is_all = true;
            $discount->paket_id = Paket::first()->id;
        }else{
            $discount->is_all = false;
            $discount->paket_id = $request->paket_id;
        }
        $discount->periode_type = $request->periode_type;
        if($request->periode_type == 'time-based'){
            $discount->start_date = $request->start_date;
            $discount->end_date = $request->end_date;
        }
        if($request->is_active == '1'){
            $discount->is_active = true;
        }else{
            $discount->is_active = false;
        }
        $discount->discount_type = $request->discount_type;
        $discount->value = $request->value;
        $discount->is_used = false;
        $discount->is_active = $discount->is_active;
        $discount->save();
        return redirect('/admin-diskon')->with('success', 'Diskon berhasil diubah');
    }

    public function store(Request $request){
        $discount = new Discount;
        $discount->name = $request->name;
        $discount->user_id = $request->user_id;
        if($request->paket_id == 0){
            $discount->is_all = true;
            $discount->paket_id = null;
        }else{
            $discount->is_all = false;
            $discount->paket_id = $request->paket_id;
        }
        $discount->periode_type = $request->periode_type;
        $discount->discount_type = $request->discount_type;
        if($request->periode_type == 'time-based'){
            $discount->start_date = $request->start_date;
            $discount->end_date = $request->end_date;
        }
        $discount->is_active = true;
        $discount->value = $request->value;
        $discount->is_used = false;
        $discount->save();
        return redirect('/admin-diskon')->with('success', 'Diskon berhasil ditambahkan');
    }

    public function destroy($id){
        $discount = Discount::find($id);
        $discount->delete();
        return redirect('/admin-diskon')->with('success', 'Diskon berhasil dihapus');
    }
}
