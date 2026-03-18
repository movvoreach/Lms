@extends('admin.layouts.master')

@section('title', 'Courses Management')

@push('styles')
    <style>
        /* --- LOADING OVERLAY STYLE --- */
        #loading-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(240, 239, 239, 0.8);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        #loading-overlay.active {
            display: flex !important;
        }

        /* ---------------------------- */

        .custom-input {
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            padding: 0.5rem 1rem;
            box-shadow: none;
            transition: border-color 0.2s, box-shadow 0.2s;
            margin-bottom: 15px;
        }

        .custom-input:focus {
            border-color: #4a67ff;
            box-shadow: 0 0 0 0.2rem rgba(74, 103, 255, 0.25);
            outline: none;
        }

        .required {
            color: red;
        }
    </style>
@endpush

@section('content')

    <div id="loading-overlay">
        <div class="text-center">
            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">

            </div>
        </div>
    </div>

    {{-- PAGE HEADER --}}
    <section class="content-header mt-3">
        <div class="container-fluid">
            <h1>Courses Management</h1>
        </div>
    </section>

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
        <div class="card bg-white shadow-sm m-none">
            <div class="card-body">
                <div class="input-group ">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-warning  rounded-0" ><i
                                class="fas fa-eraser"></i></button>
                    </div>
                    <input class="form-control form-control-lg custom-input" type="search" placeholder="Search"
                        aria-label="Search" id="PoliceId">
                    <div class="input-group-append">
                        <button type="button" id="BtSearch" class="btn btn-primary rounded-0"><i
                                class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- COURSE TABLE --}}
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">

        <div class="card bg-white bg-white shadow-sm  ">
            <div class="card-header">
                <div class="float-left py-2">
                    តារាងវគ្គសិក្សា <a href="/course/create"> <button type="button" class="btn btn-primary btn-xs"><i class="fas fa-plus"></i> </button></a>
                </div>

                <div class="float-right">

                    <div class="dropdown bootstrap-select" style="width: 100px;">
                        <button type="button" class="btn dropdown-toggle btn-primary" data-toggle="dropdown"
                            role="button" data-id="CalendarId" title="2024" style="width: 90px;height:40px">
                            <div class="filter-option">
                                <div class="filter-option-inner">
                                    <div class="filter-option-inner-inner">2024</div>
                                </div>
                            </div>
                        </button>
                        <div class="dropdown-menu " role="combobox">
                            <div class="inner show" role="listbox" aria-expanded="false" tabindex="-1">
                                <ul class="dropdown-menu inner show"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="TableArea">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-primary-light">
                            <tr>
                                <th class="text-center align-middle" style="width: 50px;">No</th>
                                <th scope="col" class="align-middle">Course Title</th>
                                <th scope="col" class="align-middle text-left">Description</th>
                                <th scope="col" class="align-middle text-center">Course Thumbnail</th>
                                <th scope="col" class="align-middle text-center w60">Delete</th>
                                <th scope="col" class="align-middle text-center w60">Update</th>
                                <th scope="col" class="align-middle text-center w60">More</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-dark" style="height:40px">
                                <td class="text-center align-middle">1</td>
                                <td class="align-middle font-weight-bold">
                                    Web Development Bootcamp 2026
                                    <div class="small text-muted">ID: CRS-001</div>
                                </td>
                                <td class="align-middle" style="max-width: 300px">
                                    <div class="text-truncate" title="Learn Fullstack development with Laravel and VueJS.">
                                        Learn Fullstack development with Laravel and VueJS.
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <img src="https://via.placeholder.com/80x45" alt="Thumbnail" class="img-thumbnail"
                                        style="height: 45px;">
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-danger btn-xs deleteCourse" value="1">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-primary btn-xs editCourse" value="1">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                                <td class="text-center align-middle">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-primary btn-xs" data-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button type="button" class="dropdown-item py-2">
                                                <i class="fa fa-users mr-2"></i> View Students
                                            </button>
                                            <button type="button" class="dropdown-item py-2">
                                                <i class="fa fa-chart-line mr-2"></i> Statistics
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-white border-top-0">
                    <p class="small text-muted mb-0">Showing 1 of 1 courses</p>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(function() {

            // --- TRIGGER LOADING ON SEARCH ---
            $('#BtSearch').click(function() {
                $('#loading-overlay').addClass('active');

                // Simulate search process
                setTimeout(function() {
                    $('#loading-overlay').removeClass('active');
                }, 1500);
            });
            // --------------------------------

            $('.data-table').DataTable();

            $('#addCourse, .editCourse').click(function() {
                $('#courseModal').modal('show');
            });

            $('.deleteCourse').click(function() {
                Swal.fire({
                    title: 'Delete this course?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it'
                });
            });

            $('#BtClear').click(function() {
                $('#PoliceId').val('');
            });

        });
    </script>
@endpush
