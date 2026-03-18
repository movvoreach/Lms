@extends('admin.layouts.master')

@section('title','Manage Teachers')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">



<style>
    .content-wrapper, .content-wrapper *{
        font-family:'Battambang', sans-serif !important;
    }
    .teacher-avatar{
        width:38px;height:38px;border-radius:50%;
        object-fit:cover;border:2px solid #e9ecef;
    }
</style>
@endpush

@section('content')

{{-- Content Header --}}
<section class="content-header mt-4">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> <i class="nav-icon fas fa-chalkboard-teacher"></i> Manage Teachers</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Teachers</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">

    {{-- Stats Overview (like Users style) --}}


    {{-- Table Card --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Teacher List</h3>
            <div class="card-tools">
                <a href="{{ route('teacher.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Add New Teacher
                </a>
            </div>
        </div>

        <div class="card-body">
            <table id="teachersTable" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th width="60">#</th>
                        <th width="80">Photo</th>
                        <th width="120">Teacher ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th width="130">Education</th>
                        <th width="130">Experience</th>
                        <th width="150">Created At</th>
                        <th width="120">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($teachers as $index => $teacher)
                        @php
                            $profile = $teacher->teacher;

                            $img = $profile?->profile_image
                                ? asset('storage/'.$profile->profile_image)
                                : asset('backend/dist/img/user2-160x160.jpg');

                            $teacherCode = $profile?->teacher_code ?? $teacher->teacher_id ?? '-';

                            // badge for role (always teacher)
                            $roleBadge = 'badge-primary';
                        @endphp

                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td class="text-center">
                                <img src="{{ $img }}" class="teacher-avatar" alt="Teacher">
                            </td>

                            <td>{{ $teacherCode }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $profile->education ?? '-' }}</td>
                            <td>{{ $profile->experience ?? '-' }}</td>
                            <td>{{ $teacher->created_at?->format('Y-m-d H:i') }}</td>

                            <td>
                                <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('teacher.destroy', $teacher->id) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this teacher?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">No teachers found.</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</section>
@endsection

@push('scripts')
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script>
$(function(){
    $('#teachersTable').DataTable({
        responsive: true,
        pageLength: 10,
        lengthMenu: [5,10,25,50,100],
        order: [[0,'desc']]
    });
});
</script>
@endpush
