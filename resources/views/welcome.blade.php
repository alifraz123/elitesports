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
