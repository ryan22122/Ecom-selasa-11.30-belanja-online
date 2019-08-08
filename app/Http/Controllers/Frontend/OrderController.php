<?php

namespace App\Http\Controllers\Frontend;

use App\Transaksi;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $data['orders'] = Transaksi::where('user_id', auth()->user()->id)->get();
        return view('frontend.order.index', $data);
    }
}
