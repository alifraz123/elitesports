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
        user-select: none;
    }
    .size-box:hover { border-color: var(--primary); }
    .size-box input:checked + span {
        color: inherit;
    }
    .size-box:has(input:checked) {
        background: var(--primary);
        color: #fff;
        border-color: var(--primary);
    }
    .size-box input {
        display: none;
    }
    .color-swatch-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }
    .color-swatch {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        cursor: pointer;
        position: relative;
        box-shadow: inset 0 0 0 1px rgba(0,0,0,0.1);
    }
    .color-swatch input {
        display: none;
    }
    /* The active state: an outer border ring */
    .color-swatch:has(input:checked)::before {
        content: '';
        position: absolute;
        top: -4px;
        left: -4px;
        right: -4px;
        bottom: -4px;
        border: 2px solid var(--primary);
        border-radius: 50%;
    }
    /* Special case for black/white matching dark mode if needed, but primary is fine */
</style>
@endpush

@section('content')
<form action="{{ route('admin.products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
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
                        <input type="text" name="title" class="form-control" value="{{ $product->title }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control">{{ $product->description }}</textarea>
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
                        <div class="size-grid">
                            @php
                                $selectedSizes = json_decode($product->sizes) ?: [];
                            @endphp
                            @foreach(['C0', 'C1', 'C2', 'C3', 'XS', 'S', 'M', 'L', 'XL', '2XL', 'A1', 'A2', 'A3'] as $size)
                            <label class="size-box">
                                <input type="radio" name="sizes[]" value="{{ $size }}" {{ in_array($size, $selectedSizes) ? 'checked' : '' }} required>
                                <span>{{ $size }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: 30px;">
                        <label class="form-label">Colors</label>
                        <div class="color-swatch-grid">
                            @php
                                $selectedColors = json_decode($product->colors) ?: [];
                                $colors = [
                                    'Black' => '#000000',
                                    'Blue' => '#0000ff',
                                    'Red' => '#ff0000',
                                    'Gray' => '#808080',
                                    'Green' => '#008000',
                                    'Navy' => '#000080',
                                    'Orange' => '#ffa500',
                                    'Pink' => '#ffc0cb',
                                    'Purple' => '#800080',
                                    'Maroon' => '#b22222',
                                    'White' => '#ffffff',
                                    'Yellow' => '#ffff00',
                                ];
                            @endphp
                            @foreach($colors as $name => $hex)
                            <label class="color-swatch" style="background-color: {{ $hex }};" title="{{ $name }}">
                                <input type="radio" name="colors[]" value="{{ $name }}" {{ in_array($name, $selectedColors) ? 'checked' : '' }} required>
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right Column: Settings & Pricing -->
        <div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Publishing & Inventory</div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control" style="...">
                            <option value="Active" {{ $product->status == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Draft" {{ $product->status == 'Draft' ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" style="display: flex; align-items: center; cursor: pointer;">
                            <input type="checkbox" name="in_stock" value="1" {{ $product->in_stock ? 'checked' : '' }} style="margin-right: 10px; width: 16px; height: 16px;">
                            In stock
                        </label>
                    </div>

                    <hr style="border:0; border-top: 1px solid var(--border); margin: 20px 0;">
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Save Product</button>
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
                            <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}" style="padding-left: 28px;" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Compare at price</label>
                        <div style="position: relative;">
                            <span style="position: absolute; left: 14px; top: 10px; color: var(--text-light);">$</span>
                            <input type="number" step="0.01" name="compare_at_price" class="form-control" value="{{ $product->compare_at_price }}" style="padding-left: 28px;">
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
                        <label class="form-label">Product Type</label>
                        <select name="product_type" class="form-control" style="background-image: url('data:image/svg+xml;utf8,<svg fill=\"none\" stroke=\"%23333\" stroke-width=\"2\" viewBox=\"0 0 24 24\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M6 9l6 6 6-6\"></path></svg>'); background-repeat: no-repeat; background-position: right 12px center; background-size: 14px; appearance: none; margin-bottom: 20px;">
                            <option value="Mens Bjj Gis" {{ $product->product_type == 'Mens Bjj Gis' ? 'selected' : '' }}>Mens BJJ Gis</option>
                            <option value="Kids BJJ Belt" {{ $product->product_type == 'Kids BJJ Belt' ? 'selected' : '' }}>Kids BJJ Belt</option>
                            <option value="Rash Guards" {{ $product->product_type == 'Rash Guards' ? 'selected' : '' }}>Rash Guards</option>
                            <option value="Shorts" {{ $product->product_type == 'Shorts' ? 'selected' : '' }}>Shorts</option>
                        </select>

                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-control" style="background-image: url('data:image/svg+xml;utf8,<svg fill=\"none\" stroke=\"%23333\" stroke-width=\"2\" viewBox=\"0 0 24 24\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M6 9l6 6 6-6\"></path></svg>'); background-repeat: no-repeat; background-position: right 12px center; background-size: 14px; appearance: none;">
                            <option value="">Select Category</option>
                            @foreach($categoryOptions as $cat)
                                <option value="{{ $cat['id'] }}" {{ $product->category_id == $cat['id'] ? 'selected' : '' }}>{{ $cat['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
