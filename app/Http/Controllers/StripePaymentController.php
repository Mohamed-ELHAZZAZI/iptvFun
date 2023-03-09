<?php

namespace App\Http\Controllers;

use Stripe;
use App\Models\Payment;
use App\Models\IptvPlans;
use Illuminate\Support\Str;
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
        $plan = IptvPlans::findOrFail($request->plan);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $t = Stripe\Charge::create([
                "amount" => $plan->price * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from LaravelTus.com.",
                'metadata' => [
                    'email' => auth()->user()->email,
                    'user_uuid' => auth()->user()->user_uuid,
                    'ip_address' => $request->ip(),
                    'mac_address' => substr(exec('getmac'), 0, 17)
                ]
            ]);
            $data['user_uuid'] = auth()->user()->user_uuid;
            $data['email'] = $request->email;
            $data['cardHolder'] = $request->cardHolder;
            $data['iptv_plans_id'] = $plan->id;
            $data['mac_address'] = substr(exec('getmac'), 0, 17);
            $data['ip_address'] = $request->ip();
            $data['amount'] = $t->amount;
            $data['payment_id'] = $t->id;
            $data['status'] = $t->status;
            $data['receipt'] = $t->receipt_url;
            $data['risk_score'] = $t->outcome->risk_score;
            $data['risk_level'] = $t->outcome->risk_level;
            $data['card_id'] = $t->source->id;
            $data['country'] = $t->source->country;
            $data['card_brand'] = $t->source->brand;
            $data['last4'] = $t->source->last4;
            $data['token'] = Str::random(64);
            Payment::create($data);
        } catch (\Stripe\Exception\CardException $e) {
            $message = $e->getError()->message;
            return redirect()->back()->with('error', $message)->withInput();
        } catch (\Stripe\Exception\RateLimitException $e) {
            // rate limit error occurred
            $message = "Too many requests, please try again later.";
            return redirect()->back()->with('error', $message)->withInput();
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            // invalid request error occurred
            $message = $e->getError()->message;
            return redirect()->back()->with('error', $message)->withInput();
        } catch (\Stripe\Exception\AuthenticationException $e) {
            // authentication error occurred
            $message = "Authentication error, please try again later.";
            return redirect()->back()->with('error', $message)->withInput();
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            // API connection error occurred
            $message = "Network error, please try again later.";
            return redirect()->back()->with('error', $message)->withInput();
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // generic API error occurred
            $message = "An error occurred, please try again later.";
            return redirect()->back()->with('error', $message)->withInput();
        }


        Session::flash('success', 'Payment successful!');

        return redirect()->route('iptv.show', ['token' => $data['token']]);
    }
}
