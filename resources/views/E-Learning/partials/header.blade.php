{{-- ✅ FULL LMS WEBSITE NAVBAR (HOVER DROPDOWN) + KHMER BATTAMBANG FONT --}}
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

            {{-- ✅ LEFT MENU --}}
            <ul class="navbar-nav ml-auto align-items-center lms-menu">

                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">
                        <i class="fas fa-home"></i> ទំព័រដើម
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/news">
                        <i class="far fa-newspaper"></i> ព័ត៌មាន
                    </a>
                </li>

                {{-- ✅ LMS DROPDOWN (HOVER) --}}
                <li class="nav-item dropdown dropdown-hover">
                    <a class="nav-link dropdown-toggle" href="#" id="lmsDropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-book-open"></i> ប្រព័ន្ធ LMS
                    </a>

                    <div class="dropdown-menu" aria-labelledby="lmsDropdown">
                        <a class="dropdown-item" href="/course/list">
                            <i class="fas fa-list"></i> បញ្ជីវគ្គសិក្សា
                        </a>
                        <a class="dropdown-item" href="/course/create">
                            <i class="fas fa-plus"></i> បង្កើតវគ្គសិក្សា
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/categories">
                            <i class="fas fa-tags"></i> ប្រភេទវគ្គសិក្សា
                        </a>
                    </div>
                </li>

                {{-- ✅ COURSEWARE DROPDOWN (HOVER) --}}
                <li class="nav-item dropdown dropdown-hover">
                    <a class="nav-link dropdown-toggle" href="#" id="coursewareDropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-graduation-cap"></i> មាតិកាសិក្សា
                    </a>

                    <div class="dropdown-menu" aria-labelledby="coursewareDropdown">
                        <a class="dropdown-item" href="/lessons/list">
                            <i class="fas fa-play-circle"></i> មេរៀន
                        </a>
                        <a class="dropdown-item" href="/assignments">
                            <i class="fas fa-file-alt"></i> ការងារផ្ទះ
                        </a>
                        <a class="dropdown-item" href="/quizzes">
                            <i class="fas fa-question-circle"></i> សំណួរ (Quizzes)
                        </a>
                    </div>
                </li>

                {{-- ✅ EVENTS DROPDOWN (HOVER) --}}
                <li class="nav-item dropdown dropdown-hover">
                    <a class="nav-link dropdown-toggle" href="#" id="eventsDropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-calendar-alt"></i> ព្រឹត្តិការណ៍
                    </a>

                    <div class="dropdown-menu" aria-labelledby="eventsDropdown">
                        <a class="dropdown-item" href="/events">
                            <i class="fas fa-calendar"></i> ព្រឹត្តិការណ៍ទាំងអស់
                        </a>
                        <a class="dropdown-item" href="/events/upcoming">
                            <i class="fas fa-clock"></i> ព្រឹត្តិការណ៍នាពេលខាងមុខ
                        </a>
                    </div>
                </li>

                {{-- ✅ ABOUT US DROPDOWN (HOVER) --}}
                <li class="nav-item dropdown dropdown-hover">
                    <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-info-circle"></i> អំពីយើង
                    </a>

                    <div class="dropdown-menu" aria-labelledby="aboutDropdown">
                        <a class="dropdown-item" href="/contact">
                            <i class="fas fa-user"></i> ទំនាក់ទំនង
                        </a>
                        <a class="dropdown-item" href="/team">
                            <i class="fas fa-users"></i> ក្រុមការងារ
                        </a>
                        <a class="dropdown-item" href="/feedback">
                            <i class="fas fa-rss"></i> មតិយោបល់
                        </a>
                        <a class="dropdown-item" href="/services">
                            <i class="fas fa-sliders-h"></i> សេវាកម្ម
                        </a>
                        <a class="dropdown-item" href="/partners">
                            <i class="fas fa-user-friends"></i> ដៃគូ
                        </a>
                        <a class="dropdown-item" href="/brochure">
                            <i class="fas fa-th-large"></i> ព័ត៌មានសៀវភៅផ្សព្វផ្សាយ
                        </a>
                        <a class="dropdown-item text-danger" href="/history">
                            <i class="fas fa-history"></i> ប្រវត្តិ
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
                            <i class="fas fa-user-circle"></i> ប្រវត្តិរូប
                        </a>

                        <a href="/settings" class="dropdown-item">
                            <i class="fas fa-cog"></i> ការកំណត់
                        </a>

                        <div class="dropdown-divider"></div>

                        <a href="#" class="dropdown-item text-danger"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off"></i> ចាកចេញ
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
   ✅ FULL STYLE: Hover dropdown + smooth animation
   ✅ Khmer Battambang font applied
   Works with Bootstrap 4 / AdminLTE
========================================================= */

    /* ✅ Khmer font for navbar */
    .lms-navbar,
    .lms-navbar * {
        font-family: 'Battambang', sans-serif !important;
    }

    /* -------- Navbar basic -------- */
    .lms-navbar {
        padding-top: 0;
        padding-bottom: 0;
        z-index: 1030;
    }

    /* ✅ Khmer should NOT uppercase */
    .lms-menu .nav-link {
        padding: 18px 14px;
        font-weight: 600;
        text-transform: none;
        /* ✅ IMPORTANT */
        font-size: 15px;
        letter-spacing: 0;
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

    /* -------- Dropdown base style -------- */
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
        font-weight: 500;
        transition: background .2s ease, padding-left .2s ease;
    }

    .dropdown-item i {
        width: 26px;
        text-align: center;
        opacity: .85;
        font-size: 16px;
    }

    .dropdown-item:hover {
        background: #f3f4f6;
        padding-left: 22px;
    }

    /* -------- Hover dropdown (desktop only) -------- */
    @media (min-width: 992px) {
        .dropdown-hover>.dropdown-menu {
            margin-top: 0;
            left: 0;
        }

        .dropdown-hover .dropdown-menu {
            display: block;
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

        .nav-link.dropdown-toggle::after {
            transition: transform .35s ease;
        }

        .dropdown-hover:hover>.nav-link.dropdown-toggle::after {
            transform: rotate(180deg);
        }
    }

    .dropdown-divider {
        margin: 6px 0;
    }

    /* -------- DARK MODE -------- */
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
</style>
