<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $products = Product::with('category')

            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->search . '%');
            })

            ->when($request->category, function ($query) use ($request) {
                $query->where('category_id', $request->category);
            })

            ->when($request->color, function ($query) use ($request) {
                $query->where('color', $request->color);
            })

            ->when($request->material, function ($query) use ($request) {
                $query->where('material', $request->material);
            })

            ->when($request->price, function ($query) use ($request) {
                match ($request->price) {
                    'low' => $query->where('price', '<', 20),
                    'mid' => $query->whereBetween('price', [20, 50]),
                    'high' => $query->where('price', '>', 50),
                };
            }) ->get();
        return view('shop.index', compact('products', 'categories'));
    }
}
