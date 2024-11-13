<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public function generateSnapToken(Order $order, Request $request)
    {
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = true;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        
        $params = [
            'transaction_details' => [
                'order_id' =>uniqid(),
                'gross_amount' => $order->harga,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'last_name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'phone' => '+62',
            ],
        ];
        
        return \Midtrans\Snap::getSnapToken($params);
    }

    public function payAgain(Order $order)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $randomString = '';

        for ($i = 0; $i < 11; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = true;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        
        $params = [
            'transaction_details' => [
                'order_id' => $order->id.$randomString,
                'gross_amount' => $order->harga,
            ],
            'customer_details' => [
                'first_name' => $order->user->name,
                'last_name' => $order->user->name,
                'email' => $order->user->email,
                'phone' => $order->user->hp ?? '+62',
            ],
        ];
        
        return \Midtrans\Snap::getSnapToken($params);
    }
    
    public function midtransCallback(Request $request)
    {
        //dd($request->all());
        $order = Order::findorfail(preg_replace("/[^0-9]/", "", $request->order_id)); 
        
        $serverKey = env('MIDTRANS_SERVER_KEY');
        $hashed = hash('sha512', $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        
        
        if($hashed == $request->signature_key)
        {
            if($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') 
            {
                $paket = $order->paket;
                $order->status = 'aktif';
                $order->expired = now()->addMonths($paket->durasi);
                $order->save();
            } 
        }
        //dd($paket);
        
    }
    
}
