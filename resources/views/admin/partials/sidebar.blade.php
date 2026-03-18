<style>
    /* ========================================== 🎓 SAINT PAUL LMS - FULL SIDEBAR STYLE ========================================== */
    :root {
        --sidebar-width: 300px;
        --sidebar-font: 21px;
        --sidebar-sub-font: 19px;
        --sidebar-icon: 17px;
        --sidebar-sub-icon: 14px;
        --sidebar-arrow: 14px;
        --sidebar-padding-y: 10px;
        --sidebar-padding-x: 12px;
    }

    .main-sidebar {
        width: var(--sidebar-width) !important;
        font-family: 'Battambang', sans-serif !important;
    }

    .content-wrapper,
    .main-header,
    .main-footer {
        margin-left: var(--sidebar-width) !important;
    }

    .sidebar-collapse .main-sidebar {
        width: 4.6rem !important;
    }

    .sidebar-collapse .content-wrapper,
    .sidebar-collapse .main-header,
    .sidebar-collapse .main-footer {
        margin-left: 4.6rem !important;
    }

    .main-sidebar .sidebar {
        width: 100% !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
    }

    .main-sidebar .brand-link {
        padding: 10px 12px !important;
    }

    .main-sidebar .brand-text {
        font-size: 18px !important;
        font-weight: 500;
    }

    .main-sidebar .nav-sidebar {
        width: 100% !important;
    }

    .main-sidebar .nav-sidebar .nav-item {
        width: 100% !important;
    }

    .main-sidebar .nav-sidebar .nav-link {
        display: flex !important;
        align-items: center !important;
        width: 100% !important;
        padding: var(--sidebar-padding-y) var(--sidebar-padding-x) !important;
        transition: all 0.2s ease;
    }

    .main-sidebar .nav-sidebar .nav-icon {
        width: 30px;
        text-align: center;
        font-size: var(--sidebar-icon) !important;
        margin-right: 14px;
    }

    .main-sidebar .nav-treeview .nav-icon {
        font-size: var(--sidebar-sub-icon) !important;
    }

    .main-sidebar .nav-sidebar .nav-link p {
        flex: 1 !important;
        margin: 0 !important;
        font-size: var(--sidebar-font) !important;
        white-space: nowrap !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
    }

    .main-sidebar .nav-treeview .nav-link p {
        font-size: var(--sidebar-sub-font) !important;
    }

    .main-sidebar .nav-sidebar .nav-link .right {
        margin-left: auto !important;
        font-size: var(--sidebar-arrow) !important;
        opacity: .8;
    }

    .main-sidebar .nav-treeview .nav-link {
        padding-left: 55px !important;
    }

    .nav-item.menu-open>.nav-link {
        background: rgba(255, 255, 255, 0.05);
    }

    @media (max-width: 1366px) {
        :root {
            --sidebar-font: 16px;
            --sidebar-sub-font: 15px;
        }
    }

    @media (max-width: 992px) {
        :root {
            --sidebar-font: 15px;
            --sidebar-sub-font: 14px;
        }
    }
</style>

<aside class="main-sidebar sidebar-dark-primary sidebar-fixed">

    {{-- Brand --}}
    <a href="{{ route('dashboard') }}" class="brand-link shadow-sm"
        style="width:100%; color:white; display:flex; align-items:center; padding:0.6rem 1rem; border-bottom:2px solid rgba(255,255,255,0.25);">
        <img src="{{ asset('backend/dist/img/spilogo.png') }}"
            style="opacity:.9; width:50px; height:35px; margin-right:10px;">
        <span class="brand-text font-weight-light">Saint Paul Institute</span>
    </a>

    <div class="sidebar">
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                {{-- User Panel --}}
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ Auth::user()->avatar }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"> WellCome : {{ Auth::user()->name ?? 'User' }}</a>
                    </div>
                </div>

                {{-- ===================== 1) DASHBOARD ===================== --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>University Dashboard</p>
                    </a>
                </li>

                {{-- ===================== 2) PORTAL ===================== --}}
                <li class="nav-header text-uppercase">Portal</li>

                <li class="nav-item has-treeview {{ request()->routeIs('e-learning') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('e-learning') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-laptop-house"></i>
                        <p>
                            Elearning_LMS
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('e-learning') }}"
                                class="nav-link {{ request()->routeIs('e-learning') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>lms_portal</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- ===================== ACADEMIC STRUCTURE ===================== --}}
                {{-- ===================== ACADEMIC STRUCTURE ===================== --}}
                <li class="nav-header text-uppercase">Academic Structure</li>

                {{-- Departments --}}
                <li class="nav-item has-treeview {{ request()->is('course-categories*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('course-categories*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Departments
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('course-categories.create') }}"
                                class="nav-link {{ request()->routeIs('course-categories.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Department</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('course-categories.index') }}"
                                class="nav-link {{ request()->routeIs('course-categories.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Department List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Programs --}}
                <li class="nav-item has-treeview {{ request()->is('course*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('course*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                            Programs
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('course.create') }}"
                                class="nav-link {{ request()->routeIs('course.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Program</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('course.index') }}"
                                class="nav-link {{ request()->routeIs('course.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Program List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Subjects --}}
                <li class="nav-item has-treeview {{ request()->is('admin/subjects*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('admin/subjects*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Subjects
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('subject.create') }}"
                                class="nav-link {{ request()->routeIs('subject.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Subject</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('subject.index') }}"
                                class="nav-link {{ request()->routeIs('subject.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Subject List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Lesson Contents --}}
                <li class="nav-item has-treeview {{ request()->is('lessons*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('lessons*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Lesson Content
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('lessons.create') }}"
                                class="nav-link {{ request()->routeIs('lessons.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Lesson</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('lessons.index') }}"
                                class="nav-link {{ request()->routeIs('lessons.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lesson List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Sections --}}
                <li class="nav-item">
                    <a href="" class="nav-link {{ request()->routeIs('sections.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-door-open"></i>
                        <p>Sections / Classes</p>
                    </a>
                </li>

                {{-- Timetable --}}
                <li class="nav-item">
                    <a href="" class="nav-link {{ request()->routeIs('timetables.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Timetable</p>
                    </a>
                </li>

                {{-- ===================== 4) PEOPLE MANAGEMENT ===================== --}}
                <li class="nav-header text-uppercase">People Management</li>

                {{-- Faculty --}}
                <li class="nav-item has-treeview {{ request()->is('teacher*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('teacher*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>
                            Faculty Members
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('teacher.create') }}"
                                class="nav-link {{ request()->routeIs('teacher.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Faculty</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('teacher.index') }}"
                                class="nav-link {{ request()->routeIs('teacher.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Faculty List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=""
                                class="nav-link {{ request()->routeIs('assign-teachers.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Assign Subjects</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Students --}}
                <li class="nav-item has-treeview {{ request()->is('students*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('students*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            Students
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('students.create') }}"
                                class="nav-link {{ request()->routeIs('students.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Student</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=""
                                class="nav-link {{ request()->routeIs('students.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Student List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=""
                                class="nav-link {{ request()->routeIs('enrollments.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Enrollment</p>
                            </a>
                        </li>
                    </ul>
                </li>


                {{-- ===================== 5) USER & ACCESS ===================== --}}
                <li class="nav-header text-uppercase">Users & Access</li>

                <li
                    class="nav-item has-treeview {{ request()->is('admin/users*') || request()->is('admin/roles*') || request()->is('admin/permissions*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/users*') || request()->is('admin/roles*') || request()->is('admin/permissions*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            User Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}"
                                class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.roles.index') }}"
                                class="nav-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Role</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.permissions.index') }}"
                                class="nav-link {{ request()->routeIs('admin.permissions.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- ===================== 6) SYSTEM ===================== --}}
                <li class="nav-header text-uppercase">System</li>

                <li class="nav-item">
                    <a href="{{ route('admin.settings.index') }}"
                        class="nav-link {{ request()->routeIs('admin.lms-settings.*') || request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>LMS Settings</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.languages.index') }}"
                        class="nav-link {{ request()->routeIs('admin.languages.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-language"></i>
                        <p>Language Management</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
