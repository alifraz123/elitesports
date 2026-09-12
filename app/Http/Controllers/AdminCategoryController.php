<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCategoryController extends Controller
{
    public function index()
    {
        // Fetch categories with a left join to get parent names
        $categories = DB::table('categories as c1')
            ->leftJoin('categories as c2', 'c1.parent_id', '=', 'c2.id')
            ->select('c1.*', 'c2.name as parent_name')
            ->orderBy('c1.id', 'desc')
            ->paginate(12);
            
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = DB::table('categories')->get();
        $categoryOptions = $this->buildCategoryTree($categories);
        return view('admin.categories.create', compact('categoryOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        DB::table('categories')->insert([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'description' => $request->description,
            'status' => $request->status ?? 'Active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        if (!$category) abort(404);
        
        $categories = DB::table('categories')->get();
        $categoryOptions = $this->buildCategoryTree($categories, 0, '', $id);
            
        return view('admin.categories.edit', compact('category', 'categoryOptions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        DB::table('categories')->where('id', $id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'description' => $request->description,
            'status' => $request->status ?? 'Active',
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }

    private function buildCategoryTree($categories, $parentId = null, $prefix = '', $excludeId = null)
    {
        $tree = [];
        foreach ($categories as $category) {
            if ($category->parent_id == $parentId) {
                if ($excludeId !== null && $category->id == $excludeId) {
                    continue; // Skip the excluded category and its children
                }
                $tree[] = [
                    'id' => $category->id,
                    'name' => $prefix . $category->name
                ];
                // Recursively get children
                $tree = array_merge($tree, $this->buildCategoryTree($categories, $category->id, $prefix . $category->name . ' > ', $excludeId));
            }
        }
        return $tree;
    }
}
