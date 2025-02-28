<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {

        if(!Auth::attempt($request->only(['email', 'password']))){
            throw ValidationException::withMessages([
                'email' => ['credentials incorrect!']
            ]);
        }
        $user = User::where('email', $request->email)->first();

        return $user;
    }
}
