@extends('layouts.admin')

@section('header', 'Add New Product')

@push('styles')
<style>
    .size-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(60px, 1fr));
        gap: 10px;
    }
    .size-box {
        border: 1px solid var(--border);
        border-radius: 4px;
        padding: 8px;
        text-align: center;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
        background: #f9fafb;
    }
    .size-box:hover { border-color: var(--primary); }
    .size-box.active {
        background: var(--primary);
        color: #fff;
        border-color: var(--primary);
    }
</style>
@endpush

@section('content')
<div class="admin-grid">
    <!-- Left Column: Main Fields -->
    <div>
        <div class="card">
            <div class="card-header">
                <div class="card-title">General Information</div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Product Title</label>
                    <input type="text" class="form-control" placeholder="e.g. Core Black Brazilian Jiu Jitsu Mens BJJ Gi">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" placeholder="Detailed product description..."></textarea>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">Media</div>
            </div>
            <div class="card-body">
                <div style="border: 2px dashed #d1d5db; border-radius: 8px; padding: 40px 20px; text-align: center; color: var(--text-light); cursor: pointer; transition: 0.2s; background:#f9fafb;" onmouseover="this.style.borderColor='var(--primary)'" onmouseout="this.style.borderColor='#d1d5db'">
                    <svg viewBox="0 0 24 24" width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.5" style="margin-bottom: 10px;">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                        <circle cx="8.5" cy="8.5" r="1.5"/>
                        <polyline points="21 15 16 10 5 21"/>
                    </svg>
                    <div style="font-size: 15px; font-weight: 600; color: var(--text-dark);">Add Files</div>
                    <div style="font-size: 13px; margin-top: 5px;">or drag and drop images here</div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">Variants (Sizes & Colors)</div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Available Sizes</label>
                    <div class="size-grid" id="size-grid">
                        <!-- Mock toggles via JS below -->
                        <div class="size-box" onclick="this.classList.toggle('active')">C0</div>
                        <div class="size-box" onclick="this.classList.toggle('active')">C1</div>
                        <div class="size-box" onclick="this.classList.toggle('active')">C2</div>
                        <div class="size-box" onclick="this.classList.toggle('active')">C3</div>
                        <div class="size-box" onclick="this.classList.toggle('active')">XS</div>
                        <div class="size-box" onclick="this.classList.toggle('active')">S</div>
                        <div class="size-box" onclick="this.classList.toggle('active')">M</div>
                        <div class="size-box" onclick="this.classList.toggle('active')">L</div>
                        <div class="size-box" onclick="this.classList.toggle('active')">XL</div>
                        <div class="size-box" onclick="this.classList.toggle('active')">2XL</div>
                        <div class="size-box" onclick="this.classList.toggle('active')">A1</div>
                        <div class="size-box" onclick="this.classList.toggle('active')">A2</div>
                        <div class="size-box" onclick="this.classList.toggle('active')">A3</div>
                    </div>
                </div>

                <div class="form-group" style="margin-top: 30px;">
                    <label class="form-label">Colors</label>
                    <input type="text" class="form-control" placeholder="Type a color and press enter (e.g. Black, White, Blue)">
                    <div style="margin-top: 10px; display: flex; gap: 8px;">
                        <span style="background: #e5e7eb; padding: 4px 10px; border-radius: 4px; font-size: 13px; font-weight: 500; display: flex; align-items: center;">
                            Black <svg viewBox="0 0 24 24" width="14" height="14" stroke="currentColor" fill="none" style="margin-left:5px; cursor:pointer;"><path d="M18 6L6 18M6 6l12 12"></path></svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <div class="card-title">Special Features (Hover Badge)</div>
            </div>
            <div class="card-body">
                <p style="font-size: 13px; color: var(--text-light); margin-bottom: 20px;">Configure the circular badge that appears when hovering over this product in the grid.</p>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Feature Title</label>
                        <input type="text" class="form-control" placeholder="e.g. STRIPE BAR FEATURE">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Feature Subtitle</label>
                        <input type="text" class="form-control" placeholder="e.g. Dedicated black bar to show off your stripes">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Badge Image</label>
                    <input type="file" class="form-control" style="padding: 7px;">
                </div>
            </div>
        </div>

    </div>

    <!-- Right Column: Settings & Pricing -->
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
                <button class="btn btn-primary" style="width: 100%;">Save Product</button>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">Pricing</div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Price</label>
                    <div style="position: relative;">
                        <span style="position: absolute; left: 14px; top: 10px; color: var(--text-light);">$</span>
                        <input type="text" class="form-control" placeholder="0.00" style="padding-left: 28px;">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Compare at price</label>
                    <div style="position: relative;">
                        <span style="position: absolute; left: 14px; top: 10px; color: var(--text-light);">$</span>
                        <input type="text" class="form-control" placeholder="0.00" style="padding-left: 28px;">
                    </div>
                    <div style="font-size: 12px; color: var(--text-light); margin-top: 5px;">To show a reduced price, move the original price into Compare at price.</div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">Organization</div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Category</label>
                    <select class="form-control" style="background-image: url('data:image/svg+xml;utf8,<svg fill=\"none\" stroke=\"%23333\" stroke-width=\"2\" viewBox=\"0 0 24 24\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M6 9l6 6 6-6\"></path></svg>'); background-repeat: no-repeat; background-position: right 12px center; background-size: 14px; appearance: none;">
                        <option>Mens BJJ Gis</option>
                        <option>Kids BJJ Gis</option>
                        <option>Rash Guards</option>
                        <option>BJJ Belts</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Product Type</label>
                    <input type="text" class="form-control" placeholder="e.g. Gi, Shorts, Belt">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
