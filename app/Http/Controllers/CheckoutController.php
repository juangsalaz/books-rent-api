<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'book_id' => 'required'
        ]);

        $checkout = Checkout::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'checkout_date' => Carbon::now()
        ]);

        if ($checkout) {
            dd($checkout);
        }
    }
}
