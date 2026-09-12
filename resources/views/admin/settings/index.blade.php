@extends('layouts.admin')

@section('header', 'Store Settings')

@section('content')
    <div class="card" style="max-width: 700px;">
        <div class="card-header">
            <div class="card-title">General Settings</div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div style="padding: 15px 24px; background: #d1fae5; color: #065f46; border-radius: 6px; margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.settings.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Store Name</label>
                    <input type="text" name="store_name" class="form-control" value="{{ $settings['store_name'] ?? '' }}">
                    <div style="font-size: 12px; color: var(--text-light); margin-top: 5px;">This will be displayed in the header and emails.</div>
                </div>

                <div class="form-group">
                    <label class="form-label">Contact Email</label>
                    <input type="email" name="contact_email" class="form-control" value="{{ $settings['contact_email'] ?? '' }}">
                    <div style="font-size: 12px; color: var(--text-light); margin-top: 5px;">Customer support inquiries will be sent here.</div>
                </div>

                <div class="form-group">
                    <label class="form-label">Free Shipping Threshold ($)</label>
                    <input type="number" step="0.01" name="free_shipping_threshold" class="form-control" value="{{ $settings['free_shipping_threshold'] ?? '50.00' }}">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Store Address</label>
                    <textarea name="store_address" class="form-control" style="min-height: 80px;">{{ $settings['store_address'] ?? '' }}</textarea>
                </div>

                <hr style="border:0; border-top: 1px solid var(--border); margin: 30px 0;">
                
                <button type="submit" class="btn btn-primary">Save Settings</button>
            </form>
        </div>
    </div>
@endsection
