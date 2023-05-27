<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function store()
    {
        auth()->user()->createOrGetStripeCustomer();

        return auth()->user()->newSubscription('default')
            ->meteredPrice('price_1NCNuAAhmchRUw3z1OKyDJRd')
            ->checkout([
                'success_url' => route('dashboard'),
                'cancel_url' => route('dashboard'),
            ]);
    }

}