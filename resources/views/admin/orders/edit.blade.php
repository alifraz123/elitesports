@extends('layouts.admin')

@section('header', 'Edit Order #'.$order->order_number)

@section('content')
    <div class="card" style="max-width: 600px;">
        <div class="card-header">
            <div class="card-title">Order Details</div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="form-label">Customer Name</label>
                    <input type="text" name="customer_name" class="form-control" value="{{ $order->customer_name }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Customer Email</label>
                    <input type="email" name="customer_email" class="form-control" value="{{ $order->customer_email }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Total Amount ($)</label>
                    <input type="number" step="0.01" name="total_amount" class="form-control" value="{{ $order->total_amount }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                        <option value="Shipped" {{ $order->status == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Update Order</button>
            </form>
        </div>
    </div>
@endsection
