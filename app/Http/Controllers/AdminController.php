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
        $query = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name');

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

        if ($request->filled('category')) {
            $query->where('products.category_id', $request->category);
        }

        $products = $query->orderBy('products.id', 'desc')->paginate(12)->withQueryString();

        return view('admin.products.index', compact('products'));
    }


    public function createProduct()
    {
        $categories = DB::table('categories')->get();
        $categoryOptions = $this->buildCategoryTree($categories);
        return view('admin.products.create', compact('categoryOptions'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
        ]);

        $sizes = $request->input('sizes', []);
        $colors = $request->input('colors', []);

        DB::table('products')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'compare_at_price' => $request->compare_at_price,
            'category_id' => $request->category_id,
            'in_stock' => $request->has('in_stock') ? true : false,
            'product_type' => $request->product_type,
            'sizes' => json_encode($sizes),
            'colors' => json_encode($colors),
            'status' => $request->status ?? 'Active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function editProduct($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        if (!$product) abort(404);
        
        $categories = DB::table('categories')->get();
        $categoryOptions = $this->buildCategoryTree($categories);
        return view('admin.products.edit', compact('product', 'categoryOptions'));
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
        ]);

        $sizes = $request->input('sizes', []);
        $colors = $request->input('colors', []);

        DB::table('products')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'compare_at_price' => $request->compare_at_price,
            'category_id' => $request->category_id,
            'in_stock' => $request->has('in_stock') ? true : false,
            'product_type' => $request->product_type,
            'sizes' => json_encode($sizes),
            'colors' => json_encode($colors),
            'status' => $request->status ?? 'Active',
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroyProduct($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    private function buildCategoryTree($categories, $parentId = null, $prefix = '')
    {
        $tree = [];
        foreach ($categories as $category) {
            if ($category->parent_id == $parentId) {
                $tree[] = [
                    'id' => $category->id,
                    'name' => $prefix . $category->name
                ];
                // Recursively get children
                $tree = array_merge($tree, $this->buildCategoryTree($categories, $category->id, $prefix . $category->name . ' > '));
            }
        }
        return $tree;
    }
}
