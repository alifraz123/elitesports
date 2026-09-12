@extends('layouts.app')
@section('content')
    <!-- Hero Banner -->
    <section class="hero" id="hero-banner">
        <div class="hero-bg">
            <img src="{{ asset('images/hero-banner.jpg') }}" alt="BJJ athletes training with premium gear" loading="eager">
            <div class="hero-gradient"></div>
        </div>

        <div class="hero-content">
            <span class="hero-tag">New Collection 2024</span>
            <h1>Premium BJJ Gear</h1>
            <p>Trusted by BJJ athletes worldwide for premium BJJ Gis, rash guards, No-Gi apparel, and training gear designed for daily rolling and competition.</p>
            <div class="hero-actions">
                <a href="#" class="btn btn-primary" id="shop-gis-btn">Shop BJJ Gis</a>
                <a href="#" class="btn btn-outline" id="shop-nogi-btn">Shop No-Gi</a>
            </div>
        </div>
    </section>

    <!-- Stats Bar -->
    <section class="stats-bar" id="stats-bar">
        <div class="stats-inner">
            <div class="stat-item">
                <div class="stat-number" data-count="1000000" data-format="comma">0</div>
                <div class="stat-label">Athletes Served</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-count="20000" data-suffix="+" data-format="comma">0</div>
                <div class="stat-label">Five Star Reviews</div>
            </div>
            <div class="stat-item">
                <div class="stat-text-highlight">IBJJF</div>
                <div class="stat-label">Approved</div>
            </div>
        </div>
    </section>

    <!-- Product Category Grid -->
    <section class="category-grid" id="category-grid">
        <div class="category-grid-inner">
            <!-- Large card - spans both rows -->
            <div class="category-card category-card--large">
                <img src="{{ asset('images/bjj-gi-category.jpg') }}" alt="World's Best BJJ Gis" loading="lazy">
                <div class="category-card-overlay">
                    <span class="category-card-title">World's Best BJJ Gis</span>
                    <a href="#" class="category-card-btn">Shop</a>
                </div>
            </div>
            <!-- Top right card -->
            <div class="category-card category-card--small">
                <img src="{{ asset('images/rash-guard-category.jpg') }}" alt="Jiu Jitsu Rash Guards" loading="lazy">
                <div class="category-card-overlay">
                    <span class="category-card-title">Jiu Jitsu Rash Guards</span>
                    <a href="#" class="category-card-btn">Shop</a>
                </div>
            </div>
            <!-- Bottom right card -->
            <div class="category-card category-card--small">
                <img src="{{ asset('images/bjj-shorts-category.jpg') }}" alt="BJJ Shorts" loading="lazy">
                <div class="category-card-overlay">
                    <span class="category-card-title">BJJ Shorts</span>
                    <a href="#" class="category-card-btn">Shop</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Built for Brazilian Jiu Jitsu -->
    <section class="about-bjj" id="about-bjj">
        <div class="about-bjj-inner">
            <span class="about-bjj-tag">Since 2015</span>
            <h2>Built for Brazilian Jiu Jitsu</h2>
            <p>Elite Sports was founded in 2015 with one goal: create high-quality Brazilian Jiu Jitsu gear that every athlete could afford. At the time, it was difficult to find a BJJ Gi that was durable, comfortable, IBJJF compliant, and accessible at a fair price. We believed every practitioner — from beginners to competitors — deserved premium BJJ gear built for daily training, hard rolling sessions, and tournament performance.</p>
            <p>What started with a single BJJ Gi has grown into one of the most recognized brands in Brazilian Jiu Jitsu. Today, Elite Sports <a href="#">BJJ Gis</a>, <a href="#">rash guards</a>, <a href="#">belts</a>, and <a href="#">No-Gi</a> apparel are worn by athletes in academies and tournaments across the United States and around the world. Today, Elite Sports offers <a href="#">men's BJJ Gis</a>, <a href="#">women's BJJ Gis</a>, and <a href="#">kids BJJ Gis</a> designed for beginners, daily training, and tournament competition.</p>
        </div>
    </section>

    <!-- Best Selling BJJ Gis -->
    <section class="products-section" id="best-selling-gis">
        <div class="products-inner">
            <div class="products-header">
                <div class="products-header-left">
                    <h2>Best Selling BJJ Gis</h2>
                    <p>Lightweight BJJ Gis for tournaments, training, and everyday rolling</p>
                </div>
                <a href="#" class="view-all-btn">
                    View all
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
            <div class="products-scroll">
                <!-- Product 1 - White -->
                <a href="#" class="product-card">
                    <div class="product-card-img">
                        <img src="{{ asset('images/gi-white.jpg') }}" alt="Core White Brazilian Jiu Jitsu Mens BJJ Gi" loading="lazy">
                    </div>
                    <div class="product-card-info">
                        <div class="product-card-top">
                            <span class="product-card-name">Core White Brazilian Jiu Jitsu Mens BJJ Gi</span>
                            <span class="product-card-rating">4.9 <span class="star">★</span></span>
                        </div>
                        <div class="product-card-prices">
                            <span class="product-card-sale-price">$47.05</span>
                            <span class="product-card-original-price">$58.81</span>
                        </div>
                    </div>
                </a>
                <!-- Product 2 - Black -->
                <a href="#" class="product-card">
                    <div class="product-card-img">
                        <img src="{{ asset('images/gi-black.jpg') }}" alt="Core Black Brazilian Jiu Jitsu Mens BJJ Gi" loading="lazy">
                    </div>
                    <div class="product-card-info">
                        <div class="product-card-top">
                            <span class="product-card-name">Core Black Brazilian Jiu Jitsu Mens BJJ Gi</span>
                            <span class="product-card-rating">4.9 <span class="star">★</span></span>
                        </div>
                        <div class="product-card-prices">
                            <span class="product-card-sale-price">$47.05</span>
                            <span class="product-card-original-price">$58.81</span>
                        </div>
                    </div>
                </a>
                <!-- Product 3 - Blue -->
                <a href="#" class="product-card">
                    <div class="product-card-img">
                        <img src="{{ asset('images/gi-blue.jpg') }}" alt="Core Blue Brazilian Jiu Jitsu Mens BJJ Gi" loading="lazy">
                    </div>
                    <div class="product-card-info">
                        <div class="product-card-top">
                            <span class="product-card-name">Core Blue Brazilian Jiu Jitsu Mens BJJ Gi</span>
                            <span class="product-card-rating">4.9 <span class="star">★</span></span>
                        </div>
                        <div class="product-card-prices">
                            <span class="product-card-sale-price">$47.05</span>
                            <span class="product-card-original-price">$58.81</span>
                        </div>
                    </div>
                </a>
                <!-- Product 4 - Navy -->
                <a href="#" class="product-card">
                    <div class="product-card-img">
                        <img src="{{ asset('images/gi-navy.jpg') }}" alt="Core Navy Brazilian Jiu Jitsu Mens BJJ Gi" loading="lazy">
                    </div>
                    <div class="product-card-info">
                        <div class="product-card-top">
                            <span class="product-card-name">Core Navy Brazilian Jiu Jitsu Mens BJJ Gi</span>
                            <span class="product-card-rating">4.9 <span class="star">★</span></span>
                        </div>
                        <div class="product-card-prices">
                            <span class="product-card-sale-price">$47.05</span>
                            <span class="product-card-original-price">$58.81</span>
                        </div>
                    </div>
                </a>
                <!-- Product 5 - Grey -->
                <a href="#" class="product-card">
                    <div class="product-card-img">
                        <img src="{{ asset('images/gi-grey.jpg') }}" alt="Core Grey Brazilian Jiu Jitsu Mens BJJ Gi" loading="lazy">
                    </div>
                    <div class="product-card-info">
                        <div class="product-card-top">
                            <span class="product-card-name">Core Grey Brazilian Jiu Jitsu Mens BJJ Gi</span>
                            <span class="product-card-rating">4.9 <span class="star">★</span></span>
                        </div>
                        <div class="product-card-prices">
                            <span class="product-card-sale-price">$47.05</span>
                            <span class="product-card-original-price">$58.81</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Material Advantage -->
    <section class="material-section" id="material-advantage">
        <div class="material-inner">
            <div class="material-image-wrap">
                <div class="material-image" id="material-slide-img">
                    <img src="{{ asset('images/pearl-weave-fabric.jpg') }}" alt="Pearl Weave Fabric close-up texture">
                </div>
            </div>
            <div class="material-content">
                <span class="material-tag" id="material-slide-tag">The Material Advantage</span>
                <h2 id="material-slide-title">Pearl Weave Fabric</h2>
                <p id="material-slide-desc">Known for its lightweight feel and long-lasting durability, pearl weave fabric is the gold-standard for modern BJJ Gis. Its breathable construction helps athletes stay comfortable through hard rolling sessions, training, and tournament competition.</p>
                <div class="material-nav">
                    <button class="material-nav-btn" id="material-prev" aria-label="Previous slide">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M19 12H5M12 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button class="material-nav-btn" id="material-next" aria-label="Next slide">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- IBJJF Video Banner -->
    <section class="video-banner" id="ibjjf-video-banner">
        <!-- Animated background image (Ken Burns effect - always visible as base) -->
        <div class="video-banner-animated-bg">
            <img src="{{ asset('images/ibjjf-video-poster.jpg') }}" alt="IBJJF Approved Jiu Jitsu Gis">
        </div>
        <!-- Video overlay (hidden by default, shown when mp4 exists and loads) -->
        <div class="video-banner-media" style="display:none;">
            <video id="ibjjf-video" muted loop playsinline preload="auto">
                <source src="{{ asset('videos/ibjjf-banner.mp4') }}" type="video/mp4">
            </video>
        </div>
        <div class="video-banner-overlay"></div>
        <div class="video-banner-content">
            <h2>IBJJF Approved Jiu Jitsu Gis</h2>
            <a href="#" class="video-banner-btn">Explore Kimonos</a>
        </div>
    </section>

    <!-- Competition-ready Rash Guards Section -->
    @php
        $rashGuards = [
            [
                'name' => 'Standard White Short Sleeve No-Gi Mens BJJ Rash Guard',
                'image' => 'images/rash-guard-white.jpg',
                'rating' => '4.9',
                'sale_price' => '$15.05',
                'orig_price' => '$18.81',
                'link' => '#',
            ],
            [
                'name' => 'Standard Gray Short Sleeve No-Gi Mens BJJ Rash Guard',
                'image' => 'images/rash-guard-gray.jpg',
                'rating' => '4.9',
                'sale_price' => '$15.05',
                'orig_price' => '$18.81',
                'link' => '#',
            ],
            [
                'name' => 'Standard Brown Short Sleeve No-Gi Mens BJJ Rash Guard',
                'image' => 'images/rash-guard-brown.jpg',
                'rating' => '5.0',
                'sale_price' => '$15.05',
                'orig_price' => '$18.81',
                'link' => '#',
            ],
            [
                'name' => 'Standard Purple Short Sleeve No-Gi Mens BJJ Rash Guard',
                'image' => 'images/rash-guard-purple.jpg',
                'rating' => '5.0',
                'sale_price' => '$15.05',
                'orig_price' => '$18.81',
                'link' => '#',
            ],
            [
                'name' => 'Standard Blue Short Sleeve No-Gi Mens BJJ Rash Guard',
                'image' => 'images/rash-guard-blue.jpg',
                'rating' => '4.9',
                'sale_price' => '$15.05',
                'orig_price' => '$18.81',
                'link' => '#',
            ],
            [
                'name' => 'Standard Black Short Sleeve No-Gi Mens BJJ Rash Guard',
                'image' => 'images/rash-guard-black.jpg',
                'rating' => '4.9',
                'sale_price' => '$15.05',
                'orig_price' => '$18.81',
                'link' => '#',
            ],
        ];
    @endphp

    <section class="rashguards-section" id="rashguards-section">
        <div class="rashguards-inner">
            <div class="rashguards-header">
                <p class="rashguards-header-title">Competition-ready rash guards for No-Gi grappling, training, and tournaments.</p>
                <a href="#" class="rashguards-view-all" id="rashguards-view-all">
                    <span>View all</span>
                    <span class="rashguards-arrow-circle" id="rashguards-scroll-btn" title="Next items">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M9 18l6-6-6-6"/>
                        </svg>
                    </span>
                </a>
            </div>

            <div class="rashguards-scroll" id="rashguards-scroll">
                @foreach($rashGuards as $product)
                    <a href="{{ $product['link'] }}" class="rash-card">
                        <div class="rash-card-img">
                            <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" loading="lazy">
                        </div>
                        <div class="rash-card-info">
                            <div class="rash-card-top">
                                <span class="rash-card-name">{{ $product['name'] }}</span>
                                <span class="rash-card-rating">{{ $product['rating'] }} <span class="star">★</span></span>
                            </div>
                            <div class="rash-card-prices">
                                <span class="rash-card-sale-price">{{ $product['sale_price'] }}</span>
                                <span class="rash-card-original-price">{{ $product['orig_price'] }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Conversation Banner -->
    <section class="conversation-banner">
        <div class="conversation-bg">
            <video autoplay muted loop playsinline preload="auto">
                <source src="{{ asset('videos/mckenzie-dern-interview.mp4') }}" type="video/mp4">
                <img src="{{ asset('images/mckenzie-dern-mats.jpg') }}" alt="Mckenzie Dern" loading="lazy">
            </video>
        </div>
        <div class="conversation-overlay"></div>
        <div class="conversation-content">
            <button class="play-btn" aria-label="Play Conversation">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M8 5v14l11-7z"/>
                </svg>
            </button>
            <h3>A Conversation with Mckenzie Dern</h3>
            <p>UFC Fighter & BJJ World Champion</p>
        </div>
    </section>

    <!-- Instagram Section -->
    <section class="instagram-section">
        <div class="instagram-header">
            <h2>Follow us on Instagram</h2>
            <p>Train smarter. Stay connected. Discover what's next in BJJ & MMA.</p>
        </div>
        <div class="instagram-scroll-wrap">
            <div class="instagram-scroll" id="instagram-scroll">
                <!-- Insta 1 -->
                <a href="#" class="insta-card" aria-label="View Instagram Post">
                    <img src="{{ asset('images/insta-1.jpg') }}" alt="Instagram post" loading="lazy">
                </a>
                <!-- Insta 2 (Video) -->
                <a href="#" class="insta-card" aria-label="View Instagram Post">
                    <img src="{{ asset('images/insta-2.jpg') }}" alt="Instagram post" loading="lazy">
                    <svg class="insta-icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17 10.5V7c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v10c0 .55.45 1 1 1h12c.55 0 1-.45 1-1v-3.5l4 4v-11l-4 4z"/>
                    </svg>
                </a>
                <!-- Insta 3 -->
                <a href="#" class="insta-card" aria-label="View Instagram Post">
                    <img src="{{ asset('images/insta-3.jpg') }}" alt="Instagram post" loading="lazy">
                </a>
                <!-- Insta 4 -->
                <a href="#" class="insta-card" aria-label="View Instagram Post">
                    <img src="{{ asset('images/insta-4.jpg') }}" alt="Instagram post" loading="lazy">
                </a>
                <!-- Insta 5 (Carousel) -->
                <a href="#" class="insta-card" aria-label="View Instagram Post">
                    <img src="{{ asset('images/insta-5.jpg') }}" alt="Instagram post" loading="lazy">
                    <svg class="insta-icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M22 4h-2V2h-2v2H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-2h2v-2h-2v-2h2v-2h-2V8h2V6h-2V4zm-4 16H4V6h14v14zM20 18h2v-2h-2v2zm0-4h2v-2h-2v2zm0-4h2V8h-2v2z"/>
                    </svg>
                </a>
                <!-- Insta 6 -->
                <a href="#" class="insta-card" aria-label="View Instagram Post">
                    <img src="{{ asset('images/insta-1.jpg') }}" alt="Instagram post" loading="lazy">
                </a>
                <!-- Insta 7 (Video) -->
                <a href="#" class="insta-card" aria-label="View Instagram Post">
                    <img src="{{ asset('images/insta-2.jpg') }}" alt="Instagram post" loading="lazy">
                    <svg class="insta-icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17 10.5V7c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v10c0 .55.45 1 1 1h12c.55 0 1-.45 1-1v-3.5l4 4v-11l-4 4z"/>
                    </svg>
                </a>
                <!-- Insta 8 -->
                <a href="#" class="insta-card" aria-label="View Instagram Post">
                    <img src="{{ asset('images/insta-3.jpg') }}" alt="Instagram post" loading="lazy">
                </a>
                <!-- Insta 9 -->
                <a href="#" class="insta-card" aria-label="View Instagram Post">
                    <img src="{{ asset('images/insta-4.jpg') }}" alt="Instagram post" loading="lazy">
                </a>
                <!-- Insta 10 (Carousel) -->
                <a href="#" class="insta-card" aria-label="View Instagram Post">
                    <img src="{{ asset('images/insta-5.jpg') }}" alt="Instagram post" loading="lazy">
                    <svg class="insta-icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M22 4h-2V2h-2v2H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-2h2v-2h-2v-2h2v-2h-2V8h2V6h-2V4zm-4 16H4V6h14v14zM20 18h2v-2h-2v2zm0-4h2v-2h-2v2zm0-4h2V8h-2v2z"/>
                    </svg>
                </a>
            </div>
            <button class="instagram-prev-btn" id="instagram-prev-btn" aria-label="Previous Instagram Posts">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M15 18l-6-6 6-6"/>
                </svg>
            </button>
            <button class="instagram-next-btn" id="instagram-next-btn" aria-label="Next Instagram Posts">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 18l6-6-6-6"/>
                </svg>
            </button>
        </div>
    </section>

@endsection
