<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Portal — University of Rose</title>
    <link rel="icon" type="image/png" href="/images/icon.png">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="welcome-page">

    <!-- NAV -->
    <nav>
        <div class="nav-left">
            <img src="/images/icon.png" alt="University of Rose" class="nav-logo" style="height:40px;width:auto;">
            <div class="nav-divider"></div>
            <div class="nav-portal">Student <span>Portal</span></div>
        </div>
        <div class="nav-right">
            @auth
                <a href="{{ route('dashboard') }}" class="w-btn-solid">Go to Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="w-btn-outline">Sign In</a>
                <a href="{{ route('register') }}" class="w-btn-solid">Register</a>
            @endauth
        </div>
    </nav>

    <!-- HERO -->
    <div class="hero">
        <img src="https://www.staffs.ac.uk/image-library/homepage/hero-images/web-banner-1920-x-1080-gold.x08b02ce4.jpg"
             alt="University of Rose" class="hero-img">
        <div class="hero-overlay">
            <div class="hero-content">
                <div class="hero-tag">Academic Year 2024/25</div>
                <h1>Your Academic Journey, All In One Place</h1>
                <p>Track your module results, monitor your progress, and predict your degree classification with the University of Rose Student Portal.</p>
                <div class="hero-btns">
                    <a href="{{ route('register') }}" class="hero-btn-primary">Get Started</a>
                    <a href="{{ route('login') }}" class="hero-btn-secondary">Sign In</a>
                </div>
            </div>
        </div>
    </div>

    <!-- GOLD BAR QUICK ACCESS-->
    <div class="gold-bar">
        <div class="gold-bar-title">Quick Access</div>
        <div class="gold-bar-links">
            <a href="{{ route('login') }}">Student Login</a>
            <a href="{{ route('register') }}">Register</a>
            <a href="https://www.staffs.ac.uk/students" target="_blank">Current Students</a>
            <a href="https://www.staffs.ac.uk/legal/policies/what-awards-can-you-get.jsp" target="_blank">Classification Rules</a>
        </div>
    </div>

    <!-- STATS -->
    <div class="w-stats">
        <div class="w-stat">
            <div class="w-stat-number">2</div>
            <div class="w-stat-label">Degree Programmes</div>
        </div>
        <div class="w-stat">
            <div class="w-stat-number">12</div>
            <div class="w-stat-label">Modules Available</div>
        </div>
        <div class="w-stat">
            <div class="w-stat-number">24</div>
            <div class="w-stat-label">Assignments Tracked</div>
        </div>
        <div class="w-stat">
            <div class="w-stat-number">100%</div>
            <div class="w-stat-label">Online Access</div>
        </div>
    </div>

    <!-- FEATURES -->
    <div class="w-section">
        <div class="w-eyebrow">What You Can Do</div>
        <div class="w-title">Everything you need to stay on track</div>
        <div class="w-sub">From tracking assignment marks to predicting your final classification — the portal keeps you informed every step of the way.</div>

        <div class="features-grid">
            <div class="feature-card">
                <svg class="feature-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                <h3>Track Your Results</h3>
                <p>View all module results and assignment marks in one clean dashboard, updated in real time.</p>
            </div>
            <div class="feature-card">
                <svg class="feature-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                <h3>Predict Your Classification</h3>
                <p>Enter predicted marks for upcoming modules and instantly see your projected degree classification.</p>
            </div>
            <div class="feature-card">
                <svg class="feature-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <h3>Grade Boundaries</h3>
                <p>See exactly what marks you need in remaining assignments to hit First, 2:1, 2:2 or Third.</p>
            </div>
            <div class="feature-card">
                <svg class="feature-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                <h3>Secure Access</h3>
                <p>Your academic data is protected. Only you can view and manage your personal results.</p>
            </div>
            <div class="feature-card">
                <svg class="feature-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <h3>Manage Assignments</h3>
                <p>Submit and update assignment marks across all modules on your chosen award.</p>
            </div>
            <div class="feature-card">
                <svg class="feature-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                <h3>Two Awards Supported</h3>
                <p>BSc Software Development and BSc Computer Science with all core level 5 and 6 modules.</p>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="cta-strip">
        <h2>Ready to take control of your <span>degree?</span></h2>
        <a href="{{ route('register') }}">Create Your Account</a>
    </div>

    <!-- FOOTER -->
    <footer>
        <img src="/images/icon.png" alt="University of Rose" class="nav-logo" style="height:40px;width:auto;">
        <div class="footer-links">
            <a href="{{ route('login') }}">Sign In</a>
            <a href="{{ route('register') }}">Register</a>
            <a href="https://www.staffs.ac.uk/legal" target="_blank">Legal</a>
            <a href="https://www.staffs.ac.uk/accessibility" target="_blank">Accessibility</a>
        </div>
        <p>&copy; {{ date('Y') }} University of Rose Student Portal</p>
    </footer>

</div>
</body>
</html>