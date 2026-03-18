@extends('E-Learning.layouts.master')

@section('title', 'New Release')

@section('content')

{{-- =======================
✅ TOP SLIDER / CAROUSEL
======================= --}}
<div class="d-flex justify-content-center">
    <div id="releaseSlider" class="carousel slide lms-slider shadow-sm" data-ride="carousel"
        style="max-width:100%; width:100%;">

        {{-- ✅ indicators --}}
        <ol class="carousel-indicators">
            <li data-target="#releaseSlider" data-slide-to="0" class="active"></li>
            <li data-target="#releaseSlider" data-slide-to="1"></li>
            <li data-target="#releaseSlider" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">

            {{-- SLIDE 1 --}}
            <div class="carousel-item active">
                <img class="d-block w-100 slider-img"
                    src="{{ asset('backend/dist/img/slide/Commencement-Day-2025-51-scaled.jpg') }}" alt="Slide 1">
                <div class="carousel-caption text-left">
                    <h5>សៀវភៅថ្មីៗ</h5>
                    <p>ស្វែងរកឯកសារ និងសៀវភៅថ្មីៗសម្រាប់ការរៀន</p>
                    <a href="#" class="btn btn-primary btn-sm js-loading">មើលទាំងអស់</a>
                </div>
            </div>

            {{-- SLIDE 2 --}}
            <div class="carousel-item">
                <img class="d-block w-100 slider-img" src="{{ asset('backend/dist/img/slide/Slider-scaled.jpg') }}"
                    alt="Slide 2">
                <div class="carousel-caption text-left">
                    <h5>វគ្គសិក្សា និងមេរៀន</h5>
                    <p>រៀនតាមវីដេអូ PDF និងមាតិកាអត្ថបទ</p>
                    <a href="/course/list" class="btn btn-success btn-sm js-loading">ទៅកាន់វគ្គសិក្សា</a>
                </div>
            </div>

            {{-- SLIDE 3 --}}
            <div class="carousel-item">
                <img class="d-block w-100 slider-img" src="{{ asset('backend/dist/img/slide/SPI-Campus-no-logo-Crop.png') }}"
                    alt="Slide 3">
                <div class="carousel-caption text-left">
                    <h5>ប្រឡង និងកិច្ចការ</h5>
                    <p>ធ្វើកិច្ចការ ប្រឡង និងទទួលលទ្ធផល</p>
                    <a href="/assignments" class="btn btn-warning btn-sm js-loading">មើលកិច្ចការ</a>
                </div>
            </div>

        </div>

        {{-- controls --}}
        <a class="carousel-control-prev" href="#releaseSlider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#releaseSlider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>
</div>

{{-- =======================
✅ PAGE HEADER
======================= --}}
<div class="content-header">
    <div class="container-fluid mt-4">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">New Release</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#" class="js-loading">Show all</a></li>
                    <li class="breadcrumb-item active">New Release</li>
                </ol>
            </div>
        </div>
    </div>
</div>

{{-- =======================
✅ MAIN CONTENT (GRID)
======================= --}}
<div class="content">
    <div class="container-fluid">
        <div class="row">

            {{-- ITEM 1 --}}
            <div class="col-6 col-md-4 col-lg-3 col-xl-2 mb-3">
                <a href="{{ url('lessons/list') }}" class="text-decoration-none js-loading">
                    <div class="card card-outline shadow-sm border-0 h-100 book-card">
                        <div class="book-cover">
                            <img src="https://api.saladigital.org/public/orgs/695351f900342bb5c9175a1c/images/38445fef-df03-4ee2-abbc-9bd7cb1eb513.png"
                                alt="" class="img-fluid">
                            <div class="book-overlay">
                                <div class="book-title">
                                    ក្របខ័ណ្ឌនិងផែនការសកម្មភាព ស្ដីការអភិវឌ្ឍវិជ្ជាជីវៈជាប្រចាំសម្រាប់គ្រូបង្រៀន និងនាយកសាលា
                                </div>
                                <div class="book-author">
                                    <i class="fas fa-user mr-1"></i> នាយកដ្ឋានកិច្ចការវិក្រឹតការ
                                </div>
                                <div class="book-stats">
                                    <span><i class="far fa-eye mr-1"></i> 3,874</span>
                                    <span><i class="fas fa-download mr-1"></i> 0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- ITEM 2 --}}
            <div class="col-6 col-md-4 col-lg-3 col-xl-2 mb-3">
                <a href="{{ url('lessons/list') }}" class="text-decoration-none js-loading">
                    <div class="card card-outline shadow-sm border-0 h-100 book-card">
                        <div class="book-cover">
                            <img src="https://api.saladigital.org/public/orgs/63fc7c5751508ff62e6ce857/images/84871610-945b-482b-afb7-922e7871c70c.png"
                                alt="" class="img-fluid">
                            <div class="book-overlay">
                                <div class="book-title">Curriculum Framework for Primary Teacher Education (12+4)</div>
                                <div class="book-author">
                                    <i class="fas fa-user mr-1"></i> នាយកដ្ឋានកិច្ចការបណ្តុះបណ្តាល
                                </div>
                                <div class="book-stats">
                                    <span><i class="far fa-eye mr-1"></i> 6,130</span>
                                    <span><i class="fas fa-download mr-1"></i> 0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- ITEM 3 --}}
            <div class="col-6 col-md-4 col-lg-3 col-xl-2 mb-3">
                <a href="{{ url('lessons/list') }}" class="text-decoration-none js-loading">
                    <div class="card card-outline shadow-sm border-0 h-100 book-card">
                        <div class="book-cover">
                            <img src="https://api.saladigital.org/public/orgs/695351f900342bb5c9175a1c/images/4dcc1408-1c10-4b8b-adea-2948908b1662.png"
                                alt="" class="img-fluid">
                            <div class="book-overlay">
                                <div class="book-title">គោលនយោបាយស្ដីពីការអភិវឌ្ឍវិជ្ជាជីវៈជាប្រចាំសម្រាប់បុគ្គលិកអប់រំ</div>
                                <div class="book-author">
                                    <i class="fas fa-user mr-1"></i> នាយកដ្ឋានកិច្ចការវិក្រឹតការ
                                </div>
                                <div class="book-stats">
                                    <span><i class="far fa-eye mr-1"></i> 3,276</span>
                                    <span><i class="fas fa-download mr-1"></i> 0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- ✅ Copy more items here... --}}

        </div>
    </div>
</div>

{{-- =======================
✅ FOOTER (AdminLTE Style)
{{-- ✅ FULL LMS WEBSITE NAVBAR (HOVER DROPDOWN LIKE IMAGE) --}}
<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm bg-white lms-navbar">
    <div class="container-fluid">

        {{-- ✅ LOGO + BRAND --}}
        <a class="navbar-brand d-flex align-items-center font-weight-bold" href="/dashboard" style="margin-left:100px">
            <img src="{{ asset('backend/dist/img/spi.png') }}" alt="SPI Logo"
                style="width:200px;height:50px;object-fit:contain;" class="mr-2">

        </a>

        {{-- ✅ MOBILE TOGGLER --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#lmsNavbar"
            aria-controls="lmsNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- ✅ NAVBAR CONTENT --}}
        <div class="collapse navbar-collapse" id="lmsNavbar">

            {{-- ✅ LEFT MENU (LIKE WEBSITE) --}}
            <ul class="navbar-nav ml-auto align-items-center lms-menu">

                <li class="nav-item ">
                    <a class="nav-link" href="/dashboard">
                        <i class="fas fa-home"></i> HOME
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/news">
                        <i class="far fa-newspaper"></i> NEWS
                    </a>
                </li>

                {{-- ✅ LMS DROPDOWN (HOVER) --}}
                <li class="nav-item dropdown dropdown-hover">
                    <a class="nav-link dropdown-toggle" href="#" id="lmsDropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-book-open"></i> LMS
                    </a>

                    <div class="dropdown-menu" aria-labelledby="lmsDropdown">
                        <a class="dropdown-item" href="/course/list">
                            <i class="fas fa-list"></i> Course List
                        </a>
                        <a class="dropdown-item" href="/course/create">
                            <i class="fas fa-plus"></i> Create Course
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/categories">
                            <i class="fas fa-tags"></i> Categories
                        </a>
                    </div>
                </li>

                {{-- ✅ COURSEWARE DROPDOWN (HOVER) --}}
                <li class="nav-item dropdown dropdown-hover">
                    <a class="nav-link dropdown-toggle" href="#" id="coursewareDropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-graduation-cap"></i> COURSEWARE
                    </a>

                    <div class="dropdown-menu" aria-labelledby="coursewareDropdown">
                        <a class="dropdown-item" href="/lessons/list">
                            <i class="fas fa-play-circle"></i> Lessons
                        </a>
                        <a class="dropdown-item" href="/assignments">
                            <i class="fas fa-file-alt"></i> Assignments
                        </a>
                        <a class="dropdown-item" href="/quizzes">
                            <i class="fas fa-question-circle"></i> Quizzes
                        </a>
                    </div>
                </li>

                {{-- ✅ EVENTS DROPDOWN (HOVER) --}}
                <li class="nav-item dropdown dropdown-hover">
                    <a class="nav-link dropdown-toggle" href="#" id="eventsDropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-calendar-alt"></i> EVENTS
                    </a>

                    <div class="dropdown-menu" aria-labelledby="eventsDropdown">
                        <a class="dropdown-item" href="/events">
                            <i class="fas fa-calendar"></i> All Events
                        </a>
                        <a class="dropdown-item" href="/events/upcoming">
                            <i class="fas fa-clock"></i> Upcoming
                        </a>
                    </div>
                </li>

                {{-- ✅ ABOUT US DROPDOWN (HOVER LIKE IMAGE) --}}
                <li class="nav-item dropdown dropdown-hover">
                    <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-info-circle"></i> ABOUT US
                    </a>

                    <div class="dropdown-menu" aria-labelledby="aboutDropdown">
                        <a class="dropdown-item" href="/contact">
                            <i class="fas fa-user"></i> Contact Us
                        </a>
                        <a class="dropdown-item" href="/team">
                            <i class="fas fa-users"></i> Our Team
                        </a>
                        <a class="dropdown-item" href="/feedback">
                            <i class="fas fa-rss"></i> Feedback
                        </a>
                        <a class="dropdown-item" href="/services">
                            <i class="fas fa-sliders-h"></i> Our Services
                        </a>
                        <a class="dropdown-item" href="/partners">
                            <i class="fas fa-user-friends"></i> Our Partners
                        </a>
                        <a class="dropdown-item" href="/brochure">
                            <i class="fas fa-th-large"></i> Broucher Information
                        </a>
                        <a class="dropdown-item text-danger" href="/history">
                            <i class="fas fa-history"></i> History
                        </a>
                    </div>
                </li>

                {{-- ✅ RIGHT ICONS --}}
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button" title="Fullscreen">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" id="darkModeToggle" title="Dark Mode">
                        <i class="fas fa-moon" id="darkModeIcon"></i>
                    </a>
                </li>

                {{-- ✅ USER DROPDOWN (HOVER) --}}
                <li class="nav-item dropdown dropdown-hover">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" data-toggle="dropdown"
                        href="#">
                        <img src="{{ Auth::user()->profile_photo_url ?? asset('backend/dist/img/user1-128x128.jpg') }}"
                            class="img-circle mr-2" width="32" height="32" style="object-fit:cover;">
                        <span class="d-none d-md-inline">{{ Auth::user()->name ?? 'ម៉ូវ វរាជ' }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right shadow">
                        <div class="dropdown-item text-center bg-primary text-white">
                            <strong>{{ Auth::user()->name ?? 'User' }}</strong><br>
                            <small>{{ Auth::user()->username ?? 'DataEntry' }}</small>
                        </div>

                        <div class="dropdown-divider"></div>

                        <a href="/profile" class="dropdown-item">
                            <i class="fas fa-user-circle"></i> Profile
                        </a>

                        <a href="/settings" class="dropdown-item">
                            <i class="fas fa-cog"></i> Settings
                        </a>

                        <div class="dropdown-divider"></div>

                        <a href="#" class="dropdown-item text-danger"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off"></i> Logout
                        </a>

                        <form id="logout-form" action="" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</nav>

{{-- ✅ spacing because navbar fixed-top --}}
<div style="height:72px;"></div>

<script>
    const toggle = document.getElementById('darkModeToggle');
    const icon = document.getElementById('darkModeIcon');

    if (localStorage.getItem('dark-mode') === 'enabled') {
        document.body.classList.add('dark-mode');
        icon.classList.replace('fa-moon', 'fa-sun');
    }

    toggle.addEventListener('click', function(e) {
        e.preventDefault();
        document.body.classList.toggle('dark-mode');

        if (document.body.classList.contains('dark-mode')) {
            icon.classList.replace('fa-moon', 'fa-sun');
            localStorage.setItem('dark-mode', 'enabled');
        } else {
            icon.classList.replace('fa-sun', 'fa-moon');
            localStorage.setItem('dark-mode', 'disabled');
        }
    });
</script>

<style>
    /* =========================================================
   ✅ FULL STYLE: Hover dropdown + smooth slow animation
   Works with Bootstrap 4 / AdminLTE
   ========================================================= */

    /* -------- Navbar basic -------- */
    .lms-navbar {
        padding-top: 0;
        padding-bottom: 0;
        z-index: 1030;
    }

    .lms-menu .nav-link {
        padding: 18px 14px;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 13px;
        letter-spacing: .3px;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: background .25s ease, color .25s ease;
    }

    .lms-menu .nav-link i {
        font-size: 16px;
    }

    /* active + hover */
    .lms-menu .nav-item.active>.nav-link,
    .lms-menu .nav-link:hover {
        background: rgba(0, 0, 0, .08);
        border-radius: 4px;
    }

    /* -------- Dropdown base style (like image) -------- */
    .dropdown-menu {
        border: 0;
        border-radius: 6px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, .18);
        padding: 10px 0;
        min-width: 260px;
    }

    .dropdown-item {
        padding: 12px 18px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 14px;
        transition: background .2s ease, padding-left .2s ease;
    }

    .dropdown-item i {
        width: 22px;
        text-align: center;
        opacity: .85;
        font-size: 16px;
    }

    .dropdown-item:hover {
        background: #f3f4f6;
        padding-left: 22px;
        /* small slide on hover */
    }

    /* -------- Hover dropdown (desktop only) -------- */
    @media (min-width: 992px) {

        /* remove bootstrap margin jump */
        .dropdown-hover>.dropdown-menu {
            margin-top: 0;
            left: 0;
        }

        /* ✅ ULTRA SMOOTH ANIMATION (SLOW) */
        .dropdown-hover .dropdown-menu {
            display: block;
            /* keep block for animation */
            opacity: 0;
            visibility: hidden;
            transform: translateY(16px) scale(.98);
            transition:
                opacity .45s ease,
                transform .45s cubic-bezier(.23, 1, .32, 1),
                visibility .45s ease;
            pointer-events: none;
        }

        .dropdown-hover:hover>.dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
            pointer-events: auto;
        }

        /* ✅ rotate arrow smoothly */
        .nav-link.dropdown-toggle::after {
            transition: transform .35s ease;
        }

        .dropdown-hover:hover>.nav-link.dropdown-toggle::after {
            transform: rotate(180deg);
        }
    }

    /* -------- Optional: nicer divider -------- */
    .dropdown-divider {
        margin: 6px 0;
    }

    /* -------- DARK MODE (KEEP) -------- */
    body.dark-mode {
        background: #0f172a;
        color: #e5e7eb;
    }

    body.dark-mode .navbar {
        background: #111827 !important;
    }

    body.dark-mode .navbar .nav-link,
    body.dark-mode .navbar .navbar-brand {
        color: #e5e7eb !important;
    }

    body.dark-mode .navbar .nav-link:hover {
        background: rgba(255, 255, 255, .12);
    }

    body.dark-mode .dropdown-menu {
        background: #111827;
        border-color: rgba(255, 255, 255, .12);
    }

    body.dark-mode .dropdown-item {
        color: #e5e7eb;
    }

    body.dark-mode .dropdown-item:hover {
        background: rgba(255, 255, 255, .06);
    }

    /* -------- Extra: make icons aligned nicely -------- */
    .dropdown-menu .dropdown-item i {
        width: 26px;
    }
</style>


{{-- =======================
✅ Loading Overlay
======================= --}}
<div id="pageLoading" class="page-loading d-none" aria-hidden="true">
    <div class="loading-box">
        <div class="spinner-border text-light" role="status"></div>
        <div class="loading-text">សូមរងចាំបន្តិច...</div>
    </div>
</div>

{{-- =======================
✅ STYLE
======================= --}}
<style>
    /* ===== Slider style ===== */
    .lms-slider {
        overflow: hidden;
        background: #111827;
        border-radius: 14px;
    }

    .slider-img {
        height: 600px;
        object-fit: cover;
        filter: brightness(.65);
    }

    .carousel-caption {
        bottom: 18%;
        max-width: 520px;
        background: rgba(0, 0, 0, .40);
        padding: 16px 18px;
        border-radius: 14px;
        backdrop-filter: blur(6px);
    }

    .carousel-caption h5 {
        font-weight: 800;
        font-size: 22px;
        margin-bottom: 6px;
    }

    .carousel-caption p {
        font-size: 14px;
        margin-bottom: 10px;
        opacity: .95;
    }

    /* Responsive slider */
    @media (max-width: 768px) {
        .slider-img {
            height: 220px;
        }

        .carousel-caption {
            bottom: 10%;
            max-width: 90%;
        }

        .carousel-caption h5 {
            font-size: 16px;
        }
    }

    /* ===== Book grid style ===== */
    .book-card {
        border-radius: 16px;
        overflow: hidden;
        transition: .25s ease;
    }

    .book-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 40px rgba(0, 0, 0, .18) !important;
    }

    .book-cover {
        position: relative;
        aspect-ratio: 3 / 4;
        background: #f3f4f6;
        overflow: hidden;
    }

    .book-cover img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 8px;
        transition: transform .35s ease;
    }

    .book-card:hover .book-cover img {
        transform: scale(1.05);
    }

    .book-overlay {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        padding: 12px 12px 10px;
        background: linear-gradient(to top, rgba(0, 0, 0, .92), rgba(0, 0, 0, .55), rgba(0, 0, 0, 0));
        color: #fff;
    }

    .book-title {
        font-weight: 800;
        font-size: 13px;
        line-height: 1.25;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin-bottom: 6px;
    }

    .book-author {
        font-size: 12px;
        opacity: .95;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 6px;
    }

    .book-stats {
        display: flex;
        gap: 12px;
        font-size: 12px;
        font-weight: 700;
        opacity: .95;
    }

    /* ===== Page Loading Overlay ===== */
    .page-loading {
        position: fixed;
        inset: 0;
        z-index: 99999;
        background: rgba(17, 24, 39, .65);
        display: flex;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(6px);
    }

    .loading-box {
        text-align: center;
        padding: 18px 20px;
        border-radius: 16px;
        background: rgba(0, 0, 0, .45);
        box-shadow: 0 18px 40px rgba(0, 0, 0, .25);
        min-width: 220px;
    }

    .loading-text {
        margin-top: 10px;
        color: #fff;
        font-weight: 800;
        font-size: 14px;
        letter-spacing: .2px;
    }
</style>

{{-- =======================
✅ JAVASCRIPT (Loading on click)
======================= --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loading = document.getElementById('pageLoading');

        function showLoading() {
            if (!loading) return;
            loading.classList.remove('d-none');
            loading.setAttribute('aria-hidden', 'false');
        }

        // ✅ Show loading when click any <a> that goes to another page
        document.addEventListener('click', function(e) {
            const a = e.target.closest('a');
            if (!a) return;

            const href = a.getAttribute('href');

            // ignore empty / #
            if (!href || href === '#') return;

            // ignore new tab
            if (a.target === '_blank') return;

            // ignore javascript:void(0)
            if (href.startsWith('javascript:')) return;

            // ignore anchor on same page (like #section)
            if (href.startsWith('#')) return;

            // ✅ show loading
            showLoading();
        });

        // ✅ Show loading when submit forms (if any)
        document.addEventListener('submit', function() {
            showLoading();
        });

        // ✅ hide overlay when back-forward cache
        window.addEventListener('pageshow', function(event) {
            if (event.persisted && loading) {
                loading.classList.add('d-none');
                loading.setAttribute('aria-hidden', 'true');
            }
        });
    });
</script>

@endsection
