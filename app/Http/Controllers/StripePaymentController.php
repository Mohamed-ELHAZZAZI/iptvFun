<?php

namespace App\Http\Controllers;

use App\Models\IptvPlans;
use Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe($slug)
    {
        $plan = IptvPlans::where('slug', $slug)->first();
        if ($plan) {
            return view('pages.checkout', [
                'plan' => $plan
            ]);
        }
        return abort(404);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        dd($request->all());
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from LaravelTus.com."
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }
}
