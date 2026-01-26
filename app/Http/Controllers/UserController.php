<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
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

    public function store(Request $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'role' => 'user'
        ]);
        return response()->json($user, 201);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        if ($user) {
            $user->update($request->all());
            return response()->json($user);
        } else {
            return response()->json(['message'=>"usuario no encontrado"], 404);
        }

    }
    
    public function destroy($id) {
        $user = User::find($id);
        if ($user) {
        $user->delete();
        return response()->json(['message' => 'usuario eliminado']);
        } else  {
        return response()->json(['message' => 'usuario no encontrado'], 404);
        }
    }
}
?>