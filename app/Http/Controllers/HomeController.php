<?php

namespace App\Http\Controllers;

use App\Models\IptvPlans;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.Home', [
            'plans' => IptvPlans::get()
        ]);
    }
}
