<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $cridential = $request->validate([
            'email' => ['required'],
            'password' => ['required', 'min:8']
        ]);

        if (Auth::attempt($cridential)) {
            return response()->json([
                'message' => 'login success',
                'token' => Auth::user()->createToken('books-token')->plainTextToken
            ]);
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
}
