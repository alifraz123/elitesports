<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')->orderBy('id', 'desc')->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        return view('admin.orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'total_amount' => 'required|numeric'
        ]);

        DB::table('orders')->insert([
            'order_number' => strtoupper(Str::random(10)),
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'total_amount' => $request->total_amount,
            'status' => $request->status ?? 'Pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Order created successfully.');
    }

    public function edit($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();
        if (!$order) {
            abort(404);
        }
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'total_amount' => 'required|numeric',
            'status' => 'required'
        ]);

        DB::table('orders')->where('id', $id)->update([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'total_amount' => $request->total_amount,
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('orders')->where('id', $id)->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }
}
