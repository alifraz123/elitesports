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
        position: sticky;
        top: 30px;
        max-height: calc(100vh - 60px);
        overflow-y: auto;
    }
    
    .shop-sidebar::-webkit-scrollbar {
        width: 4px;
    }
    .shop-sidebar::-webkit-scrollbar-thumb {
        background: #333;
        border-radius: 4px;
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
        position: relative;
    }
    .checkbox-item input:checked + .checkbox-box {
        background: #222;
        border: 1px solid #444;
    }
    .checkbox-item input:checked + .checkbox-box::after {
        content: '';
        position: absolute;
        left: 5px;
        top: 2px;
        width: 5px;
        height: 10px;
        border: solid #fff;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }

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
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 30px;
        padding-bottom: 15px;
    }

    .active-filters-bar {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        align-items: center;
    }

    .filter-chip {
        background: #222;
        color: #fff;
        font-size: 0.9rem;
        font-weight: 600;
        padding: 8px 14px;
        border-radius: 4px;
        display: flex;
        align-items: center;
        cursor: pointer;
        transition: background 0.2s;
    }

    .filter-chip:hover {
        background: #333;
    }

    .filter-chip svg {
        width: 14px;
        height: 14px;
        margin-left: 10px;
        stroke-width: 2.5;
    }

    .clear-all {
        color: #bbb;
        font-size: 0.9rem;
        text-decoration: underline;
        margin-left: 10px;
        cursor: pointer;
        transition: color 0.2s;
    }

    .clear-all:hover {
        color: #fff;
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

    /* Hover Quick Add UI */
    .quick-add-btn-wrap {
        position: absolute;
        bottom: 15px;
        right: 15px;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease;
        z-index: 2;
    }
    
    .quick-add-btn {
        background: #f5b800;
        color: #000;
        font-weight: 800;
        font-size: 0.85rem;
        padding: 8px 16px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .feature-badge-wrap {
        position: absolute;
        bottom: 15px;
        left: 15px;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease;
        z-index: 2;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .feature-badge-circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: 2px solid #000;
        background: #fff;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .feature-badge-circle img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: static;
    }

    .feature-badge-text {
        color: #fff;
        font-size: 0.85rem;
        font-weight: 800;
        line-height: 1.1;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.8);
    }
    
    .feature-badge-text span {
        display: block;
        font-size: 0.65rem;
        font-weight: 400;
        color: #ccc;
    }

    .product-card:hover .quick-add-btn-wrap,
    .product-card:hover .feature-badge-wrap {
        opacity: 1;
        transform: translateY(0);
    }

    /* Quick View Modal */
    .quick-view-overlay {
        position: fixed;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0,0,0,0.8);
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        transition: 0.3s;
    }
    .quick-view-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    .quick-view-modal {
        background: #000;
        width: 850px;
        max-width: 95%;
        height: 550px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        border-radius: 8px;
        overflow: hidden;
        position: relative;
        transform: scale(0.95);
        transition: 0.3s;
    }
    .quick-view-overlay.active .quick-view-modal {
        transform: scale(1);
    }

    .qv-close {
        position: absolute;
        top: 15px;
        right: 15px;
        color: #fff;
        cursor: pointer;
        z-index: 10;
        background: rgba(0,0,0,0.5);
        border-radius: 50%;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .qv-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .qv-content {
        padding: 30px;
        display: flex;
        flex-direction: column;
        color: #fff;
        overflow-y: auto;
    }

    /* State 1 */
    .qv-state-1 { display: flex; flex-direction: column; height: 100%; }
    .qv-state-2 { display: none; flex-direction: column; height: 100%; }
    
    .qv-header {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
    }
    .qv-thumb {
        width: 80px;
        height: 80px;
        border-radius: 4px;
        object-fit: cover;
    }
    .qv-title { font-weight: 700; font-size: 1.1rem; line-height: 1.3; margin-bottom: 8px; }
    .qv-price { color: #f5b800; font-weight: 700; }
    .qv-price-old { color: #666; text-decoration: line-through; font-size: 0.9rem; margin-left: 5px; }
    
    .qv-reviews {
        display: flex;
        align-items: center;
        color: #fff;
        font-size: 0.85rem;
        margin-top: 10px;
    }
    .qv-reviews svg { width: 14px; height: 14px; color: #f5b800; fill: currentColor; margin-right: 2px;}
    
    .qv-size-selector {
        margin-top: 20px;
    }
    .qv-size-title { margin-bottom: 10px; font-size: 0.9rem; color: #aaa;}
    .qv-size-boxes {
        display: flex;
        gap: 10px;
    }
    .qv-size-box {
        width: 45px;
        height: 40px;
        border: 1px solid #333;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-weight: 600;
        border-radius: 4px;
        transition: 0.2s;
    }
    .qv-size-box:hover, .qv-size-box.active {
        border-color: #fff;
        background: #111;
    }
    
    .qv-add-btn {
        background: #222;
        color: #fff;
        border: none;
        padding: 15px;
        text-align: center;
        font-weight: 700;
        margin-top: auto;
        border-radius: 4px;
        cursor: pointer;
        transition: background 0.2s;
    }
    .qv-add-btn:hover { background: #333; }

    /* State 2 */
    .qv-success-banner {
        background: #e6f4ea;
        color: #137333;
        padding: 15px;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        margin-bottom: 20px;
        font-size: 0.95rem;
    }
    .qv-success-banner svg {
        width: 18px; height: 18px; margin-right: 8px; fill: #137333;
    }
    
    .qv-selected-size { color: #888; font-size: 0.9rem; margin-top: 5px; text-transform: uppercase;}

    .qv-checkout-plus {
        margin-top: auto;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        border-top: 1px solid #222;
        padding-top: 20px;
        margin-bottom: 15px;
    }
    .qv-cp-left { display: flex; align-items: flex-start; gap: 8px;}
    .qv-cp-title { font-weight: 700; font-size: 0.95rem; display: flex; align-items: center;}
    .qv-cp-desc { color: #888; font-size: 0.8rem; margin-top:2px;}
    .qv-cp-price { font-weight: 700; font-size: 0.9rem;}

    .qv-checkout-btn {
        background: #f5b800;
        color: #000;
        font-weight: 800;
        padding: 15px;
        text-align: center;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom: 10px;
        font-size: 1.05rem;
        text-decoration: none;
        display: block;
        box-sizing: border-box;
    }
    .qv-checkout-link {
        color: #ccc;
        text-align: center;
        display: block;
        font-size: 0.85rem;
        text-decoration: underline;
        cursor: pointer;
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
            <div class="filter-group">
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
            <div class="filter-group">
                <div class="filter-group-header" onclick="this.parentElement.classList.toggle('expanded')">
                    Product type
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 15l-6-6-6 6"/>
                    </svg>
                </div>
                <div class="filter-group-content">
                    <div class="checkbox-list">
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> <span>Adults BJJ Belt (5)</span></label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> <span>BJJ Grappling Dummy (2)</span></label>
                        <label class="checkbox-item"><input type="checkbox" checked><div class="checkbox-box"></div> <span style="color:#fff;">BJJ NO-GI Shorts (4)</span></label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> <span>Kids BJJ Belt (13)</span></label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> <span>Kids Bjj Gis (11)</span></label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> <span>Kids Bjj NO-GI Shorts (4)</span></label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> <span>Long Sleeve Rash Guards (20)</span></label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> <span>Mens Bjj Gis (13)</span></label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> <span>Short Sleeve Rash Guards (20)</span></label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> <span>Womens Bjj Gis (5)</span></label>
                    </div>
                </div>
            </div>

            <!-- Size -->
            <div class="filter-group">
                <div class="filter-group-header" onclick="this.parentElement.classList.toggle('expanded')">
                    Size
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 15l-6-6-6 6"/>
                    </svg>
                </div>
                <div class="filter-group-content">
                    <div class="checkbox-list">
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> <span>XS (10)</span></label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> <span>S (48)</span></label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> <span>M (48)</span></label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> <span>L (47)</span></label>
                        <label class="checkbox-item"><input type="checkbox" checked><div class="checkbox-box"></div> <span style="color:#fff;">XL (44)</span></label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> <span>2XL (41)</span></label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> <span>3XL (31)</span></label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> <span>0 (7)</span></label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> <span>00 (7)</span></label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> <span>1 (11)</span></label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> <span>2 (11)</span></label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> <span>3 (11)</span></label>
                        <label class="checkbox-item"><input type="checkbox"><div class="checkbox-box"></div> <span>A1 (14)</span></label>
                    </div>
                </div>
            </div>

            <!-- Color -->
            <div class="filter-group">
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
                <div class="active-filters-bar">
                    <div class="filter-chip">In stock <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M18 6L6 18M6 6l12 12"/></svg></div>
                    <div class="filter-chip">$1 - $100 <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M18 6L6 18M6 6l12 12"/></svg></div>
                    <div class="filter-chip">BJJ NO-GI Shorts <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M18 6L6 18M6 6l12 12"/></svg></div>
                    <div class="filter-chip">XL <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M18 6L6 18M6 6l12 12"/></svg></div>
                    <div class="filter-chip">Blue <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M18 6L6 18M6 6l12 12"/></svg></div>
                    <a href="#" class="clear-all">Clear all</a>
                </div>
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
                        <div class="feature-badge-wrap">
                            <div class="feature-badge-circle">
                                <img src="{{ asset('images/pearl-weave-fabric.jpg') }}" alt="Feature">
                            </div>
                            <div class="feature-badge-text">STRIPE BAR FEATURE<br><span>Dedicated black bar to show off your stripes</span></div>
                        </div>
                        <div class="quick-add-btn-wrap">
                            <button class="quick-add-btn" data-title="Core Black Brazilian Jiu Jitsu Mens BJJ Gi" data-price="$49.99" data-old="$68.81" data-img="{{ asset('images/gi-black.jpg') }}">+ Quick add</button>
                        </div>
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
                        <div class="quick-add-btn-wrap">
                            <button class="quick-add-btn" data-title="Core White Brazilian Jiu Jitsu Mens BJJ Gi" data-price="$49.99" data-old="$68.81" data-img="{{ asset('images/gi-white.jpg') }}">+ Quick add</button>
                        </div>
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
                        <div class="feature-badge-wrap">
                            <div class="feature-badge-circle">
                                <img src="{{ asset('images/pearl-weave-fabric.jpg') }}" alt="Feature">
                            </div>
                            <div class="feature-badge-text">REINFORCED STITCHING<br><span>Extra durable</span></div>
                        </div>
                        <div class="quick-add-btn-wrap">
                            <button class="quick-add-btn" data-title="Core Black Brazilian Jiu Jitsu Kids BJJ Gi" data-price="$35.99" data-old="$42.34" data-img="{{ asset('images/insta-3.jpg') }}">+ Quick add</button>
                        </div>
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

<!-- Quick View Modal -->
<div class="quick-view-overlay" id="qv-overlay">
    <div class="quick-view-modal">
        <div class="qv-close" id="qv-close">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </div>
        
        <div class="qv-left">
            <img src="" alt="Product" class="qv-image" id="qv-main-img">
        </div>
        
        <div class="qv-content">
            <!-- State 1: Add to cart -->
            <div class="qv-state-1" id="qv-state-1">
                <div class="qv-header">
                    <img src="" alt="Thumb" class="qv-thumb" id="qv-thumb-img">
                    <div>
                        <div class="qv-title" id="qv-title">Product Title</div>
                        <div>
                            <span class="qv-price" id="qv-price">$0.00</span>
                            <span class="qv-price-old" id="qv-old-price">$0.00</span>
                        </div>
                        <div class="qv-reviews">
                            <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                            <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                            <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                            <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                            <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                            <span style="margin-left: 5px;">19 reviews</span>
                        </div>
                    </div>
                </div>
                
                <div class="qv-size-selector">
                    <div class="qv-size-title">Size: <span id="qv-size-display" style="color:#fff; font-weight:700;">C0</span></div>
                    <div class="qv-size-boxes">
                        <div class="qv-size-box active">C0</div>
                        <div class="qv-size-box">C1</div>
                        <div class="qv-size-box">C2</div>
                        <div class="qv-size-box">C3</div>
                    </div>
                </div>
                
                <button class="qv-add-btn" id="qv-add-to-cart">Add to cart</button>
            </div>
            
            <!-- State 2: Success / Checkout -->
            <div class="qv-state-2" id="qv-state-2">
                <div class="qv-success-banner">
                    <svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                    Added to your cart!
                </div>
                
                <div class="qv-header" style="margin-bottom: 0;">
                    <img src="" alt="Thumb" class="qv-thumb" id="qv-success-thumb">
                    <div>
                        <div class="qv-title" id="qv-success-title">Product Title</div>
                        <div class="qv-price" id="qv-success-price">$0.00</div>
                        <div class="qv-selected-size" id="qv-success-size">C0</div>
                    </div>
                </div>
                
                <div class="qv-checkout-plus">
                    <div class="qv-cp-left">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="#fff" stroke-width="2">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            <path d="M9 12l2 2 4-4"/>
                        </svg>
                        <div>
                            <div class="qv-cp-title">Checkout+ <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="#888" style="margin-left:5px;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg></div>
                            <div class="qv-cp-desc">Free returns on your order</div>
                        </div>
                    </div>
                    <div class="qv-cp-price">$0.98</div>
                </div>
                
                <a href="{{ route('checkout') }}" class="qv-checkout-btn">CHECKOUT+</a>
                <div class="qv-checkout-link">Checkout without free returns</div>
            </div>
        </div>
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

    // Quick View Modal Logic
    const qvOverlay = document.getElementById('qv-overlay');
    const qvClose = document.getElementById('qv-close');
    const state1 = document.getElementById('qv-state-1');
    const state2 = document.getElementById('qv-state-2');
    
    // Elements to populate
    const mainImg = document.getElementById('qv-main-img');
    const thumbImg = document.getElementById('qv-thumb-img');
    const titleEl = document.getElementById('qv-title');
    const priceEl = document.getElementById('qv-price');
    const oldPriceEl = document.getElementById('qv-old-price');
    
    const successThumb = document.getElementById('qv-success-thumb');
    const successTitle = document.getElementById('qv-success-title');
    const successPrice = document.getElementById('qv-success-price');
    
    document.querySelectorAll('.quick-add-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            // Get data
            const title = this.getAttribute('data-title');
            const price = this.getAttribute('data-price');
            const oldPrice = this.getAttribute('data-old');
            const img = this.getAttribute('data-img');
            
            // Populate modal
            mainImg.src = img;
            thumbImg.src = img;
            successThumb.src = img;
            titleEl.textContent = title;
            successTitle.textContent = title;
            priceEl.textContent = price;
            successPrice.textContent = price;
            oldPriceEl.textContent = oldPrice;
            
            // Reset state
            state1.style.display = 'flex';
            state2.style.display = 'none';
            
            // Show modal
            qvOverlay.classList.add('active');
        });
    });
    
    // Close modal
    if(qvClose) {
        qvClose.addEventListener('click', () => qvOverlay.classList.remove('active'));
    }
    if(qvOverlay) {
        qvOverlay.addEventListener('click', (e) => {
            if(e.target === qvOverlay) qvOverlay.classList.remove('active');
        });
    }
    
    // Size Selection
    const sizeBoxes = document.querySelectorAll('.qv-size-box');
    const sizeDisplay = document.getElementById('qv-size-display');
    const successSize = document.getElementById('qv-success-size');
    
    sizeBoxes.forEach(box => {
        box.addEventListener('click', function() {
            sizeBoxes.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const size = this.textContent;
            sizeDisplay.textContent = size;
            successSize.textContent = size;
        });
    });
    
    // Add to cart transition
    const addToCartBtn = document.getElementById('qv-add-to-cart');
    if(addToCartBtn) {
        addToCartBtn.addEventListener('click', () => {
            state1.style.display = 'none';
            state2.style.display = 'flex';
        });
    }
</script>
@endsection
