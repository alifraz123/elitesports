<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Premium BJJ Gis, Rash Guards, No-Gi Apparel & Training Gear. Trusted by athletes worldwide for daily rolling and competition.">

    <title>Elite Sports — Premium BJJ Gear</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        /* ===== RESET & BASE ===== */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #000;
            color: #fff;
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: color 0.2s ease;
        }

        ul {
            list-style: none;
        }

        /* ===== YELLOW ACCENT BAR ===== */
        .accent-bar {
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #e8a200, #f5b800, #ffc929, #f5b800, #e8a200);
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: #000;
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        }

        .navbar-inner {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
            height: 64px;
        }

        /* Nav left - menu items */
        .nav-left {
            display: flex;
            align-items: center;
            gap: 4px;
            flex: 1;
        }

        .nav-item {
            position: relative;
        }

        .nav-item > a {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 20px 16px;
            font-size: 14px;
            font-weight: 500;
            color: #fff;
            text-transform: capitalize;
            letter-spacing: 0.3px;
            transition: color 0.2s ease;
            white-space: nowrap;
        }

        .nav-item > a:hover {
            color: #f5b800;
        }

        .nav-item > a .chevron {
            width: 10px;
            height: 10px;
            transition: transform 0.25s ease;
        }

        .nav-item:hover > a .chevron {
            transform: rotate(180deg);
        }

        /* Nav center - logo */
        .nav-center {
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 auto;
            padding: 0 40px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 2px;
        }

        .logo-text {
            font-size: 32px;
            font-weight: 900;
            color: #f5b800;
            letter-spacing: 4px;
            text-transform: uppercase;
            font-style: italic;
            line-height: 1;
        }

        .logo-icon {
            width: 36px;
            height: 36px;
        }

        /* Nav right - utility icons */
        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
            flex: 1;
            justify-content: flex-end;
        }

        .nav-icon-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: transparent;
            border: none;
            cursor: pointer;
            transition: background 0.2s ease;
            color: #fff;
        }

        .nav-icon-btn:hover {
            background: rgba(255, 255, 255, 0.08);
        }

        .nav-icon-btn svg {
            width: 22px;
            height: 22px;
            stroke: currentColor;
            fill: none;
            stroke-width: 1.8;
        }

        .cart-btn {
            position: relative;
        }

        .cart-badge {
            position: absolute;
            top: 2px;
            right: 2px;
            width: 16px;
            height: 16px;
            background: #f5b800;
            color: #000;
            font-size: 10px;
            font-weight: 700;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ===== DROPDOWN MENUS ===== */
        .dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 260px;
            background: #111;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-top: 2px solid #f5b800;
            border-radius: 0 0 8px 8px;
            padding: 16px 0;
            opacity: 0;
            visibility: hidden;
            transform: translateY(8px);
            transition: all 0.25s ease;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }

        .nav-item:hover .dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-header {
            padding: 6px 24px 10px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #f5b800;
        }

        .dropdown a {
            display: flex;
            align-items: center;
            padding: 10px 24px;
            font-size: 14px;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.8);
            transition: all 0.2s ease;
        }

        .dropdown a:hover {
            color: #fff;
            background: rgba(245, 184, 0, 0.08);
            padding-left: 30px;
        }

        .dropdown-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.06);
            margin: 8px 24px;
        }

        .dropdown a .arrow {
            margin-left: auto;
            opacity: 0;
            transform: translateX(-8px);
            transition: all 0.2s ease;
            width: 14px;
            height: 14px;
        }

        .dropdown a:hover .arrow {
            opacity: 1;
            transform: translateX(0);
        }

        /* ===== MEGA DROPDOWN ===== */
        .mega-dropdown {
            position: absolute;
            top: 100%;
            left: -100px;
            min-width: 600px;
            background: #111;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-top: 2px solid #f5b800;
            border-radius: 0 0 8px 8px;
            padding: 24px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(8px);
            transition: all 0.25s ease;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 8px;
        }

        .nav-item:hover .mega-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .mega-col-header {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #f5b800;
            padding: 6px 12px 10px;
        }

        .mega-dropdown a {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            font-size: 13px;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.8);
            border-radius: 4px;
            transition: all 0.2s ease;
        }

        .mega-dropdown a:hover {
            color: #fff;
            background: rgba(245, 184, 0, 0.08);
        }

        /* ===== HERO BANNER ===== */
        .hero {
            position: relative;
            width: 100%;
            min-height: 80vh;
            display: flex;
            align-items: flex-end;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            z-index: 0;
        }

        .hero-bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center 30%;
        }

        .hero-gradient {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to top,
                rgba(0, 0, 0, 0.85) 0%,
                rgba(0, 0, 0, 0.5) 30%,
                rgba(0, 0, 0, 0.1) 60%,
                rgba(0, 0, 0, 0) 100%
            );
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 1400px;
            margin: 0 auto;
            padding: 60px 40px 50px;
            width: 100%;
        }

        .hero-tag {
            display: inline-block;
            padding: 4px 14px;
            background: rgba(245, 184, 0, 0.15);
            border: 1px solid rgba(245, 184, 0, 0.3);
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: #f5b800;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            margin-bottom: 16px;
            backdrop-filter: blur(10px);
        }

        .hero h1 {
            font-size: clamp(2rem, 5vw, 3.2rem);
            font-weight: 800;
            color: #fff;
            line-height: 1.15;
            margin-bottom: 16px;
            text-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
        }

        .hero p {
            font-size: 15px;
            color: rgba(255, 255, 255, 0.8);
            max-width: 620px;
            line-height: 1.7;
            margin-bottom: 28px;
            text-shadow: 0 1px 10px rgba(0, 0, 0, 0.2);
        }

        .hero-actions {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        /* ===== BUTTONS ===== */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 14px 30px;
            font-size: 14px;
            font-weight: 700;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            text-transform: capitalize;
            letter-spacing: 0.3px;
        }

        .btn-primary {
            background: #f5b800;
            color: #000;
            border-color: #f5b800;
        }

        .btn-primary:hover {
            background: #ffcc33;
            border-color: #ffcc33;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(245, 184, 0, 0.3);
        }

        .btn-outline {
            background: transparent;
            color: #fff;
            border-color: rgba(255, 255, 255, 0.5);
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 255, 255, 0.1);
        }

        /* ===== HELP BUTTON ===== */
        .help-btn {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 999;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 22px;
            background: #f5b800;
            border: none;
            border-radius: 50px;
            color: #000;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(245, 184, 0, 0.35);
        }

        .help-btn:hover {
            background: #ffcc33;
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(245, 184, 0, 0.45);
        }

        .help-btn svg {
            width: 18px;
            height: 18px;
            stroke: #000;
        }

        /* ===== MOBILE HAMBURGER ===== */
        .mobile-toggle {
            display: none;
            width: 40px;
            height: 40px;
            align-items: center;
            justify-content: center;
            background: transparent;
            border: none;
            cursor: pointer;
            color: #fff;
        }

        .mobile-toggle svg {
            width: 24px;
            height: 24px;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1024px) {
            .nav-item > a {
                padding: 20px 10px;
                font-size: 13px;
            }
            .nav-center {
                padding: 0 20px;
            }
            .mega-dropdown {
                min-width: 480px;
                left: -50px;
            }
        }

        @media (max-width: 768px) {
            .mobile-toggle {
                display: flex;
            }

            .nav-left {
                display: none;
                position: fixed;
                top: 68px;
                left: 0;
                right: 0;
                bottom: 0;
                background: #111;
                flex-direction: column;
                gap: 0;
                padding: 16px 0;
                overflow-y: auto;
                z-index: 999;
            }

            .nav-left.active {
                display: flex;
            }

            .nav-item > a {
                padding: 16px 24px;
                font-size: 15px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            }

            .dropdown, .mega-dropdown {
                position: static;
                min-width: 100%;
                opacity: 1;
                visibility: visible;
                transform: none;
                border: none;
                border-top: none;
                border-radius: 0;
                padding: 0 0 8px;
                box-shadow: none;
                display: none;
                grid-template-columns: 1fr;
                background: #0a0a0a;
            }

            .nav-item:hover .dropdown,
            .nav-item:hover .mega-dropdown {
                display: block;
            }

            .navbar-inner {
                height: 60px;
            }

            .hero {
                min-height: 60vh;
            }

            .hero-content {
                padding: 40px 20px 36px;
            }

            .hero h1 {
                font-size: 1.8rem;
            }

            .logo-text {
                font-size: 24px;
            }
        }

        /* ===== STATS BAR ===== */
        .stats-bar {
            background: #0a0a0a;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            padding: 40px 24px;
        }

        .stats-inner {
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-item {
            flex: 1;
            text-align: center;
            padding: 10px 20px;
            position: relative;
        }

        .stat-item:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 1px;
            height: 50px;
            background: rgba(255, 255, 255, 0.12);
        }

        .stat-number {
            font-size: clamp(1.8rem, 3.5vw, 2.6rem);
            font-weight: 800;
            color: #fff;
            line-height: 1.2;
            letter-spacing: -0.5px;
        }

        .stat-number .stat-suffix {
            color: #f5b800;
        }

        .stat-label {
            font-size: 13px;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.5);
            text-transform: capitalize;
            letter-spacing: 0.3px;
            margin-top: 4px;
        }

        .stat-text-highlight {
            font-size: clamp(1.8rem, 3.5vw, 2.6rem);
            font-weight: 800;
            color: #f5b800;
            line-height: 1.2;
            letter-spacing: 1px;
        }

        /* Stat fade-in animation */
        .stat-item {
            opacity: 0;
            transform: translateY(15px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .stat-item.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .stat-item:nth-child(1) { transition-delay: 0.1s; }
        .stat-item:nth-child(2) { transition-delay: 0.25s; }
        .stat-item:nth-child(3) { transition-delay: 0.4s; }

        /* ===== PRODUCT CATEGORY GRID ===== */
        .category-grid {
            max-width: 1200px;
            margin: 0 auto;
            padding: 50px 24px 60px;
        }

        .category-grid-inner {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: auto auto;
            gap: 16px;
        }

        .category-card {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
            background: #111;
        }

        .category-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease, filter 0.5s ease;
        }

        .category-card:hover img {
            transform: scale(1.05);
            filter: brightness(0.7);
        }

        .category-card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.35) 0%, rgba(0,0,0,0.1) 40%, rgba(0,0,0,0.3) 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding-top: 30px;
            gap: 12px;
            z-index: 1;
        }

        .category-card-title {
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            text-transform: capitalize;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 8px rgba(0,0,0,0.5);
        }

        .category-card-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 7px 22px;
            background: #f5b800;
            color: #000;
            font-size: 12px;
            font-weight: 700;
            border-radius: 4px;
            text-transform: capitalize;
            letter-spacing: 0.3px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .category-card-btn:hover {
            background: #ffcc33;
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(245, 184, 0, 0.3);
        }

        /* Large card spans both rows on the left */
        .category-card--large {
            grid-row: 1 / 3;
        }

        .category-card--large img {
            min-height: 420px;
        }

        .category-card--small img {
            min-height: 200px;
        }

        @media (max-width: 768px) {
            .stats-inner {
                flex-direction: column;
                gap: 24px;
            }

            .stat-item:not(:last-child)::after {
                width: 60px;
                height: 1px;
                right: auto;
                bottom: -12px;
                top: auto;
                left: 50%;
                transform: translateX(-50%);
            }

            .category-grid-inner {
                grid-template-columns: 1fr;
            }

            .category-card--large {
                grid-row: auto;
            }

            .category-card--large img,
            .category-card--small img {
                min-height: 220px;
            }
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-content > * {
            animation: fadeInUp 0.6s ease forwards;
        }

        .hero-content > *:nth-child(1) { animation-delay: 0.1s; }
        .hero-content > *:nth-child(2) { animation-delay: 0.2s; }
        .hero-content > *:nth-child(3) { animation-delay: 0.3s; }
        .hero-content > *:nth-child(4) { animation-delay: 0.4s; }

        /* ===== ABOUT / BUILT FOR BJJ SECTION ===== */
        .about-bjj {
            background: #000;
            padding: 70px 24px 80px;
            text-align: center;
        }

        .about-bjj-inner {
            max-width: 960px;
            margin: 0 auto;
        }

        .about-bjj-tag {
            display: inline-block;
            font-size: 14px;
            font-weight: 700;
            color: #f5b800;
            text-transform: capitalize;
            letter-spacing: 0.5px;
            margin-bottom: 16px;
        }

        .about-bjj h2 {
            font-size: clamp(1.6rem, 4vw, 2.4rem);
            font-weight: 800;
            color: #fff;
            font-style: italic;
            line-height: 1.25;
            margin-bottom: 28px;
            letter-spacing: -0.3px;
        }

        .about-bjj p {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.65);
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .about-bjj p:last-child {
            margin-bottom: 0;
        }

        .about-bjj a {
            color: #fff;
            text-decoration: underline;
            text-underline-offset: 3px;
            text-decoration-color: rgba(255, 255, 255, 0.4);
            transition: color 0.2s ease, text-decoration-color 0.2s ease;
        }

        .about-bjj a:hover {
            color: #f5b800;
            text-decoration-color: #f5b800;
        }

        /* Fade-in on scroll for about section */
        .about-bjj-inner > * {
            opacity: 0;
            transform: translateY(18px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .about-bjj-inner.visible > * {
            opacity: 1;
            transform: translateY(0);
        }

        .about-bjj-inner.visible > *:nth-child(1) { transition-delay: 0.05s; }
        .about-bjj-inner.visible > *:nth-child(2) { transition-delay: 0.15s; }
        .about-bjj-inner.visible > *:nth-child(3) { transition-delay: 0.25s; }
        .about-bjj-inner.visible > *:nth-child(4) { transition-delay: 0.35s; }

        /* ===== BEST SELLING PRODUCTS SECTION ===== */
        .products-section {
            background: #000;
            padding: 60px 24px 70px;
        }

        .products-inner {
            max-width: 1400px;
            margin: 0 auto;
        }

        .products-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 32px;
            gap: 20px;
        }

        .products-header-left h2 {
            font-size: clamp(1.5rem, 3.5vw, 2rem);
            font-weight: 800;
            color: #fff;
            font-style: italic;
            line-height: 1.2;
            margin-bottom: 8px;
        }

        .products-header-left p {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.5);
            line-height: 1.5;
        }

        .view-all-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 50px;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
            text-decoration: none;
            flex-shrink: 0;
        }

        .view-all-btn:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateX(3px);
        }

        .view-all-btn svg {
            width: 16px;
            height: 16px;
            transition: transform 0.3s ease;
        }

        .view-all-btn:hover svg {
            transform: translateX(3px);
        }

        /* Product cards scroll container */
        .products-scroll {
            display: flex;
            gap: 18px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding-bottom: 12px;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .products-scroll::-webkit-scrollbar {
            display: none;
        }

        .product-card {
            flex: 0 0 280px;
            background: transparent;
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-4px);
        }

        .product-card-img {
            position: relative;
            width: 100%;
            aspect-ratio: 3/4;
            overflow: hidden;
            border-radius: 10px;
            background: #111;
        }

        .product-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-card-img img {
            transform: scale(1.05);
        }

        .product-card-info {
            padding: 14px 4px 8px;
        }

        .product-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 6px;
        }

        .product-card-name {
            font-size: 13px;
            font-weight: 600;
            color: #fff;
            line-height: 1.4;
            flex: 1;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-card-rating {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 12px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.7);
            flex-shrink: 0;
        }

        .product-card-rating .star {
            color: #f5b800;
            font-size: 13px;
        }

        .product-card-prices {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .product-card-sale-price {
            font-size: 15px;
            font-weight: 700;
            color: #f5b800;
        }

        .product-card-original-price {
            font-size: 13px;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.35);
            text-decoration: line-through;
        }

        @media (max-width: 768px) {
            .products-header {
                flex-direction: column;
                gap: 12px;
            }

            .product-card {
                flex: 0 0 220px;
            }
        }

        /* ===== MATERIAL ADVANTAGE SECTION ===== */
        .material-section {
            background: #000;
            padding: 80px 24px 90px;
            overflow: hidden;
        }

        .material-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .material-image-wrap {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .material-image-wrap::before {
            content: '';
            position: absolute;
            width: 70%;
            height: 70%;
            background: radial-gradient(circle, rgba(245, 184, 0, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 0;
            filter: blur(40px);
        }

        .material-image {
            position: relative;
            z-index: 1;
            width: 85%;
            max-width: 400px;
            border-radius: 14px;
            overflow: hidden;
            transform: rotate(-6deg);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(255, 255, 255, 0.06);
            transition: transform 0.5s ease;
        }

        .material-image:hover {
            transform: rotate(-3deg) scale(1.03);
        }

        .material-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .material-content {
            padding: 20px 0;
        }

        .material-tag {
            display: inline-block;
            font-size: 14px;
            font-weight: 700;
            color: #f5b800;
            letter-spacing: 0.3px;
            margin-bottom: 16px;
        }

        .material-content h2 {
            font-size: clamp(1.8rem, 4vw, 2.6rem);
            font-weight: 800;
            color: #fff;
            font-style: italic;
            line-height: 1.2;
            margin-bottom: 24px;
            letter-spacing: -0.3px;
        }

        .material-content p {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.6);
            line-height: 1.85;
            max-width: 520px;
        }

        .material-nav {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 32px;
        }

        .material-nav-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.2);
            background: transparent;
            color: rgba(255, 255, 255, 0.6);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .material-nav-btn:hover {
            border-color: rgba(255, 255, 255, 0.5);
            color: #fff;
            background: rgba(255, 255, 255, 0.06);
        }

        .material-nav-btn svg {
            width: 18px;
            height: 18px;
        }

        @media (max-width: 768px) {
            .material-inner {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .material-image-wrap {
                order: -1;
            }

            .material-image {
                width: 70%;
                transform: rotate(-4deg);
            }

            .material-content {
                text-align: center;
            }

            .material-content p {
                max-width: 100%;
            }

            .material-nav {
                justify-content: center;
            }
        }

        /* ===== VIDEO BANNER SECTION ===== */
        .video-banner {
            position: relative;
            width: 100%;
            height: 50vh;
            min-height: 340px;
            max-height: 500px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .video-banner-media {
            position: absolute;
            inset: 0;
            z-index: 0;
        }

        .video-banner-media video,
        .video-banner-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Ken Burns slow zoom animation on the image */
        @keyframes kenBurns {
            0% {
                transform: scale(1) translate(0, 0);
            }
            50% {
                transform: scale(1.15) translate(-2%, -1%);
            }
            100% {
                transform: scale(1) translate(0, 0);
            }
        }

        .video-banner-animated-bg {
            position: absolute;
            inset: -5%;
            z-index: 0;
            animation: kenBurns 20s ease-in-out infinite;
        }

        .video-banner-animated-bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* When real video is playing, hide the animated bg */
        .video-banner.video-playing .video-banner-animated-bg {
            display: none;
        }

        .video-banner-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }

        .video-banner-content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 20px;
        }

        .video-banner-content h2 {
            font-size: clamp(1.4rem, 3.5vw, 2.2rem);
            font-weight: 700;
            color: #f5b800;
            margin-bottom: 20px;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 15px rgba(0, 0, 0, 0.5);
        }

        .video-banner-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 28px;
            background: #f5b800;
            color: #000;
            font-size: 13px;
            font-weight: 700;
            border-radius: 4px;
            text-transform: capitalize;
            letter-spacing: 0.3px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .video-banner-btn:hover {
            background: #ffcc33;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(245, 184, 0, 0.3);
        }

        @media (max-width: 768px) {
            .video-banner {
                height: 40vh;
                min-height: 260px;
            }
        }

        /* ===== RASH GUARDS SECTION ===== */
        .rashguards-section {
            background: #000;
            padding: 60px 24px 75px;
        }

        .rashguards-inner {
            max-width: 1400px;
            margin: 0 auto;
        }

        .rashguards-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            gap: 20px;
        }

        .rashguards-header-title {
            font-size: 15px;
            font-weight: 700;
            color: #fff;
            letter-spacing: 0.2px;
            line-height: 1.4;
        }

        .rashguards-view-all {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: opacity 0.2s ease;
            white-space: nowrap;
        }

        .rashguards-view-all:hover {
            opacity: 0.85;
        }

        .rashguards-arrow-circle {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #181818;
            color: #fff;
            transition: all 0.25s ease;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .rashguards-view-all:hover .rashguards-arrow-circle {
            background: #252525;
            border-color: rgba(255, 255, 255, 0.2);
            transform: translateX(2px);
        }

        .rashguards-arrow-circle svg {
            width: 14px;
            height: 14px;
            stroke-width: 2.2;
        }

        .rashguards-scroll {
            display: flex;
            gap: 18px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding-bottom: 16px;
            -ms-overflow-style: none;
            scrollbar-width: none;
            cursor: grab;
        }

        .rashguards-scroll:active {
            cursor: grabbing;
        }

        .rashguards-scroll::-webkit-scrollbar {
            display: none;
        }

        .rash-card {
            flex: 0 0 280px;
            background: transparent;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .rash-card:hover {
            transform: translateY(-4px);
        }

        .rash-card-img {
            position: relative;
            width: 100%;
            aspect-ratio: 1280 / 1500;
            border-radius: 6px;
            overflow: hidden;
            background: #111;
        }

        .rash-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }

        .rash-card:hover .rash-card-img img {
            transform: scale(1.03);
        }

        .rash-card-info {
            padding: 14px 2px 6px;
        }

        .rash-card-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 8px;
        }

        .rash-card-name {
            font-size: 13.5px;
            font-weight: 700;
            color: #fff;
            line-height: 1.35;
            flex: 1;
        }

        .rash-card-rating {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 12.5px;
            font-weight: 700;
            color: #fff;
            flex-shrink: 0;
            padding-top: 1px;
        }

        .rash-card-rating .star {
            color: #f5b800;
            font-size: 13px;
        }

        .rash-card-prices {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .rash-card-sale-price {
            font-size: 14.5px;
            font-weight: 700;
            color: #f5b800;
        }

        .rash-card-original-price {
            font-size: 13px;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.4);
            text-decoration: line-through;
        }

        @media (max-width: 768px) {
            .rashguards-section {
                padding: 45px 16px 50px;
            }

            .rashguards-header {
                flex-direction: row;
                align-items: flex-start;
                gap: 12px;
            }

            .rashguards-header-title {
                font-size: 14px;
            }

            .rash-card {
                flex: 0 0 220px;
            }
        }

        /* ===== CONVERSATION BANNER ===== */
        .conversation-banner {
            position: relative;
            width: 100%;
            height: 70vh;
            min-height: 450px;
            max-height: 700px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #000;
        }

        .conversation-bg {
            position: absolute;
            inset: 0;
            z-index: 0;
        }

        .conversation-bg img,
        .conversation-bg video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
        }

        .conversation-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .conversation-content {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .play-btn {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.95);
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .play-btn:hover {
            transform: scale(1.05);
            background: #fff;
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.4);
        }

        .play-btn svg {
            width: 28px;
            height: 28px;
            color: #000;
            margin-left: 4px;
        }

        .conversation-content h3 {
            font-size: clamp(1.4rem, 3vw, 2rem);
            font-weight: 800;
            color: #fff;
            margin-bottom: 10px;
            letter-spacing: -0.2px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.5);
        }

        .conversation-content p {
            font-size: 13px;
            font-weight: 700;
            color: #fff;
            text-shadow: 0 2px 10px rgba(0,0,0,0.5);
        }
        
        @media (max-width: 768px) {
            .conversation-banner {
                height: 50vh;
                min-height: 350px;
            }
            .play-btn {
                width: 56px;
                height: 56px;
                margin-bottom: 16px;
            }
            .play-btn svg {
                width: 22px;
                height: 22px;
            }
        }

        /* ===== INSTAGRAM SECTION ===== */
        .instagram-section {
            background: #000;
            padding: 80px 24px 90px;
            text-align: center;
        }

        .instagram-header h2 {
            font-size: clamp(1.8rem, 4vw, 2.4rem);
            font-weight: 800;
            color: #f5b800;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }

        .instagram-header p {
            font-size: 15px;
            font-weight: 500;
            color: #fff;
            margin-bottom: 40px;
        }

        .instagram-scroll-wrap {
            position: relative;
            max-width: 1400px;
            margin: 0 auto;
        }

        .instagram-scroll {
            display: flex;
            gap: 16px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding-bottom: 16px;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .instagram-scroll::-webkit-scrollbar {
            display: none;
        }

        .insta-card {
            position: relative;
            flex: 0 0 calc(20% - 13px);
            min-width: 240px;
            aspect-ratio: 1 / 1;
            border-radius: 12px;
            overflow: hidden;
            background: #111;
            display: block;
        }

        .insta-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.4s ease;
        }

        .insta-card:hover img {
            transform: scale(1.05);
        }
        
        .insta-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0);
            transition: background 0.3s ease;
            z-index: 1;
        }
        
        .insta-card:hover::after {
            background: rgba(0,0,0,0.2);
        }

        .insta-icon {
            position: absolute;
            top: 12px;
            right: 12px;
            width: 24px;
            height: 24px;
            z-index: 2;
            color: #fff;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.5));
        }

        .instagram-next-btn,
        .instagram-prev-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #fff;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            z-index: 5;
            transition: all 0.3s ease;
        }

        .instagram-next-btn {
            right: -20px;
        }

        .instagram-prev-btn {
            left: -20px;
            opacity: 0;
            pointer-events: none;
        }

        .instagram-next-btn:hover,
        .instagram-prev-btn:hover {
            background: #f5b800;
            transform: translateY(-50%) scale(1.05);
        }

        .instagram-next-btn svg,
        .instagram-prev-btn svg {
            width: 20px;
            height: 20px;
            color: #000;
        }

        @media (max-width: 1200px) {
            .instagram-next-btn {
                right: 10px;
            }
            .instagram-prev-btn {
                left: 10px;
            }
        }

        @media (max-width: 768px) {
            .insta-card {
                flex: 0 0 260px;
            }
            .instagram-next-btn,
            .instagram-prev-btn {
                display: none;
            }
        }

        /* ===== FOOTER SECTION ===== */
        .footer-marquee-wrap {
            background: #f5b800;
            overflow: hidden;
            white-space: nowrap;
            padding: 12px 0;
            border-top: 1px solid #e0a800;
            border-bottom: 1px solid #e0a800;
        }

        .footer-marquee {
            display: inline-block;
            animation: marquee 25s linear infinite;
        }

        .footer-marquee span {
            color: #000;
            font-size: 1.1rem;
            font-weight: 800;
            margin-right: 40px;
            text-transform: uppercase;
        }

        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        .site-footer {
            background: #0a0a0a;
            color: #ccc;
            padding: 60px 40px 30px;
            font-size: 14px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1fr;
            gap: 40px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .footer-logo {
            margin-bottom: 24px;
            font-size: 2.2rem;
            font-weight: 900;
            color: #f5b800;
            font-style: italic;
            letter-spacing: -1px;
            text-transform: uppercase;
        }

        .footer-logo span {
            color: #fff;
        }

        .footer-signup h4 {
            color: #fff;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .footer-contact-info {
            margin-bottom: 24px;
            line-height: 1.6;
            color: #aaa;
        }

        .footer-contact-info p {
            margin: 0;
        }

        .footer-subscribe {
            position: relative;
            max-width: 320px;
            margin-bottom: 30px;
        }

        .footer-subscribe input {
            width: 100%;
            background: transparent;
            border: 1px solid #333;
            border-radius: 6px;
            padding: 14px 45px 14px 16px;
            color: #fff;
            outline: none;
            transition: border-color 0.3s;
        }

        .footer-subscribe input:focus {
            border-color: #f5b800;
        }

        .footer-subscribe button {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            background: #222;
            color: #fff;
            border: none;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s;
        }

        .footer-subscribe button:hover {
            background: #f5b800;
            color: #000;
        }

        .footer-subscribe button svg {
            width: 14px;
            height: 14px;
        }

        .footer-socials {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .footer-socials a {
            color: #fff;
            transition: color 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .footer-socials a:hover {
            color: #f5b800;
        }

        .footer-socials svg {
            width: 20px;
            height: 20px;
            fill: currentColor;
        }

        /* SVG fixes for Stroke-based icons like X/Twitter */
        .footer-socials .icon-stroke {
            fill: none;
            stroke: currentColor;
            stroke-width: 2;
        }

        .footer-col h5 {
            color: #f5b800;
            font-size: 0.95rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer-col ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-col ul li {
            margin-bottom: 14px;
        }

        .footer-col ul a {
            color: #aaa;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-col ul a:hover {
            color: #fff;
        }

        .footer-bottom {
            max-width: 1400px;
            margin: 60px auto 0;
            padding-top: 24px;
            border-top: 1px solid #222;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
        }

        .footer-copyright {
            font-size: 13px;
            color: #888;
        }

        .footer-region {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }
        
        .footer-region img {
            width: 20px;
            border-radius: 2px;
        }

        .footer-region svg {
            width: 14px;
            height: 14px;
        }

        @media (max-width: 992px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
            .footer-col-main {
                grid-column: span 2;
            }
        }

        @media (max-width: 576px) {
            .footer-grid {
                grid-template-columns: 1fr;
            }
            .footer-col-main {
                grid-column: span 1;
            }
            .footer-bottom {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        /* ===== LOGIN MODAL ===== */
        .login-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .login-modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .login-modal {
            background: #0f0f0f;
            width: 100%;
            max-width: 450px;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
            transform: translateY(20px);
            transition: all 0.3s ease;
            position: relative;
        }

        .login-modal-overlay.active .login-modal {
            transform: translateY(0);
        }

        .login-modal-close {
            position: absolute;
            top: 16px;
            right: 16px;
            background: none;
            border: none;
            color: #888;
            cursor: pointer;
            transition: color 0.3s;
        }

        .login-modal-close:hover {
            color: #fff;
        }

        .login-modal-close svg {
            width: 24px;
            height: 24px;
        }

        .login-modal h2 {
            color: #fff;
            text-align: center;
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 30px;
        }

        .login-form-group {
            margin-bottom: 20px;
        }

        .login-form-group input {
            width: 100%;
            background: #111;
            border: 1px solid #333;
            color: #fff;
            padding: 16px;
            border-radius: 6px;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s;
        }

        .login-form-group input:focus {
            border-color: #f5b800;
        }

        .login-form-group input::placeholder {
            color: #777;
        }

        .login-forgot {
            display: block;
            color: #aaa;
            font-size: 0.85rem;
            text-decoration: underline;
            margin-bottom: 30px;
            transition: color 0.3s;
        }

        .login-forgot:hover {
            color: #f5b800;
        }

        .login-submit-btn {
            width: 100%;
            background: #f5b800;
            color: #000;
            border: none;
            padding: 16px;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        .login-submit-btn:hover {
            background: #e0a800;
        }

        .login-submit-btn:active {
            transform: scale(0.98);
        }

        .login-signup {
            display: block;
            text-align: center;
            color: #ccc;
            font-size: 0.9rem;
            margin-top: 24px;
            text-decoration: underline;
            transition: color 0.3s;
        }

        .login-signup:hover {
            color: #fff;
        }

        /* ===== CART MODAL ===== */
        .cart-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .cart-modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .cart-modal {
            position: fixed;
            top: 0;
            right: -450px;
            width: 100%;
            max-width: 450px;
            height: 100%;
            background: #000;
            z-index: 10000;
            transition: right 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            display: flex;
            flex-direction: column;
            padding: 24px;
            box-shadow: -10px 0 30px rgba(0, 0, 0, 0.5);
        }

        .cart-modal-overlay.active .cart-modal {
            right: 0;
        }

        .cart-modal-header {
            display: flex;
            justify-content: flex-end;
            padding-bottom: 20px;
        }

        .cart-modal-close {
            background: none;
            border: none;
            color: #fff;
            cursor: pointer;
            padding: 8px;
            transition: color 0.3s;
        }

        .cart-modal-close:hover {
            color: #f5b800;
        }

        .cart-modal-close svg {
            width: 24px;
            height: 24px;
        }

        .cart-modal-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .cart-empty-icon-wrap {
            position: relative;
            margin-bottom: 24px;
        }

        .cart-empty-icon {
            width: 56px;
            height: 56px;
            color: #fff;
            stroke-width: 1.5;
        }

        .cart-badge-zero {
            position: absolute;
            top: -5px;
            right: -8px;
            background: #222;
            color: #ccc;
            font-size: 11px;
            font-weight: 700;
            width: 22px;
            height: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            border: 2px solid #000;
        }

        .cart-empty-title {
            color: #fff;
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 30px;
        }

        .cart-continue-btn {
            background: #1f1f1f;
            color: #fff;
            border: none;
            padding: 16px 36px;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.3s;
        }

        .cart-continue-btn:hover {
            background: #333;
        }

        /* ===== SEARCH MODAL ===== */
        .search-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .search-modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .search-modal {
            position: fixed;
            top: 0;
            right: -55vw; /* Start off-screen */
            width: 50vw; /* Half screen width */
            height: 100%;
            background: #000;
            z-index: 10000;
            transition: right 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            display: flex;
            flex-direction: column;
            padding: 40px;
            box-shadow: -10px 0 30px rgba(0, 0, 0, 0.7);
        }

        @media (max-width: 768px) {
            .search-modal {
                width: 100%;
                right: -100%;
            }
        }

        .search-modal-overlay.active .search-modal {
            right: 0;
        }

        .search-modal-header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #fff;
            padding-bottom: 12px;
            margin-top: 20px;
        }

        .search-modal-input {
            flex: 1;
            background: transparent;
            border: none;
            color: #fff;
            font-size: 1.8rem;
            font-weight: 700;
            outline: none;
        }

        .search-modal-input::placeholder {
            color: #666;
        }

        .search-modal-close {
            background: none;
            border: none;
            color: #fff;
            cursor: pointer;
            padding: 8px;
            margin-left: 20px;
            transition: color 0.3s;
        }

        .search-modal-close:hover {
            color: #f5b800;
        }

        .search-modal-close svg {
            width: 24px;
            height: 24px;
        }
    </style>
</head>
<body>

    <!-- Yellow accent stripe -->
    <div class="accent-bar"></div>

    <!-- Navigation -->
    <nav class="navbar" id="main-navbar">
        <div class="navbar-inner">

            <!-- Mobile hamburger -->
            <button class="mobile-toggle" id="mobile-toggle" aria-label="Toggle menu">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 12h18M3 6h18M3 18h18"/>
                </svg>
            </button>

            <!-- Left: Navigation Menu Items -->
            <div class="nav-left" id="nav-menu">

                <!-- Men -->
                <div class="nav-item">
                    <a href="#">
                        Men
                        <svg class="chevron" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M2 3.5L5 6.5L8 3.5"/>
                        </svg>
                    </a>
                    <div class="mega-dropdown">
                        <div>
                            <div class="mega-col-header">Gi Collection</div>
                            <a href="#">BJJ Gis</a>
                            <a href="#">Lightweight Gis</a>
                            <a href="#">Competition Gis</a>
                            <a href="#">Gi Pants</a>
                        </div>
                        <div>
                            <div class="mega-col-header">No-Gi</div>
                            <a href="#">Rash Guards</a>
                            <a href="#">Fight Shorts</a>
                            <a href="#">Spats</a>
                            <a href="#">Compression</a>
                        </div>
                        <div>
                            <div class="mega-col-header">Accessories</div>
                            <a href="#">Belts</a>
                            <a href="#">Mouth Guards</a>
                            <a href="#">Ear Guards</a>
                            <a href="#">Gear Bags</a>
                        </div>
                    </div>
                </div>

                <!-- Women -->
                <div class="nav-item">
                    <a href="#">
                        Women
                        <svg class="chevron" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M2 3.5L5 6.5L8 3.5"/>
                        </svg>
                    </a>
                    <div class="dropdown">
                        <div class="dropdown-header">Shop Women's</div>
                        <a href="#">BJJ Gis <svg class="arrow" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 7h8M8 4l3 3-3 3"/></svg></a>
                        <a href="#">Rash Guards <svg class="arrow" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 7h8M8 4l3 3-3 3"/></svg></a>
                        <a href="#">Fight Shorts <svg class="arrow" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 7h8M8 4l3 3-3 3"/></svg></a>
                        <a href="#">Spats <svg class="arrow" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 7h8M8 4l3 3-3 3"/></svg></a>
                        <div class="dropdown-divider"></div>
                        <a href="#">No-Gi Apparel <svg class="arrow" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 7h8M8 4l3 3-3 3"/></svg></a>
                        <a href="#">Accessories <svg class="arrow" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 7h8M8 4l3 3-3 3"/></svg></a>
                    </div>
                </div>

                <!-- Kids -->
                <div class="nav-item">
                    <a href="#">
                        Kids
                        <svg class="chevron" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M2 3.5L5 6.5L8 3.5"/>
                        </svg>
                    </a>
                    <div class="dropdown">
                        <div class="dropdown-header">Shop Kids'</div>
                        <a href="#">Kids BJJ Gis <svg class="arrow" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 7h8M8 4l3 3-3 3"/></svg></a>
                        <a href="#">Kids Rash Guards <svg class="arrow" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 7h8M8 4l3 3-3 3"/></svg></a>
                        <a href="#">Kids Shorts <svg class="arrow" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 7h8M8 4l3 3-3 3"/></svg></a>
                        <a href="#">Kids Belts <svg class="arrow" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 7h8M8 4l3 3-3 3"/></svg></a>
                    </div>
                </div>

                <!-- Dummies -->
                <div class="nav-item">
                    <a href="#">
                        Dummies
                        <svg class="chevron" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M2 3.5L5 6.5L8 3.5"/>
                        </svg>
                    </a>
                    <div class="dropdown">
                        <div class="dropdown-header">Training Dummies</div>
                        <a href="#">Grappling Dummies <svg class="arrow" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 7h8M8 4l3 3-3 3"/></svg></a>
                        <a href="#">MMA Dummies <svg class="arrow" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 7h8M8 4l3 3-3 3"/></svg></a>
                        <a href="#">Throwing Dummies <svg class="arrow" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 7h8M8 4l3 3-3 3"/></svg></a>
                        <a href="#">Punching Bags <svg class="arrow" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 7h8M8 4l3 3-3 3"/></svg></a>
                    </div>
                </div>

                <!-- Gear -->
                <div class="nav-item">
                    <a href="#">
                        Gear
                        <svg class="chevron" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M2 3.5L5 6.5L8 3.5"/>
                        </svg>
                    </a>
                    <div class="mega-dropdown">
                        <div>
                            <div class="mega-col-header">Protection</div>
                            <a href="#">Boxing Gloves</a>
                            <a href="#">MMA Gloves</a>
                            <a href="#">Headgear</a>
                            <a href="#">Shin Guards</a>
                        </div>
                        <div>
                            <div class="mega-col-header">Equipment</div>
                            <a href="#">Focus Mitts</a>
                            <a href="#">Thai Pads</a>
                            <a href="#">Heavy Bags</a>
                            <a href="#">Jump Ropes</a>
                        </div>
                        <div>
                            <div class="mega-col-header">Essentials</div>
                            <a href="#">Gym Bags</a>
                            <a href="#">Wraps</a>
                            <a href="#">Mouth Guards</a>
                            <a href="#">Tape & First Aid</a>
                        </div>
                    </div>
                </div>

                <!-- Wholesale -->
                <div class="nav-item">
                    <a href="#">Wholesale</a>
                </div>
            </div>

            <!-- Center: Logo -->
            <a href="/" class="nav-center">
                <div class="logo">
                    <svg class="logo-icon" viewBox="0 0 40 40" fill="none">
                        <path d="M8 8L20 4L32 8V20L20 36L8 20V8Z" fill="#f5b800" stroke="#f5b800" stroke-width="1"/>
                        <path d="M14 14L20 10L26 14V22L20 30L14 22V14Z" fill="#000" stroke="#000" stroke-width="0.5"/>
                        <path d="M18 17L20 15L22 17V21L20 25L18 21V17Z" fill="#f5b800"/>
                    </svg>
                    <span class="logo-text">ELITE</span>
                </div>
            </a>

            <!-- Right: Utility Icons -->
            <div class="nav-right">
                <!-- Search -->
                <button class="nav-icon-btn" id="search-btn" aria-label="Search">
                    <svg viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="7"/>
                        <path d="M21 21l-4.35-4.35"/>
                    </svg>
                </button>

                <!-- Account -->
                <button class="nav-icon-btn" id="account-btn" aria-label="Account">
                    <svg viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </button>

                <!-- Cart -->
                <button class="nav-icon-btn cart-btn" id="cart-btn" aria-label="Cart">
                    <svg viewBox="0 0 24 24">
                        <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
                        <line x1="3" y1="6" x2="21" y2="6"/>
                        <path d="M16 10a4 4 0 01-8 0"/>
                    </svg>
                    <span class="cart-badge">0</span>
                </button>
            </div>
        </div>
    </nav>

@yield('content')
    <!-- Footer Marquee -->
    <div class="footer-marquee-wrap">
        <div class="footer-marquee">
            <span>One Million Athletes Served</span>
            <span>One Million Athletes Served</span>
            <span>One Million Athletes Served</span>
            <span>One Million Athletes Served</span>
            <span>One Million Athletes Served</span>
            <span>One Million Athletes Served</span>
            <span>One Million Athletes Served</span>
            <span>One Million Athletes Served</span>
            <!-- Duplicated for seamless loop -->
            <span>One Million Athletes Served</span>
            <span>One Million Athletes Served</span>
            <span>One Million Athletes Served</span>
            <span>One Million Athletes Served</span>
            <span>One Million Athletes Served</span>
            <span>One Million Athletes Served</span>
            <span>One Million Athletes Served</span>
            <span>One Million Athletes Served</span>
        </div>
    </div>

    <!-- Site Footer -->
    <footer class="site-footer">
        <div class="footer-grid">
            <div class="footer-col footer-col-main">
                <div class="footer-logo">ELITE</div>
                <div class="footer-signup">
                    <h4>Sign up for new stories and personal offers</h4>
                </div>
                <div class="footer-contact-info">
                    <p>Los Angeles, California</p>
                    <p>Phone: 855 793 3281</p>
                </div>
                <div class="footer-subscribe">
                    <input type="email" placeholder="E-mail" aria-label="Email address">
                    <button type="button" aria-label="Subscribe">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 18l6-6-6-6"/>
                        </svg>
                    </button>
                </div>
                <div class="footer-socials">
                    <a href="#" aria-label="Facebook">
                        <!-- Facebook Icon -->
                        <svg viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                    </a>
                    <a href="#" aria-label="X (Twitter)">
                        <!-- X Icon -->
                        <svg class="icon-stroke" viewBox="0 0 24 24"><line x1="4" y1="4" x2="20" y2="20"/><line x1="20" y1="4" x2="4" y2="20"/></svg>
                    </a>
                    <a href="#" aria-label="Instagram">
                        <!-- Instagram Icon -->
                        <svg class="icon-stroke" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                    </a>
                    <a href="#" aria-label="YouTube">
                        <!-- YouTube Icon -->
                        <svg viewBox="0 0 24 24"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33 2.78 2.78 0 0 0 1.94 2c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.33 29 29 0 0 0-.46-5.33z"/><polygon fill="#000" points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/></svg>
                    </a>
                    <a href="#" aria-label="TikTok">
                        <!-- TikTok Icon -->
                        <svg viewBox="0 0 24 24"><path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z"/></svg>
                    </a>
                </div>
            </div>

            <div class="footer-col">
                <h5>Help</h5>
                <ul>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Returns & Exchange</a></li>
                    <li><a href="#">Return Form</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Affiliates</a></li>
                    <li><a href="#">Product Care</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h5>Policies</h5>
                <ul>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Refund Policy</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Sitemap</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h5>Wholesale</h5>
                <ul>
                    <li><a href="#">Visit Website</a></li>
                    <li><a href="#">Become a Member</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-copyright">
                &copy; 2026, Elite Sports . Powered by Shopify
            </div>
            <div class="footer-region">
                <img src="https://upload.wikimedia.org/wikipedia/en/a/a4/Flag_of_the_United_States.svg" alt="US Flag">
                United States (USD $)
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M6 9l6 6 6-6"/>
                </svg>
            </div>
        </div>
    </footer>

    <!-- Login Modal -->
    <div class="login-modal-overlay" id="login-modal-overlay">
        <div class="login-modal" id="login-modal">
            <button class="login-modal-close" id="login-modal-close" aria-label="Close Login">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 6L6 18M6 6l12 12"/>
                </svg>
            </button>
            <h2>Login</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="login-form-group">
                    <input type="email" name="email" placeholder="E-mail" required>
                </div>
                <div class="login-form-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <a href="#" class="login-forgot">Forgot your password?</a>
                
                <button type="submit" class="login-submit-btn">Login</button>
                
                <a href="#" class="login-signup">Sign up</a>
            </form>
        </div>
    </div>

    <!-- Cart Modal -->
    <div class="cart-modal-overlay" id="cart-modal-overlay">
        <div class="cart-modal" id="cart-modal">
            <div class="cart-modal-header">
                <button class="cart-modal-close" id="cart-modal-close" aria-label="Close Cart">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 6L6 18M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="cart-modal-body">
                <div class="cart-empty-icon-wrap">
                    <!-- Basket Icon -->
                    <svg class="cart-empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M5.5 8.5h13l-1.5 8h-10l-1.5-8z" />
                        <path d="M12 2.5v6" />
                    </svg>
                    <span class="cart-badge-zero">0</span>
                </div>
                <h3 class="cart-empty-title">Your cart is empty</h3>
                <a href="{{ route('cart') }}" class="cart-continue-btn" id="cart-continue-btn" style="text-decoration: none; display: inline-block;">Continue shopping</a>
            </div>
        </div>
    </div>

    <!-- Search Modal -->
    <div class="search-modal-overlay" id="search-modal-overlay">
        <div class="search-modal" id="search-modal">
            <div class="search-modal-header">
                <input type="text" class="search-modal-input" id="search-input" placeholder="Search for..." autocomplete="off">
                <button class="search-modal-close" id="search-modal-close" aria-label="Close Search">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 6L6 18M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Help Floating Button -->
    <button class="help-btn" id="help-btn">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10"/>
            <path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/>
            <line x1="12" y1="17" x2="12.01" y2="17"/>
        </svg>
        Help
    </button>

    <script>
        // ===== LOGIN MODAL LOGIC =====
        const accountBtn = document.getElementById('account-btn');
        const loginOverlay = document.getElementById('login-modal-overlay');
        const loginCloseBtn = document.getElementById('login-modal-close');
        const loginModal = document.getElementById('login-modal');

        if (accountBtn && loginOverlay) {
            accountBtn.addEventListener('click', (e) => {
                e.preventDefault();
                loginOverlay.classList.add('active');
            });

            loginCloseBtn.addEventListener('click', () => {
                loginOverlay.classList.remove('active');
            });

            loginOverlay.addEventListener('click', (e) => {
                // Close if clicking outside the modal content
                if (!loginModal.contains(e.target)) {
                    loginOverlay.classList.remove('active');
                }
            });
        }

        // ===== CART MODAL LOGIC =====
        const cartBtn = document.getElementById('cart-btn');
        const cartOverlay = document.getElementById('cart-modal-overlay');
        const cartCloseBtn = document.getElementById('cart-modal-close');
        const cartModal = document.getElementById('cart-modal');

        if (cartBtn && cartOverlay) {
            cartBtn.addEventListener('click', (e) => {
                e.preventDefault();
                cartOverlay.classList.add('active');
            });

            const closeCart = () => {
                cartOverlay.classList.remove('active');
            };

            if(cartCloseBtn) cartCloseBtn.addEventListener('click', closeCart);

            cartOverlay.addEventListener('click', (e) => {
                if (cartModal && !cartModal.contains(e.target)) {
                    closeCart();
                }
            });
        }

        // ===== SEARCH MODAL LOGIC =====
        const searchBtn = document.getElementById('search-btn');
        const searchOverlay = document.getElementById('search-modal-overlay');
        const searchCloseBtn = document.getElementById('search-modal-close');
        const searchModal = document.getElementById('search-modal');
        const searchInput = document.getElementById('search-input');

        if (searchBtn && searchOverlay) {
            searchBtn.addEventListener('click', (e) => {
                e.preventDefault();
                searchOverlay.classList.add('active');
                // Auto-focus input
                setTimeout(() => { searchInput.focus(); }, 100);
            });

            const closeSearch = () => {
                searchOverlay.classList.remove('active');
            };

            searchCloseBtn.addEventListener('click', closeSearch);

            searchOverlay.addEventListener('click', (e) => {
                if (!searchModal.contains(e.target)) {
                    closeSearch();
                }
            });
        }

        // Mobile menu toggle
        const mobileToggle = document.getElementById('mobile-toggle');
        const navMenu = document.getElementById('nav-menu');

        mobileToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');

            // Toggle hamburger icon to X
            const isActive = navMenu.classList.contains('active');
            mobileToggle.innerHTML = isActive
                ? '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6L6 18M6 6l12 12"/></svg>'
                : '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12h18M3 6h18M3 18h18"/></svg>';
        });

        // Navbar shadow on scroll
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('main-navbar');
            if (window.scrollY > 10) {
                navbar.style.boxShadow = '0 4px 30px rgba(0, 0, 0, 0.4)';
            } else {
                navbar.style.boxShadow = 'none';
            }
        });

        // ===== COUNT-UP ANIMATION =====
        function formatNumber(num) {
            return num.toLocaleString('en-US');
        }

        function easeOutQuart(t) {
            return 1 - Math.pow(1 - t, 4);
        }

        function animateCount(el) {
            const target = parseInt(el.getAttribute('data-count'), 10);
            const suffix = el.getAttribute('data-suffix') || '';
            const duration = 2000; // 2 seconds
            const startTime = performance.now();

            function update(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const easedProgress = easeOutQuart(progress);
                const currentValue = Math.floor(easedProgress * target);

                el.textContent = formatNumber(currentValue);
                if (suffix) {
                    el.innerHTML = formatNumber(currentValue) + '<span class="stat-suffix">' + suffix + '</span>';
                }

                if (progress < 1) {
                    requestAnimationFrame(update);
                } else {
                    el.textContent = formatNumber(target);
                    if (suffix) {
                        el.innerHTML = formatNumber(target) + '<span class="stat-suffix">' + suffix + '</span>';
                    }
                }
            }

            requestAnimationFrame(update);
        }

        // Intersection Observer for stats
        const statsBar = document.getElementById('stats-bar');
        let statsAnimated = false;

        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !statsAnimated) {
                    statsAnimated = true;

                    // Fade in stat items
                    const statItems = statsBar.querySelectorAll('.stat-item');
                    statItems.forEach(item => item.classList.add('visible'));

                    // Animate numbers
                    const counters = statsBar.querySelectorAll('.stat-number[data-count]');
                    counters.forEach(counter => {
                        setTimeout(() => animateCount(counter), 300);
                    });
                }
            });
        }, { threshold: 0.3 });

        statsObserver.observe(statsBar);

        // Intersection Observer for about section
        const aboutInner = document.querySelector('.about-bjj-inner');
        if (aboutInner) {
            const aboutObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        aboutInner.classList.add('visible');
                        aboutObserver.unobserve(aboutInner);
                    }
                });
            }, { threshold: 0.2 });
            aboutObserver.observe(aboutInner);
        }

        // ===== MATERIAL ADVANTAGE SLIDER =====
        const materialSlides = [
            {
                title: 'Pearl Weave Fabric',
                desc: 'Known for its lightweight feel and long-lasting durability, pearl weave fabric is the gold-standard for modern BJJ Gis. Its breathable construction helps athletes stay comfortable through hard rolling sessions, training, and tournament competition.',
                img: '{{ asset("images/pearl-weave-fabric.jpg") }}',
                alt: 'Pearl Weave Fabric close-up texture'
            },
            {
                title: 'Ripstop Pants',
                desc: 'Our ripstop fabric is engineered with a reinforced grid pattern that prevents tears from spreading. Lighter than traditional Gi pants yet incredibly strong, ripstop is the preferred choice for athletes who demand maximum mobility and durability.',
                img: '{{ asset("images/pearl-weave-fabric.jpg") }}',
                alt: 'Ripstop fabric texture'
            },
            {
                title: 'Preshrunk Cotton',
                desc: 'Every Elite Sports Gi is pre-shrunk to ensure a consistent, reliable fit from day one. No more guessing on sizing — our fabrics are treated before construction so your Gi looks and feels the same after every wash.',
                img: '{{ asset("images/pearl-weave-fabric.jpg") }}',
                alt: 'Preshrunk cotton fabric texture'
            }
        ];

        let currentMaterialSlide = 0;
        const slideTitle = document.getElementById('material-slide-title');
        const slideDesc = document.getElementById('material-slide-desc');
        const slideImg = document.querySelector('#material-slide-img img');

        function updateMaterialSlide(index) {
            const slide = materialSlides[index];
            // Fade out
            slideTitle.style.opacity = '0';
            slideDesc.style.opacity = '0';
            slideImg.style.opacity = '0';
            slideTitle.style.transform = 'translateY(10px)';
            slideDesc.style.transform = 'translateY(10px)';

            setTimeout(() => {
                slideTitle.textContent = slide.title;
                slideDesc.textContent = slide.desc;
                slideImg.src = slide.img;
                slideImg.alt = slide.alt;

                // Fade in
                slideTitle.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                slideDesc.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                slideImg.style.transition = 'opacity 0.4s ease';
                slideTitle.style.opacity = '1';
                slideDesc.style.opacity = '1';
                slideImg.style.opacity = '1';
                slideTitle.style.transform = 'translateY(0)';
                slideDesc.style.transform = 'translateY(0)';
            }, 300);
        }

        document.getElementById('material-next').addEventListener('click', () => {
            currentMaterialSlide = (currentMaterialSlide + 1) % materialSlides.length;
            updateMaterialSlide(currentMaterialSlide);
        });

        document.getElementById('material-prev').addEventListener('click', () => {
            currentMaterialSlide = (currentMaterialSlide - 1 + materialSlides.length) % materialSlides.length;
            updateMaterialSlide(currentMaterialSlide);
        });

        // ===== VIDEO BANNER - PLAY ON SCROLL =====
        const ibjjfVideo = document.getElementById('ibjjf-video');
        const videoBanner = document.getElementById('ibjjf-video-banner');
        const videoMedia = ibjjfVideo ? ibjjfVideo.closest('.video-banner-media') : null;

        if (ibjjfVideo && videoBanner) {
            // Try to load and play the video when section is visible
            const videoObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Try playing the video
                        ibjjfVideo.play().then(() => {
                            // Video loaded and playing - show video, add class to hide animated bg
                            videoMedia.style.display = 'block';
                            videoBanner.classList.add('video-playing');
                        }).catch(() => {
                            // Video can't play - keep the animated image
                            videoMedia.style.display = 'none';
                        });
                    } else {
                        ibjjfVideo.pause();
                    }
                });
            }, { threshold: 0.25 });

            videoObserver.observe(videoBanner);
        }

        // ===== RASH GUARDS SCROLL & CONTROLS =====
        const rashScroll = document.getElementById('rashguards-scroll');
        const rashScrollBtn = document.getElementById('rashguards-scroll-btn');

        if (rashScroll) {
            // Initial subtle offset so previous item peeks on the left exactly matching screenshot
            if (window.innerWidth > 900) {
                rashScroll.scrollLeft = 140;
            }

            if (rashScrollBtn) {
                rashScrollBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    rashScroll.scrollBy({ left: 300, behavior: 'smooth' });
                });
            }

            // Drag to scroll
            let isDown = false;
            let startX;
            let scrollLeft;

            rashScroll.addEventListener('mousedown', (e) => {
                isDown = true;
                startX = e.pageX - rashScroll.offsetLeft;
                scrollLeft = rashScroll.scrollLeft;
            });
            rashScroll.addEventListener('mouseleave', () => { isDown = false; });
            rashScroll.addEventListener('mouseup', () => { isDown = false; });
            rashScroll.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - rashScroll.offsetLeft;
                const walk = (x - startX) * 1.5;
                rashScroll.scrollLeft = scrollLeft - walk;
            });
        }

        // ===== INSTAGRAM SCROLL =====
        const instaScroll = document.getElementById('instagram-scroll');
        const instaNextBtn = document.getElementById('instagram-next-btn');
        const instaPrevBtn = document.getElementById('instagram-prev-btn');

        if (instaScroll && instaNextBtn && instaPrevBtn) {
            const updateInstaButtons = () => {
                if (instaScroll.scrollLeft > 10) {
                    instaPrevBtn.style.opacity = '1';
                    instaPrevBtn.style.pointerEvents = 'auto';
                } else {
                    instaPrevBtn.style.opacity = '0';
                    instaPrevBtn.style.pointerEvents = 'none';
                }

                if (instaScroll.scrollLeft >= instaScroll.scrollWidth - instaScroll.clientWidth - 10) {
                    instaNextBtn.style.opacity = '0';
                    instaNextBtn.style.pointerEvents = 'none';
                } else {
                    instaNextBtn.style.opacity = '1';
                    instaNextBtn.style.pointerEvents = 'auto';
                }
            };

            instaNextBtn.addEventListener('click', () => {
                instaScroll.scrollBy({ left: instaScroll.clientWidth * 0.8, behavior: 'smooth' });
            });

            instaPrevBtn.addEventListener('click', () => {
                instaScroll.scrollBy({ left: -(instaScroll.clientWidth * 0.8), behavior: 'smooth' });
            });

            instaScroll.addEventListener('scroll', updateInstaButtons);
            
            // Drag to scroll for instagram
            let isInstaDown = false;
            let startInstaX;
            let scrollInstaLeft;

            instaScroll.addEventListener('mousedown', (e) => {
                isInstaDown = true;
                startInstaX = e.pageX - instaScroll.offsetLeft;
                scrollInstaLeft = instaScroll.scrollLeft;
            });
            instaScroll.addEventListener('mouseleave', () => { isInstaDown = false; });
            instaScroll.addEventListener('mouseup', () => { isInstaDown = false; });
            instaScroll.addEventListener('mousemove', (e) => {
                if (!isInstaDown) return;
                e.preventDefault();
                const x = e.pageX - instaScroll.offsetLeft;
                const walk = (x - startInstaX) * 1.5;
                instaScroll.scrollLeft = scrollInstaLeft - walk;
            });
        }
    </script>
</body>
</html>
