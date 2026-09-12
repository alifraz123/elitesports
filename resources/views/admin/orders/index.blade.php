@extends('layouts.admin')

@section('header', 'Orders')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">All Orders</div>
            <a href="{{ route('admin.orders.create') }}" class="btn btn-primary">Create Order</a>
        </div>
        <div class="card-body" style="padding: 0;">
            @if(session('success'))
                <div style="padding: 15px 24px; background: #d1fae5; color: #065f46; border-bottom: 1px solid var(--border);">
                    {{ session('success') }}
                </div>
            @endif
            
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead>
                    <tr style="background: #f9fafb; border-bottom: 1px solid var(--border);">
                        <th style="padding: 12px 24px; font-weight: 600; color: var(--text-light); font-size: 12px; text-transform: uppercase;">Order ID</th>
                        <th style="padding: 12px 24px; font-weight: 600; color: var(--text-light); font-size: 12px; text-transform: uppercase;">Customer</th>
                        <th style="padding: 12px 24px; font-weight: 600; color: var(--text-light); font-size: 12px; text-transform: uppercase;">Date</th>
                        <th style="padding: 12px 24px; font-weight: 600; color: var(--text-light); font-size: 12px; text-transform: uppercase;">Amount</th>
                        <th style="padding: 12px 24px; font-weight: 600; color: var(--text-light); font-size: 12px; text-transform: uppercase;">Status</th>
                        <th style="padding: 12px 24px; font-weight: 600; color: var(--text-light); font-size: 12px; text-transform: uppercase; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr style="border-bottom: 1px solid var(--border);">
                        <td style="padding: 16px 24px; font-weight: 600;">#{{ $order->order_number }}</td>
                        <td style="padding: 16px 24px;">{{ $order->customer_name }}</td>
                        <td style="padding: 16px 24px; color: var(--text-light);">{{ \Carbon\Carbon::parse($order->created_at)->format('M d, Y h:i A') }}</td>
                        <td style="padding: 16px 24px; font-weight: 600;">${{ number_format($order->total_amount, 2) }}</td>
                        <td style="padding: 16px 24px;">
                            @if($order->status == 'Pending')
                                <span style="background: #fef3c7; color: #92400e; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600;">{{ $order->status }}</span>
                            @elseif($order->status == 'Processing')
                                <span style="background: #dbeafe; color: #1d4ed8; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600;">{{ $order->status }}</span>
                            @elseif($order->status == 'Shipped')
                                <span style="background: #d1fae5; color: #047857; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600;">{{ $order->status }}</span>
                            @else
                                <span style="background: #f3f4f6; color: #374151; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600;">{{ $order->status }}</span>
                            @endif
                        </td>
                        <td style="padding: 16px 24px; text-align: right;">
                            <a href="{{ route('admin.orders.edit', $order->id) }}" style="color: var(--primary); font-size: 14px; font-weight: 600; margin-right: 15px;">Edit</a>
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: var(--danger); font-size: 14px; font-weight: 600; cursor: pointer;">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="padding: 30px; text-align: center; color: var(--text-light);">No orders found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            
            <div style="padding: 20px 24px; border-top: 1px solid var(--border);">
                {{ $orders->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
