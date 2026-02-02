<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return response()->json(User::all());
    }

    public function show($id) {
        $user = User::find($id);
        if ($user) {
            return response()->json($user);
        } else  {
            return response()->json(['message' => 'usuario no encontrado'], 404);
        }
        return response()->json($user);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
        $user->update($request->only([
            'name',
            'email',
            'role'
        ]));

        return response()->json($user);
    }

    
    public function destroy($id) {
        $user = User::find($id);

        if (!$user) {
        return response()->json(['message' => 'usuario no encontrado'], 404);
        } 

        $user->delete();
        return response()->json(['message' => 'usuario eliminado']);
    }
}