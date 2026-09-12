@extends('layouts.admin')

@section('header', 'Products')

@section('content')
<div style="display: flex; gap: 30px;">
    <!-- Filters Sidebar -->
    <div style="width: 250px; flex-shrink: 0;">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Filters</div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.products.index') }}" method="GET">
                    
                    <div class="form-group">
                        <label class="form-label">Availability</label>
                        <select name="in_stock" class="form-control" onchange="this.form.submit()">
                            <option value="">All</option>
                            <option value="1" {{ request('in_stock') == '1' ? 'selected' : '' }}>In Stock Only</option>
                            <option value="0" {{ request('in_stock') == '0' ? 'selected' : '' }}>Out of Stock</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Price Range</label>
                        <div style="display: flex; gap: 10px;">
                            <input type="number" name="min_price" class="form-control" placeholder="Min" value="{{ request('min_price') }}">
                            <input type="number" name="max_price" class="form-control" placeholder="Max" value="{{ request('max_price') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Product Type</label>
                        <select name="type" class="form-control" onchange="this.form.submit()">
                            <option value="">All Types</option>
                            <option value="Mens Bjj Gis" {{ request('type') == 'Mens Bjj Gis' ? 'selected' : '' }}>Mens BJJ Gis</option>
                            <option value="Kids BJJ Belt" {{ request('type') == 'Kids BJJ Belt' ? 'selected' : '' }}>Kids BJJ Belt</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Size</label>
                        <select name="size" class="form-control" onchange="this.form.submit()">
                            <option value="">All Sizes</option>
                            <option value="A1" {{ request('size') == 'A1' ? 'selected' : '' }}>A1</option>
                            <option value="A2" {{ request('size') == 'A2' ? 'selected' : '' }}>A2</option>
                            <option value="A3" {{ request('size') == 'A3' ? 'selected' : '' }}>A3</option>
                            <option value="C0" {{ request('size') == 'C0' ? 'selected' : '' }}>C0</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Color</label>
                        <select name="color" class="form-control" onchange="this.form.submit()">
                            <option value="">All Colors</option>
                            <option value="Black" {{ request('color') == 'Black' ? 'selected' : '' }}>Black</option>
                            <option value="White" {{ request('color') == 'White' ? 'selected' : '' }}>White</option>
                            <option value="Gray" {{ request('color') == 'Gray' ? 'selected' : '' }}>Gray</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%;">Apply Filters</button>
                    @if(request()->anyFilled(['in_stock', 'min_price', 'max_price', 'type', 'size', 'color']))
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary" style="width: 100%; margin-top: 10px; text-align: center;">Clear Filters</a>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <!-- Products List -->
    <div style="flex: 1;">
        <div class="card">
            <div class="card-header">
                <div class="card-title">All Products</div>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add Product</a>
            </div>
            <div class="card-body" style="padding: 0;">
                <table style="width: 100%; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="background: #f9fafb; border-bottom: 1px solid var(--border);">
                            <th style="padding: 12px 24px; font-weight: 600; color: var(--text-light); font-size: 12px; text-transform: uppercase;">Product</th>
                            <th style="padding: 12px 24px; font-weight: 600; color: var(--text-light); font-size: 12px; text-transform: uppercase;">Status</th>
                            <th style="padding: 12px 24px; font-weight: 600; color: var(--text-light); font-size: 12px; text-transform: uppercase;">Inventory</th>
                            <th style="padding: 12px 24px; font-weight: 600; color: var(--text-light); font-size: 12px; text-transform: uppercase;">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr style="border-bottom: 1px solid var(--border);">
                            <td style="padding: 16px 24px;">
                                <div style="font-weight: 600; color: var(--primary);">{{ $product->title }}</div>
                                <div style="font-size: 12px; color: var(--text-light); margin-top: 4px;">{{ $product->product_type }}</div>
                            </td>
                            <td style="padding: 16px 24px;">
                                @if($product->status == 'Active')
                                    <span style="background: #d1fae5; color: #047857; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600;">Active</span>
                                @else
                                    <span style="background: #f3f4f6; color: #374151; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600;">Draft</span>
                                @endif
                            </td>
                            <td style="padding: 16px 24px;">
                                @if($product->in_stock)
                                    <span style="color: #047857; font-weight: 500;">In stock</span>
                                @else
                                    <span style="color: #dc2626; font-weight: 500;">Out of stock</span>
                                @endif
                            </td>
                            <td style="padding: 16px 24px; font-weight: 600;">${{ number_format($product->price, 2) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="padding: 30px; text-align: center; color: var(--text-light);">No products match your filters.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                
                <div style="padding: 20px 24px; border-top: 1px solid var(--border);">
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
