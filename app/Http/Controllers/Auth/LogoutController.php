<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;


class LogoutController extends Controller
{
    //
    public function logout(Request $request)
    {
        //auth()->user()->currentAccessToken()->delete();
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logout com sucesso...'
        ]);
    }
}
