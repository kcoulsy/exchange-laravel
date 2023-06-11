<?php

namespace App\Http\Controllers;

class CheckoutController extends Controller
{
    public function store()
    {
        auth()->user()->createOrGetStripeCustomer();

        return auth()->user()->newSubscription('default')
            ->meteredPrice('price_1NCPdVAhmchRUw3zVnVtL1UQ')
            ->quantity(auth()->user()->listings()->count() > 0 ? auth()->user()->listings()->count() : 1)
            ->checkout([
                'success_url' => route('dashboard'),
                'cancel_url' => route('dashboard'),
            ]);
    }
}
