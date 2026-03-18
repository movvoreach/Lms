@extends('admin.layouts.master')

@section('title', db_trans('messages.dashboard'))
<style>
    /* ================================
   DASHBOARD KHMER FONT STYLE
================================ */

    /* Apply Battambang to dashboard content */
    .content-wrapper,
    .content-wrapper h1,
    .content-wrapper h2,
    .content-wrapper h3,
    .content-wrapper h4,
    .content-wrapper h5,
    .content-wrapper h6,
    .content-wrapper p,
    .content-wrapper span,
    .content-wrapper a,
    .content-wrapper table,
    .content-wrapper th,
    .content-wrapper td {
        font-family: 'Battambang', sans-serif !important;
    }

    /* Make dashboard titles slightly bold */
    .content-wrapper h1,
    .content-wrapper .card-title {
        font-weight: 600;
    }

    /* Small-box numbers cleaner */
    .small-box .inner h3 {
        font-weight: 500;
    }

    /* Breadcrumb font */
    .breadcrumb {
        font-family: 'Battambang', sans-serif !important;
    }
</style>

@section('content')

        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content mt-4">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">LMS Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <!-- Filter Section -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card card-outline card-primary collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-filter"></i> Filter Data</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body" style="display: none;">
                            <form action="#" method="GET" id="filterForm">
                                <div class="row">

                                    <!-- Quick Date Presets -->
                                    <div class="col-md-12 mb-3">
                                        <label>Quick Date Range</label>
                                        <div class="btn-group btn-group-sm d-flex" role="group">
                                            <button type="button" class="btn btn-outline-primary quick-date" data-range="today">Today</button>
                                            <button type="button" class="btn btn-outline-primary quick-date" data-range="week">This Week</button>
                                            <button type="button" class="btn btn-outline-primary quick-date" data-range="month">This Month</button>
                                            <button type="button" class="btn btn-outline-primary quick-date" data-range="last_month">Last Month</button>
                                            <button type="button" class="btn btn-outline-primary quick-date" data-range="year">This Year</button>
                                            <button type="button" class="btn btn-outline-secondary" id="clearDates">Clear</button>
                                        </div>
                                    </div>

                                    <!-- Custom Date Range -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="date_from">Date From</label>
                                            <div class="input-group input-group-sm">
                                                <input type="text" class="form-control form-control-sm"
                                                       id="date_from" name="date_from"
                                                       placeholder="YYYY-MM-DD">
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="date_to">Date To</label>
                                            <div class="input-group input-group-sm">
                                                <input type="text" class="form-control form-control-sm"
                                                       id="date_to" name="date_to"
                                                       placeholder="YYYY-MM-DD">
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Enrollment Status Filter -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="enroll_status">Enrollment Status</label>
                                            <select class="form-control form-control-sm" id="enroll_status" name="enroll_status">
                                                <option value="">All Status</option>
                                                <option value="pending">Pending</option>
                                                <option value="active">Active</option>
                                                <option value="completed">Completed</option>
                                                <option value="cancelled">Cancelled</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Course Category Filter -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="category">Course Category</label>
                                            <select class="form-control form-control-sm" id="category" name="category">
                                                <option value="">All Categories</option>
                                                <option value="web">Web Development</option>
                                                <option value="network">Networking</option>
                                                <option value="design">Graphic Design</option>
                                                <option value="english">English</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fas fa-search"></i> Apply Filter
                                        </button>
                                        <a href="#" class="btn btn-secondary btn-sm">
                                            <i class="fas fa-redo"></i> Reset
                                        </a>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Statistics Cards Row 1 -->
            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>24</h3>
                            <p>Total Courses</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>18</h3>
                            <p>Active Courses</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>320</h3>
                            <p>Total Students</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>67%</h3>
                            <p>Completion Rate</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-percentage"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Statistics Cards Row 2 -->
            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-primary"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Enrollments</span>
                            <span class="info-box-number">540</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-user-plus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">New Students Today</span>
                            <span class="info-box-number">7</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="fas fa-chalkboard-teacher"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Teachers</span>
                            <span class="info-box-number">15</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fas fa-dollar-sign"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Month Revenue</span>
                            <span class="info-box-number">$1,250.00</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Main Content Row -->
            <div class="row">

                <!-- Recent Enrollments -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="fas fa-list mr-1"></i>
                                Recent Enrollments
                            </h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i> View All
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                    <tr>
                                        <th>Student</th>
                                        <th>Course</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Mov Vo Reach</td>
                                        <td>Laravel 12 - POS System</td>
                                        <td>Feb 22, 2026</td>
                                        <td><span class="badge badge-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>Sok Dara</td>
                                        <td>Networking (VLAN + Routing)</td>
                                        <td>Feb 20, 2026</td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>Chanthy</td>
                                        <td>Flutter Firebase E-Commerce</td>
                                        <td>Feb 18, 2026</td>
                                        <td><span class="badge badge-info">Completed</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Upcoming Live Classes -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="fas fa-calendar-day mr-1"></i>
                                Upcoming Live Classes
                            </h3>
                            <div class="card-tools">
                                <span class="badge badge-info">Next 7 Days</span>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                    <tr>
                                        <th>Course</th>
                                        <th>Teacher</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Laravel 12 - POS System</td>
                                        <td>Mr. Bunleng</td>
                                        <td>Mar 01, 2026</td>
                                        <td>7:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>Networking (VLAN + Routing)</td>
                                        <td>Ms. Sreyneang</td>
                                        <td>Mar 03, 2026</td>
                                        <td>6:30 PM</td>
                                    </tr>
                                    <tr>
                                        <td>Flutter Firebase E-Commerce</td>
                                        <td>Mr. Vuthy</td>
                                        <td>Mar 05, 2026</td>
                                        <td>8:00 PM</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Chart + Stats Row -->
            <div class="row">

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-line mr-1"></i>
                                    Enrollment Trend
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="enrollmentChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display:block;"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Learning Statistics
                            </h3>
                        </div>
                        <div class="card-body">

                            <div class="info-box mb-3 bg-info">
                                <span class="info-box-icon"><i class="fas fa-book-open"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Lessons</span>
                                    <span class="info-box-number">210</span>
                                </div>
                            </div>

                            <div class="info-box mb-3 bg-success">
                                <span class="info-box-icon"><i class="fas fa-certificate"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Certificates Issued</span>
                                    <span class="info-box-number">95</span>
                                </div>
                            </div>

                            <div class="info-box bg-warning">
                                <span class="info-box-icon"><i class="fas fa-clock"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pending Reviews</span>
                                    <span class="info-box-number">12</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <!-- Quick Actions -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-bolt mr-1"></i>
                                Quick Actions
                            </h3>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-3 col-6">
                                    <a href="#" class="btn btn-app bg-primary">
                                        <i class="fas fa-plus"></i> New Course
                                    </a>
                                </div>

                                <div class="col-md-3 col-6">
                                    <a href="#" class="btn btn-app bg-success">
                                        <i class="fas fa-user-plus"></i> Add Student
                                    </a>
                                </div>

                                <div class="col-md-3 col-6">
                                    <a href="#" class="btn btn-app bg-info">
                                        <i class="fas fa-video"></i> Live Classes
                                    </a>
                                </div>

                                <div class="col-md-3 col-6">
                                    <a href="#" class="btn btn-app bg-warning">
                                        <i class="fas fa-chart-bar"></i> Reports
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
</section>
        <!-- /.content -->


@endsection
