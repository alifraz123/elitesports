<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Elite Sports</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #000000;
            --bg-left: #ffffff;
            --bg-right: #fafafa;
            --border: #d9d9d9;
            --text-main: #333333;
            --text-light: #737373;
            --focus: #000000;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, sans-serif;
        }

        body {
            background-color: var(--bg-left);
            color: var(--text-main);
            line-height: 1.5;
        }

        a { text-decoration: none; color: inherit; }
        
        /* Header */
        .checkout-header {
            padding: 25px 0;
            border-bottom: 1px solid var(--border);
            position: relative;
            background: #fff;
        }
        .header-inner {
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 5%;
        }
        .header-logo {
            font-size: 28px;
            font-weight: 900;
            letter-spacing: -1px;
            text-transform: uppercase;
            font-style: italic;
        }
        .header-cart {
            position: absolute;
            right: 5%;
            top: 50%;
            transform: translateY(-50%);
        }
        
        /* Main Layout */
        .checkout-main {
            display: flex;
            min-height: calc(100vh - 80px);
        }
        
        /* Left Column */
        .col-left {
            width: 55%;
            padding: 40px 4% 40px 10%;
            display: flex;
            flex-direction: column;
        }
        
        /* Right Column */
        .col-right {
            width: 45%;
            background: var(--bg-right);
            border-left: 1px solid var(--border);
            padding: 40px 10% 40px 4%;
        }

        /* Express Checkout */
        .express-checkout {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }
        .btn-express {
            flex: 1;
            height: 45px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            cursor: pointer;
            border: none;
            color: #fff;
        }
        .btn-shop { background: #5a31f4; }
        .btn-gpay { background: #000; }
        
        .divider {
            text-align: center;
            position: relative;
            margin: 20px 0 30px;
            color: var(--text-light);
            font-size: 13px;
        }
        .divider::before, .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: calc(50% - 20px);
            height: 1px;
            background: var(--border);
        }
        .divider::before { left: 0; }
        .divider::after { right: 0; }

        /* Forms */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 15px;
        }
        .section-title {
            font-size: 18px;
            font-weight: 600;
        }
        .section-link {
            font-size: 13px;
            color: #000;
            text-decoration: underline;
        }

        .form-group {
            margin-bottom: 15px;
            position: relative;
        }
        .form-row {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }
        .form-row .form-group { margin-bottom: 0; flex: 1; }
        
        .form-control {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid var(--border);
            border-radius: 4px;
            font-size: 14px;
            transition: border 0.2s;
        }
        .form-control:focus {
            outline: none;
            border-color: var(--focus);
            box-shadow: 0 0 0 1px var(--focus);
        }
        
        select.form-control {
            appearance: none;
            background: url('data:image/svg+xml;utf8,<svg fill="none" stroke="%23333" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M6 9l6 6 6-6"></path></svg>') no-repeat right 12px center;
            background-size: 14px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            margin-top: -5px;
            margin-bottom: 25px;
        }
        .checkbox-group input {
            width: 16px;
            height: 16px;
            accent-color: var(--primary);
        }

        /* Shipping Method Placeholder */
        .shipping-placeholder {
            background: #f5f5f5;
            padding: 20px;
            border-radius: 4px;
            text-align: center;
            font-size: 14px;
            color: var(--text-light);
            margin-bottom: 30px;
        }

        /* Submit Button */
        .btn-submit {
            background: var(--primary);
            color: #fff;
            width: 100%;
            padding: 18px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.2s;
        }
        .btn-submit:hover { opacity: 0.9; }
        
        /* Footer Links */
        .checkout-footer {
            margin-top: 40px;
            display: flex;
            gap: 15px;
            font-size: 12px;
            color: var(--text-light);
        }
        .checkout-footer a:hover { color: #000; text-decoration: underline;}

        /* Right Column Styles */
        .order-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        .item-img-wrap {
            position: relative;
            width: 64px;
            height: 64px;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .item-img-wrap img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 7px;
        }
        .item-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: rgba(114, 114, 114, 0.9);
            color: #fff;
            font-size: 12px;
            font-weight: 600;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        .item-info { flex: 1; }
        .item-title { font-size: 14px; font-weight: 600; margin-bottom: 4px;}
        .item-variant { font-size: 12px; color: var(--text-light); }
        .item-price { font-size: 14px; font-weight: 500; }
        
        .discount-row {
            display: flex;
            gap: 10px;
            padding: 20px 0;
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            margin-bottom: 20px;
        }
        .btn-apply {
            background: #e8e8e8;
            color: #a0a0a0;
            border: 1px solid var(--border);
            padding: 0 20px;
            border-radius: 4px;
            font-weight: 600;
            cursor: not-allowed; /* Disabled state simulation */
        }
        
        .totals-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 14px;
            color: var(--text-main);
        }
        .total-final {
            font-size: 20px;
            font-weight: 600;
            margin-top: 15px;
            align-items: center;
        }
        .total-final .amount { font-size: 24px; }
        .currency { font-size: 12px; color: var(--text-light); margin-right: 5px;}

        @media(max-width: 900px) {
            .checkout-main { flex-direction: column-reverse; }
            .col-left, .col-right { width: 100%; padding: 30px 5%; border-left: none; }
            .col-right { border-bottom: 1px solid var(--border); }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="checkout-header">
        <div class="header-inner">
            <div class="header-logo">
                <a href="/">ELITE</a>
            </div>
            <div class="header-cart">
                <a href="/cart">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                    </svg>
                </a>
            </div>
        </div>
    </header>

    <main class="checkout-main">
        <!-- Left Column (Forms) -->
        <div class="col-left">
            
            <div style="text-align: center; font-size: 12px; color: var(--text-light); margin-bottom: 10px;">Express checkout</div>
            <div class="express-checkout">
                <button class="btn-express btn-shop">shop</button>
                <button class="btn-express btn-gpay">G Pay</button>
            </div>
            
            <div class="divider">OR</div>

            <!-- Contact -->
            <div class="section-header">
                <div class="section-title">Contact</div>
                <a href="#" class="section-link">Log in</a>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email">
            </div>
            <label class="checkbox-group">
                <input type="checkbox" checked>
                <span>Email me with news and offers</span>
            </label>

            <!-- Delivery -->
            <div class="section-header" style="margin-top: 30px;">
                <div class="section-title">Delivery</div>
            </div>
            
            <div class="form-group">
                <select class="form-control">
                    <option>United States</option>
                </select>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="First name (optional)">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Last name">
                </div>
            </div>
            
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Address">
            </div>
            
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Apartment, suite, etc. (optional)">
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="City">
                </div>
                <div class="form-group">
                    <select class="form-control">
                        <option>State</option>
                        <option>California</option>
                        <option>New York</option>
                        <option>Texas</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="ZIP code">
                </div>
            </div>

            <div class="form-group">
                <input type="tel" class="form-control" placeholder="Phone">
            </div>
            
            <label class="checkbox-group">
                <input type="checkbox">
                <span>Text me with news and offers</span>
            </label>

            <!-- Shipping Method -->
            <div class="section-header" style="margin-top: 20px;">
                <div class="section-title">Shipping method</div>
            </div>
            <div class="shipping-placeholder">
                Enter your shipping address to view available shipping methods.
            </div>

            <!-- Submit Button (Payment Omitted) -->
            <button class="btn-submit">Pay now</button>

            <!-- Footer Links -->
            <div class="checkout-footer">
                <a href="#">Refund policy</a>
                <a href="#">Shipping</a>
                <a href="#">Privacy policy</a>
                <a href="#">Terms of service</a>
            </div>

        </div>

        <!-- Right Column (Order Summary) -->
        <div class="col-right">
            
            <div class="order-item">
                <div class="item-img-wrap" style="padding: 10px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>
                </div>
                <div class="item-info">
                    <div class="item-title">Free Unlimited Return for $0.98</div>
                    <div class="item-variant">$0.98</div>
                </div>
                <div class="item-price">$0.98</div>
            </div>

            <div class="order-item">
                <div class="item-img-wrap">
                    <img src="{{ asset('images/insta-3.jpg') }}" alt="Gi">
                    <div class="item-badge">1</div>
                </div>
                <div class="item-info">
                    <div class="item-title">Brazilian Jiu Jitsu Kids BJJ Gray/White Belt</div>
                    <div class="item-variant">C0</div>
                </div>
                <div class="item-price">$31.96</div>
            </div>

            <div class="discount-row">
                <input type="text" class="form-control" placeholder="Discount code or gift card">
                <button class="btn-apply">Apply</button>
            </div>

            <div class="totals-row">
                <span>Subtotal · 2 items</span>
                <span>$32.94</span>
            </div>
            <div class="totals-row">
                <span>Shipping</span>
                <span style="color: var(--text-light); font-size: 12px;">Enter shipping address</span>
            </div>
            
            <div class="totals-row total-final">
                <span>Total</span>
                <div>
                    <span class="currency">USD</span>
                    <span class="amount">$32.94</span>
                </div>
            </div>

        </div>
    </main>

</body>
</html>
