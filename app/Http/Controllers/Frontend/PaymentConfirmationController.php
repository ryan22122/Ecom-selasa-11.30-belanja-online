<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Transaksi;

class PaymentConfirmationController extends Controller
{
    public function index($id)
    {
        $data['transaksi'] = Transaksi::findOrFail($id);
        return view('frontend.payment-confirmation.index', $data);
    }
}
