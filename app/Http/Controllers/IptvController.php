<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class IptvController extends Controller
{
    public function show(Request $request, $token)
    {
        $payment = Payment::with('iptvPlans')->where('token', $token)->first();
        if (!$payment || $payment->user_uuid != auth()->user()->user_uuid) {
            abort(404);
        }

        return view('pages.payment', [
            'payment' =>  $payment
        ])->with('success', 'payment succefull!');
    }
}
