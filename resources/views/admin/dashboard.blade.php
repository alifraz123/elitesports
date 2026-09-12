@extends('layouts.admin')

@section('header', 'Dashboard Overview')

@section('content')
    <div class="admin-grid" style="grid-template-columns: repeat(3, 1fr); margin-bottom: 24px;">
        <div class="card" style="margin-bottom: 0;">
            <div class="card-body">
                <div style="color: var(--text-light); font-size: 14px; font-weight: 600; text-transform: uppercase;">Total Sales</div>
                <div style="font-size: 32px; font-weight: 800; margin: 10px 0;">$24,592.00</div>
                <div style="color: #10b981; font-size: 14px; font-weight: 500;">+12.5% from last month</div>
            </div>
        </div>
        <div class="card" style="margin-bottom: 0;">
            <div class="card-body">
                <div style="color: var(--text-light); font-size: 14px; font-weight: 600; text-transform: uppercase;">Total Orders</div>
                <div style="font-size: 32px; font-weight: 800; margin: 10px 0;">1,249</div>
                <div style="color: #10b981; font-size: 14px; font-weight: 500;">+5.2% from last month</div>
            </div>
        </div>
        <div class="card" style="margin-bottom: 0;">
            <div class="card-body">
                <div style="color: var(--text-light); font-size: 14px; font-weight: 600; text-transform: uppercase;">Active Products</div>
                <div style="font-size: 32px; font-weight: 800; margin: 10px 0;">184</div>
                <div style="color: var(--text-light); font-size: 14px; font-weight: 500;">12 items low in stock</div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="card-title">Recent Orders</div>
            <a href="#" class="btn btn-secondary" style="padding: 6px 12px; font-size: 12px;">View All</a>
        </div>
        <div class="card-body" style="padding: 0;">
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead>
                    <tr style="background: #f9fafb; border-bottom: 1px solid var(--border);">
                        <th style="padding: 12px 24px; font-weight: 600; color: var(--text-light); font-size: 12px; text-transform: uppercase;">Order ID</th>
                        <th style="padding: 12px 24px; font-weight: 600; color: var(--text-light); font-size: 12px; text-transform: uppercase;">Customer</th>
                        <th style="padding: 12px 24px; font-weight: 600; color: var(--text-light); font-size: 12px; text-transform: uppercase;">Date</th>
                        <th style="padding: 12px 24px; font-weight: 600; color: var(--text-light); font-size: 12px; text-transform: uppercase;">Amount</th>
                        <th style="padding: 12px 24px; font-weight: 600; color: var(--text-light); font-size: 12px; text-transform: uppercase;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid var(--border);">
                        <td style="padding: 16px 24px; font-weight: 600;">#ORD-7921</td>
                        <td style="padding: 16px 24px;">John Doe</td>
                        <td style="padding: 16px 24px; color: var(--text-light);">Today, 10:45 AM</td>
                        <td style="padding: 16px 24px; font-weight: 600;">$145.98</td>
                        <td style="padding: 16px 24px;"><span style="background: #dbeafe; color: #1d4ed8; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600;">Processing</span></td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--border);">
                        <td style="padding: 16px 24px; font-weight: 600;">#ORD-7920</td>
                        <td style="padding: 16px 24px;">Jane Smith</td>
                        <td style="padding: 16px 24px; color: var(--text-light);">Today, 09:12 AM</td>
                        <td style="padding: 16px 24px; font-weight: 600;">$64.99</td>
                        <td style="padding: 16px 24px;"><span style="background: #d1fae5; color: #047857; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600;">Shipped</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
