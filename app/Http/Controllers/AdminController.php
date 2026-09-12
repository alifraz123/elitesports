<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function indexProducts(Request $request)
    {
        $query = DB::table('products');

        if ($request->has('in_stock')) {
            $query->where('in_stock', $request->in_stock == '1');
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->filled('type')) {
            $query->where('product_type', $request->type);
        }

        if ($request->filled('size')) {
            // Simplified JSON search (for SQLite/MySQL cross-compatibility without specialized operators, we use LIKE for this mockup)
            $query->where('sizes', 'LIKE', '%' . $request->size . '%');
        }

        if ($request->filled('color')) {
            $query->where('colors', 'LIKE', '%' . $request->color . '%');
        }

        $products = $query->orderBy('id', 'desc')->paginate(12)->withQueryString();

        return view('admin.products.index', compact('products'));
    }

    public function createCategory()
    {
        return view('admin.categories.create');
    }

    public function createProduct()
    {
        return view('admin.products.create');
    }
}
