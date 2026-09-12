@extends('layouts.admin')

@section('header', 'Add New Category')

@section('content')
<div class="admin-grid">
    <!-- Left Column: Form Fields -->
    <div class="card">
        <div class="card-header">
            <div class="card-title">Category Details</div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label class="form-label">Category Name</label>
                <input type="text" class="form-control" placeholder="e.g. Mens BJJ Gis">
            </div>
            
            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea class="form-control" placeholder="Enter category description..."></textarea>
            </div>
        </div>
    </div>

    <!-- Right Column: Media & Publish -->
    <div>
        <div class="card">
            <div class="card-header">
                <div class="card-title">Publishing</div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select class="form-control" style="background-image: url('data:image/svg+xml;utf8,<svg fill=\"none\" stroke=\"%23333\" stroke-width=\"2\" viewBox=\"0 0 24 24\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M6 9l6 6 6-6\"></path></svg>'); background-repeat: no-repeat; background-position: right 12px center; background-size: 14px; appearance: none;">
                        <option>Active</option>
                        <option>Draft</option>
                    </select>
                </div>
                <hr style="border:0; border-top: 1px solid var(--border); margin: 20px 0;">
                <button class="btn btn-primary" style="width: 100%;">Save Category</button>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">Category Banner</div>
            </div>
            <div class="card-body">
                <div style="border: 2px dashed #d1d5db; border-radius: 8px; padding: 40px 20px; text-align: center; color: var(--text-light); cursor: pointer; transition: 0.2s;" onmouseover="this.style.borderColor='var(--primary)'" onmouseout="this.style.borderColor='#d1d5db'">
                    <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5" style="margin-bottom: 10px;">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                        <circle cx="8.5" cy="8.5" r="1.5"/>
                        <polyline points="21 15 16 10 5 21"/>
                    </svg>
                    <div style="font-size: 14px; font-weight: 500; color: var(--text-dark);">Click to upload banner</div>
                    <div style="font-size: 12px; margin-top: 5px;">PNG, JPG, GIF up to 5MB</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
