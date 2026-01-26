<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return response()->json($products);
    }

    public function show($id) {
        $products = Product::find($id);
        if($products) {
            return response()-> json($products);
        } else {
            return response() ->json (['message' => 'Producto no encontrado']);
        }
    }

    public function store (Request $request) {
        $products = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'material' => $request->material,
            'color' => $request->color,
            'image_url' => $request->image_url,
            'category_id' => $request->category_id,
        ]);
        return response() ->json ($products, 201);
    }

    public function update (Request $request, $id) {
        $products = Product::find($id);
        if ($products) {
            $products -> update ($request->all());
            return response()-> json ($products);
        } else {
            return response() ->json (['message' => 'Producto no encontrado'], 404);
        }
    }

    public function destroy ($id) {
        $products = Product::find($id);
        if($products) {
            $products ->delete();
            return response()-> json(['message' => 'Producto eliminado']);
        } else {
            return response()-> json (['message' => 'Producto no encontrado'], 404);
        }
    }
}
