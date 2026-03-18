@extends('admin.layouts.master')

@section('title', 'Students Management')

@push('styles')
<link rel="stylesheet" href="{{asset('backend')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('backend')}}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{asset('backend')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('backend')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<style>
    .custom-input {
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        padding: 0.5rem 1rem;
        margin-bottom: 15px;
    }
    .required {
        color: red;
    }
</style>
@endpush

@section('content')

{{-- PAGE HEADER --}}
<section class="content-header">
    <div class="container-fluid">
        <h1>Students Management</h1>
    </div>
</section>

{{-- FILTERS --}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Filters</h3>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-md-3">
                <select class="form-control select2bs4">
                    <option>All Courses</option>
                    <option>Computer Science</option>
                    <option>Business</option>
                    <option>Engineering</option>
                </select>
            </div>

            <div class="col-md-3">
                <select class="form-control select2bs4">
                    <option>All Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>

            <div class="col-md-3">
                <select class="form-control select2bs4">
                    <option>All Status</option>
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
            </div>

        </div>
    </div>
</div>

{{-- STUDENT TABLE --}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Student List</h3>
        <a href="/student/create" class="btn btn-primary btn-sm float-right">
            <i class="fas fa-plus"></i> Add Student
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th width="160">Action</th>
                </tr>
            </thead>
            <tbody>

                {{-- Static Data --}}
                <tr>
                    <td>1</td>
                    <td>STD-001</td>
                    <td>Chan Dara</td>
                    <td>dara@email.com</td>
                    <td>Computer Science</td>
                    <td>Male</td>
                    <td><span class="badge badge-success">Active</span></td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm">View</a>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm deleteStudent">Delete</button>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>STD-002</td>
                    <td>Sok Sreyneang</td>
                    <td>sreyneang@email.com</td>
                    <td>Business</td>
                    <td>Female</td>
                    <td><span class="badge badge-secondary">Inactive</span></td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm">View</a>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm deleteStudent">Delete</button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{asset('backend')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('backend')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('backend')}}/plugins/select2/js/select2.full.min.js"></script>
<script src="{{asset('backend')}}/plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
$(function () {

    $('.data-table').DataTable();

    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });

    $('.deleteStudent').click(function () {
        Swal.fire({
            title: 'Delete this student?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it'
        });
    });

});
</script>
@endpush
