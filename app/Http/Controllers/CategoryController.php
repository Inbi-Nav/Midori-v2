<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
    
    public function show($id) {
        $categories = Category::find($id);
        if ($categories) {
            return response()->json($categories);
        } else {
            return response()->json(['message' => 'Categoria no encontrada'], 404);
        }
    }

    public function store(Request $request) {
        $categories = Category::create([
            'name' => $request->name,
            'description'=> $request->description
        ]);
        return response()->json($categories, 201);
    }

    public function update(Request $request, $id) {
        $categories = Category::find($id);
        if($categories) {
            $categories->update($request->all());
            return response()-> json($categories);
        } else {
            return response()-> json(['message' => 'Categoria no encontrada', 404]) ;
        }
    }

    public function destroy($id) {
        $categories = Category::find($id);
        if($categories) {
            $categories->delete();
            return response()->json (['message' => 'Categoria eliminada']);
        } else {
            return response()-> json 
            (['message' => 'Categoria no encontrada'], 404);
        }
    }
}