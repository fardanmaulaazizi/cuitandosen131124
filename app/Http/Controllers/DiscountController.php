<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paket;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Models\DiscountFromBuying;
use Illuminate\Support\Facades\DB;

class DiscountController extends Controller
{
    public function index()
    {
        $regularDiscounts = Discount::where('user_all', null)->get();
        $allUserDiscountTemp = DB::select('
            WITH ranked_discounts AS (
                SELECT *, ROW_NUMBER() OVER (PARTITION BY user_all ORDER BY id) AS row_num
                FROM discounts
                WHERE user_all IS NOT NULL
            )
            SELECT *
            FROM ranked_discounts
            WHERE row_num = 1
        ');
        
        $allUserDiscount = array_map(function ($discount) {
            $paket = Paket::find($discount->paket_id);
        
            if ($paket) {
                $discount->paket_name = $paket->nama;  
            } else {
                $discount->paket_name = null;  
            }
            return $discount;
        }, $allUserDiscountTemp);
        
        $buyingDiscounts = DiscountFromBuying::with(['paketBuyed', 'paketDiscount'])->get();
        // @dd($buyingDiscounts);
        return view('admin.atur_diskon.index', compact('regularDiscounts', 'buyingDiscounts', 'allUserDiscount'));
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
        if($discount->user_all == null && $request->user_id != 'semua'){
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
        }elseif($discount->user_all == null && $request->user_id == 'semua'){
            $discount->delete();
            $unique_name = uniqid();
            $users = User::all();
            foreach($users as $user){
                $discount = new Discount;
                $discount->name = $request->name;
                $discount->user_id = $user->id;
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
                $discount->user_all = $unique_name;
                $discount->save();
            }
        }else{
            $discount = Discount::where('user_all', $discount->user_all)->get();
            foreach($discount as $d){
                $d->delete();
            }
            $unique_name = uniqid();
            $users = User::all();
            foreach($users as $user){
                $discount = new Discount;
                $discount->name = $request->name;
                $discount->user_id = $user->id;
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
                $discount->user_all = $unique_name;
                $discount->save();
            }
        }       
        return redirect('/admin-diskon')->with('success', 'Diskon berhasil diubah');
    }

    public function store(Request $request){
        if($request->user_id == "semua"){
            $unique_name = uniqid();
            $users = User::all();
            foreach($users as $user){
                $discount = new Discount;
                $discount->name = $request->name;
                $discount->user_id = $user->id;
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
                $discount->user_all = $unique_name;
                $discount->save();
            }
        }else{
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
        }
        return redirect('/admin-diskon')->with('success', 'Diskon berhasil ditambahkan');
    }

    public function destroy($id){
        $discount = Discount::find($id);
        $discount->delete();
        return redirect('/admin-diskon')->with('success', 'Diskon berhasil dihapus');
    }

    public function destroyDiscountAllUser($id){
        $discount = Discount::where('user_all', $id)->get();
        foreach($discount as $d){
            $d->delete();
        }
        return redirect('/admin-diskon')->with('success', 'Diskon berhasil dihapus');
    }
}
