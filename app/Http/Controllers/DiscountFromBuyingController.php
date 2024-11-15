<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Discount;
use App\Models\DiscountFromBuying;
use Illuminate\Http\Request;

class DiscountFromBuyingController extends Controller
{
    public function create(){
        $pakets_buyed = Paket::whereNotIn('id', function ($query) {
            $query->select('paket_buyed')->from('discount_from_buyings');
        })->get();;
        $pakets_discount = Paket::all();
        return view('admin.atur_diskon.setelah_pembelian.create', compact('pakets_buyed', 'pakets_discount'));
    }

    public function store(Request $request){
        $discount = new DiscountFromBuying();
        $discount->name = $request->name;
        $discount->paket_buyed = $request->paket_buyed;
        $discount->periode_type = $request->periode_type;
        $discount->discount_type = $request->discount_type;
        if($request->paket_discount == 0){
            $discount->is_all = true;
            $discount->paket_discount = null;
        }else{
            $discount->is_all = false;
            $discount->paket_discount = $request->paket_discount;
        }
        if($request->periode_type == 'time-based'){
            $discount->start_date = $request->start_date;
            $discount->end_date = $request->end_date;
        }
        $discount->value = $request->value;
        $discount->save();
        return redirect('/admin-diskon')->with('success', 'Diskon berhasil ditambahkan');
    }

    public function edit($id){
        $discount = DiscountFromBuying::find($id);
        $pakets = Paket::all();
        return view('admin.atur_diskon.setelah_pembelian.edit', compact('discount', 'pakets'));
    }

    public function update(Request $request, $id){
        $discount = DiscountFromBuying::find($id);
        $discount->name = $request->name;
        $discount->paket_buyed = $request->paket_buyed;
        $discount->periode_type = $request->periode_type;
        $discount->discount_type = $request->discount_type;
        if($request->paket_discount == 0){
            $discount->is_all = true;
            $discount->paket_discount = null;
        }else{
            $discount->is_all = false;
            $discount->paket_discount = $request->paket_discount;
        }
        if($request->periode_type == 'time-based'){
            $discount->start_date = $request->start_date;
            $discount->end_date = $request->end_date;
        }
        $discount->value = $request->value;
        $discount->save();
        return redirect('/admin-diskon')->with('success', 'Diskon berhasil diubah');
    }

    public function destroy($id){
        $discount = DiscountFromBuying::find($id);
        $discount->delete();
        return redirect('/admin-diskon')->with('success', 'Diskon berhasil dihapus');
    }
}
    