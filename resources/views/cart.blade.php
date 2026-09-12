@extends('layouts.app')

@section('content')
<style>
    .cart-page-container {
        padding: 40px 5%;
        background-color: #050505;
    }

    .cart-banner {
        width: 100%;
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 30px;
        display: flex;
        justify-content: center;
        background-color: #111;
    }

    .cart-banner img {
        width: 100%;
        max-height: 450px;
        object-fit: cover;
        display: block;
    }

    .cart-page-header {
        margin-top: 10px;
    }

    .cart-page-title {
        color: #f5b800;
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 8px;
        letter-spacing: -0.5px;
    }

    .cart-breadcrumbs {
        color: #888;
        font-size: 0.95rem;
    }

    .cart-breadcrumbs a {
        color: #ccc;
        text-decoration: none;
        transition: color 0.3s;
    }

    .cart-breadcrumbs a:hover {
        color: #fff;
    }

    .cart-breadcrumbs span {
        margin: 0 8px;
    }

    /* ===== SHOP LAYOUT ===== */
    .shop-layout {
        display: grid;
        grid-template-columns: 280px 1fr;
        gap: 50px;
        margin-top: 50px;
        align-items: start;
    }

    @media (max-width: 992px) {
        .shop-layout {
            grid-template-columns: 1fr;
        }
        .shop-sidebar {
            display: none; /* A real app would have a mobile filter drawer */
        }
    }

    /* ===== SIDEBAR FILTERS ===== */
    .shop-sidebar {
        background: transparent;
    }

    .filter-header {
        display: flex;
        align-items: center;
        color: #fff;
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 10px;
        border-bottom: 1px solid #1a1a1a;
        padding-bottom: 25px;
    }

    .filter-header svg {
        width: 20px;
        height: 20px;
        margin-right: 12px;
    }

    /* Toggle */
    .filter-toggle {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #fff;
        font-weight: 700;
        font-size: 1rem;
        padding: 25px 0;
        border-bottom: 1px solid #1a1a1a;
    }
    
    .toggle-switch {
        position: relative;
        width: 44px;
        height: 24px;
        background: #222;
        border-radius: 12px;
        cursor: pointer;
        transition: 0.3s;
    }
    .toggle-switch::after {
        content: '';
        position: absolute;
        top: 2px;
        left: 2px;
        width: 20px;
        height: 20px;
        background: #111;
        border-radius: 50%;
        transition: 0.3s;
    }
    .toggle-switch.active { background: #fff; }
    .toggle-switch.active::after { left: 22px; background: #000; }

    /* Accordions */
    .filter-group {
        padding: 25px 0;
        border-bottom: 1px solid #1a1a1a;
    }
    
    .filter-group-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #fff;
        font-weight: 700;
        font-size: 1.05rem;
        cursor: pointer;
    }
    
    .filter-group-header svg {
        width: 18px;
        height: 18px;
        color: #000;
        background: #fff;
        border-radius: 50%;
        padding: 2px;
        transition: transform 0.3s;
    }
    .filter-group:not(.expanded) .filter-group-header svg {
        background: #222;
        color: #fff;
        transform: rotate(180deg);
    }

    .filter-group-content {
        margin-top: 25px;
        display: none;
    }
    .filter-group.expanded .filter-group-content {
        display: block;
    }

    /* Price Slider */
    .price-range-slider {
        position: relative;
        height: 4px;
        background: #333;
        margin: 20px 0 30px 0;
        border-radius: 2px;
    }
    .price-range-progress {
        position: absolute;
        left: 0;
        right: 0;
        height: 100%;
        background: #fff;
        border-radius: 2px;
    }
    .price-range-thumb {
        position: absolute;
        top: -6px;
        width: 16px;
        height: 16px;
        background: #fff;
        border-radius: 50%;
        cursor: pointer;
    }
    .price-range-thumb.left { left: 0; }
    .price-range-thumb.right { right: 0; }

    .price-inputs {
        display: flex;
        align-items: center;
        gap: 15px;
    }
    .price-input-wrapper {
        flex: 1;
        display: flex;
        align-items: center;
        background: #0a0a0a;
        border: 1px solid #222;
        border-radius: 4px;
        padding: 10px 12px;
    }
    .price-input-wrapper span {
        color: #888;
        margin-right: 8px;
        font-size: 0.9rem;
    }
    .price-input-wrapper input {
        width: 100%;
        background: transparent;
        border: none;
        color: #fff;
        outline: none;
        font-family: inherit;
        font-size: 0.95rem;
    }
    .price-separator { color: #666; font-size: 0.9rem; }

    /* Checkbox List */
    .checkbox-list {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    .checkbox-item {
        display: flex;
        align-items: center;
        color: #bbb;
        font-size: 0.95rem;
        font-weight: 700;
        cursor: pointer;
    }
    .checkbox-item:hover { color: #fff; }
    .checkbox-item input { display: none; }
    .checkbox-box {
        width: 18px;
        height: 18px;
        background: #1a1a1a;
        border-radius: 3px;
        margin-right: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.2s;
    }
    .checkbox-item input:checked + .checkbox-box {
        background: #444;
    }
    /* Simulated checkmark using border in dark mode usually */

    /* Colors */
    .color-swatches {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }
    .color-swatch {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        cursor: pointer;
        border: 1px solid #fff;
        transition: transform 0.2s;
    }
    .color-swatch:hover { transform: scale(1.15); }
    
    .c-black { background: #000; }
    .c-blue { background: #0000ff; border-color: #0000ff; }
    .c-red { background: #ff0000; border-color: #ff0000; }
    .c-grey { background: #808080; border-color: #808080; }
    .c-green { background: #008000; border-color: #008000; }
    .c-navy { background: #000080; border-color: #000080; }
    .c-orange { background: #ffa500; border-color: #ffa500; }
    .c-pink { background: #ffc0cb; border-color: #ffc0cb; }
    .c-purple { background: #800080; border-color: #800080; }
    .c-white { background: #fff; }
    .c-yellow { background: #ffff00; border-color: #ffff00; }

    /* ===== MAIN PRODUCT AREA ===== */
    .shop-main {
        display: flex;
        flex-direction: column;
    }

    .shop-topbar {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 10px;
    }

    .sort-by {
        color: #fff;
        font-weight: 700;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        cursor: pointer;
    }
    .sort-by span { font-weight: 400; margin-right: 5px; color: #ccc;}
    .sort-by svg { 
        width: 16px; 
        height: 16px; 
        margin-left: 8px; 
        background: #1a1a1a; 
        border-radius: 50%; 
        padding: 2px;
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
    @media (max-width: 1200px) {
        .product-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 576px) {
        .product-grid { grid-template-columns: 1fr; }
    }

    /* Product Card */
    .product-card {
        background: transparent;
        display: flex;
        flex-direction: column;
        cursor: pointer;
    }
    
    .product-img-wrap {
        position: relative;
        width: 100%;
        padding-top: 135%; /* Tall aspect ratio for gis */
        background: #111;
        overflow: hidden;
        border-radius: 4px;
        margin-bottom: 12px;
    }
    
    .product-img-wrap img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .product-card:hover .product-img-wrap img {
        transform: scale(1.03);
    }

    .product-title {
        color: #fff;
        font-size: 0.95rem;
        font-weight: 700;
        margin-bottom: 6px;
        line-height: 1.4;
        display: flex;
        justify-content: space-between;
    }
    
    .product-rating {
        display: flex;
        align-items: center;
        color: #fff;
        font-size: 0.85rem;
        font-weight: 700;
        white-space: nowrap;
        margin-left: 10px;
    }
    .product-rating svg {
        width: 12px;
        height: 12px;
        color: #f5b800;
        margin-left: 4px;
        fill: currentColor;
    }

    .product-price-row {
        display: flex;
        align-items: center;
    }
    
    .product-price {
        color: #f5b800;
        font-weight: 700;
        font-size: 1rem;
    }
    .product-price-old {
        color: #666;
        text-decoration: line-through;
        font-size: 0.85rem;
        margin-left: 8px;
    }
</style>

<div class="cart-page-container">
    <div class="cart-banner">
        <img src="{{ asset('images/hero-banner.jpg') }}" alt="Elite Sports Athletes">
    </div>
    
    <div class="cart-page-header">
        <h1 class="cart-page-title">Elite Sports</h1>
        <div class="cart-breadcrumbs">
            <a href="/">Home</a> <span>&gt;</span> Elite Sports
        </div>
    </div>

    <div class="shop-layout">
        <!-- SIDEBAR -->
        <aside class="shop-sidebar">
            <div class="filter-header">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="4" y1="21" x2="4" y2="14"/>
                    <line x1="4" y1="10" x2="4" y2="3"/>
                    <line x1="12" y1="21" x2="12" y2="12"/>
                    <line x1="12" y1="8" x2="12" y2="3"/>
                    <line x1="20" y1="21" x2="20" y2="16"/>
                    <line x1="20" y1="12" x2="20" y2="3"/>
                    <line x1="1" y1="14" x2="7" y2="14"/>
                    <line x1="9" y1="8" x2="15" y2="8"/>
                    <line x1="17" y1="16" x2="23" y2="16"/>
                </svg>
                Filters
            </div>

            <!-- In stock -->
            <div class="filter-toggle">
                In stock only
                <div class="toggle-switch" id="stock-toggle"></div>
            </div>

            <!-- Price -->
            <div class="filter-group expanded">
                <div class="filter-group-header" onclick="this.parentElement.classList.toggle('expanded')">
                    Price
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 15l-6-6-6 6"/>
                    </svg>
                </div>
                <div class="filter-group-content">
                    <div class="price-range-slider">
                        <div class="price-range-progress"></div>
                        <div class="price-range-thumb left"></div>
                        <div class="price-range-thumb right"></div>
                    </div>
                    <div class="price-inputs">
                        <div class="price-input-wrapper">
                            <span>$</span>
                            <input type="text" value="0">
                        </div>
                        <span class="price-separator">to</span>
                        <div class="price-input-wrapper">
                            <span>$</span>
                            <input type="text" value="130">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Type -->
            <div class="filter-group expanded">
                <div class="filter-group-header" onclick="this.parentElement.classList.toggle('expanded')">
                    Product type
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 15l-6-6-6 6"/>
                    </svg>
                </div>
                <div class="filter-group-content">
                    <div class="checkbox-list">
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> Adults BJJ Belt (5)</label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> BJJ Grappling Dummy (2)</label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> BJJ NO-GI Shorts (4)</label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> Kids BJJ Belt (13)</label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> Kids Bjj Gis (11)</label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> Kids Bjj NO-GI Shorts (4)</label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> Long Sleeve Rash Guards (20)</label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> Mens Bjj Gis (13)</label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> Short Sleeve Rash Guards (20)</label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> Womens Bjj Gis (5)</label>
                    </div>
                </div>
            </div>

            <!-- Size -->
            <div class="filter-group expanded">
                <div class="filter-group-header" onclick="this.parentElement.classList.toggle('expanded')">
                    Size
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 15l-6-6-6 6"/>
                    </svg>
                </div>
                <div class="filter-group-content">
                    <div class="checkbox-list">
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> XS (10)</label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> S (48)</label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> M (48)</label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> L (47)</label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> XL (44)</label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> 2XL (41)</label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> 3XL (31)</label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> 0 (7)</label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> 00 (7)</label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> 1 (11)</label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> 2 (11)</label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> 3 (11)</label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> A1 (14)</label>
                    </div>
                </div>
            </div>

            <!-- Color -->
            <div class="filter-group expanded">
                <div class="filter-group-header" onclick="this.parentElement.classList.toggle('expanded')">
                    Color
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 15l-6-6-6 6"/>
                    </svg>
                </div>
                <div class="filter-group-content">
                    <div class="color-swatches">
                        <div class="color-swatch c-black"></div>
                        <div class="color-swatch c-blue"></div>
                        <div class="color-swatch c-red"></div>
                        <div class="color-swatch c-grey"></div>
                        <div class="color-swatch c-green"></div>
                        <div class="color-swatch c-navy"></div>
                        <div class="color-swatch c-orange"></div>
                        <div class="color-swatch c-pink"></div>
                        <div class="color-swatch c-purple"></div>
                        <div class="color-swatch c-red"></div>
                        <div class="color-swatch c-white"></div>
                        <div class="color-swatch c-yellow"></div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- MAIN PRODUCTS -->
        <main class="shop-main">
            <div class="shop-topbar">
                <div class="sort-by">
                    <span>Sort by:</span> Featured
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 9l6 6 6-6"/>
                    </svg>
                </div>
            </div>

            <div class="product-grid">
                <!-- Product 1 -->
                <div class="product-card">
                    <div class="product-img-wrap">
                        <img src="{{ asset('images/gi-black.jpg') }}" alt="Core Black Gi">
                    </div>
                    <div class="product-title">
                        Core Black Brazilian Jiu Jitsu Mens BJJ Gi
                        <div class="product-rating">4.9 <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></div>
                    </div>
                    <div class="product-price-row">
                        <span class="product-price">$49.99</span>
                        <span class="product-price-old">$68.81</span>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="product-card">
                    <div class="product-img-wrap">
                        <img src="{{ asset('images/gi-white.jpg') }}" alt="Core White Gi">
                    </div>
                    <div class="product-title">
                        Core White Brazilian Jiu Jitsu Mens BJJ Gi
                        <div class="product-rating">4.9 <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></div>
                    </div>
                    <div class="product-price-row">
                        <span class="product-price">$49.99</span>
                        <span class="product-price-old">$68.81</span>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="product-card">
                    <div class="product-img-wrap">
                        <img src="{{ asset('images/insta-3.jpg') }}" alt="Kids Black Gi">
                    </div>
                    <div class="product-title">
                        Core Black Brazilian Jiu Jitsu Kids BJJ Gi
                        <div class="product-rating">4.9 <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></div>
                    </div>
                    <div class="product-price-row">
                        <span class="product-price">$35.99</span>
                        <span class="product-price-old">$42.34</span>
                    </div>
                </div>
                
                <!-- Lifestyle Image (Mocking the 4th item which is a group photo in screenshot) -->
                <div class="product-card">
                    <div class="product-img-wrap">
                        <img src="{{ asset('images/insta-1.jpg') }}" alt="Lifestyle image">
                    </div>
                </div>

                <!-- Extra mock products to fill grid -->
                <div class="product-card">
                    <div class="product-img-wrap">
                        <img src="{{ asset('images/gi-navy.jpg') }}" alt="Navy Gi">
                    </div>
                    <div class="product-title">
                        Core Navy Brazilian Jiu Jitsu Mens BJJ Gi
                        <div class="product-rating">4.8 <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></div>
                    </div>
                    <div class="product-price-row">
                        <span class="product-price">$49.99</span>
                        <span class="product-price-old">$68.81</span>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-img-wrap">
                        <img src="{{ asset('images/gi-blue.jpg') }}" alt="Blue Gi">
                    </div>
                    <div class="product-title">
                        Core Blue Brazilian Jiu Jitsu Kids BJJ Gi
                        <div class="product-rating">4.9 <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></div>
                    </div>
                    <div class="product-price-row">
                        <span class="product-price">$35.99</span>
                        <span class="product-price-old">$42.34</span>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    // Simple toggle logic for the stock switch
    const stockToggle = document.getElementById('stock-toggle');
    if (stockToggle) {
        stockToggle.addEventListener('click', function() {
            this.classList.toggle('active');
        });
    }
</script>
@endsection
