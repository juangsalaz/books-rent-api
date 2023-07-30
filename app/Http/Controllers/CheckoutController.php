<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Checkout;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function create(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'book_id' => 'required'
        ]);

        //check if the copies is not 0
        $book = Book::find($request->book_id);
        if (!empty($book)) {
            $checkout = Checkout::create([
                'user_id' => $request->user_id,
                'book_id' => $request->book_id,
                'checkout_date' => Carbon::now()
            ]);

            //if checkout success
            if ($checkout) {
                $current_copies = $book->copies;
                $book->copies = $current_copies - 1;
                $book->save();

                return response()->json([
                    'data' => $book
                ], 201);
            } else {
                return response()->json([
                    "message" => "Checkout failed"
                ], 422);
            }
            
        } else {
            return response()->json([
                "message" => "Number of copies is 0"
            ], 422);
        }
    }
    
    function update(Checkout $checkout) {
        if ($checkout->return_date == null) {
            $checkout->return_date = Carbon::now();

            if ($checkout->save()) {
                $book = Book::find($checkout->book_id);

                if (!empty($book)) {
                    $current_copies = $book->copies;
                    $book->copies = $current_copies + 1;
                    $book->save();

                    return response()->json([
                        "message" => "Book return success"
                    ], 201);
                } else {
                    return response()->json([
                        "message" => "Book Not Found"
                    ], 404);
                }
            } else {
                return response()->json([
                    "message" => "Book return failed"
                ], 422);
            }
        } else {
            return response()->json([
                "message" => "This book was returned"
            ], 422);
        }
    }
}
