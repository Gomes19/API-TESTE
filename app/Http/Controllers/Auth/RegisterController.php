<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    //

    public function __construct(
        protected User $repository
    ) {}
    public function register(RegisterRequest $request){
        try {
            $data = $request->all();
            
            $store = $this->repository->create($data);

             $user = $this->repository->where('telefone', $request->email)->first();

          
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'message' => 'Credenciais inválidas...'
                ], 401);
            }

            $token = $user->createToken('API Token')->plainTextToken;

            return response()->json([
                'token' => $token,
                'data' => new UserResource($user)
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'mensagem' => "Erro ao criar usuario",
                'erro' =>$th->getMessage(),
            ], 500);
        }
    }
}
