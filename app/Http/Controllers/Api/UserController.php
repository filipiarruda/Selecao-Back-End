<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Criação do usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'Usuário criado com sucesso!', 'user' => $user], 201);
    }

    public function profile (Request $request)
    {
        $user = Auth::user();

        return response()->json($user);
    }

    public function update (Request $request)
    {
        $userAuthenticated = Auth::user();
        $user = User::find($userAuthenticated->id);
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($request->has('name') && !empty($request->name)) {
            $user->name = $request->name;
        }

        if ($request->has('email') && !empty($request->email)) {
            $user->email = $request->email;
        }

        if ($request->has('password') && !empty($request->email)) {
            $user->password = Hash::make($request->password);
        }

        if ($user->save()) {

            return response()->json([
                'message' => 'Seus dados foram atualizados com sucesso!',
                'user' => $user->only(['id', 'name', 'email', 'created_at', 'updated_at'])
            ]);
        } else {
            return response()->json([
                'message' => 'Ocorreu um erro ao salvar suas informações de usuário, verifique os campos da requisição',
                'user' => $user->only(['id', 'name', 'email', 'created_at', 'updated_at'])
            ]);
        }
    }
}
