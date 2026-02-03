<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $product = Product::all();
        return response()->json($product);
    }

    public function show($id) {

        $product = Product::find($id);

        if($product) {
            return response()-> json($product);
        } else {
            return response() ->json (['message' => 'Producto no encontrado']);
        }
    }

    public function store(Request $request) {
        $product = Product::create($request->only([
            'name',
            'description',
            'price',
            'stock',
            'material',
            'color',
            'image_url',
            'category_id',
        ]));

        return response()->json($product, 201);
    }


    public function update (Request $request, $id) {

        $product = Product::find($id);

        if (!$product) {
            return response() ->json (['message' => 'Producto no encontrado'], 404);
        }
            $product -> update ($request->only([
            'name',
            'description',
            'price',
            'stock',
            'material',
            'color',
            'image_url',

        ]));
        return response()-> json ($product);
    }

    public function destroy ($id) {
        $product = Product::find($id);
        if(!$product) {
            return response()-> json (['message' => 'Producto no encontrado'], 404);
        }

        $product ->delete();
        return response()-> json(['message' => 'Producto eliminado']);
    }
}

