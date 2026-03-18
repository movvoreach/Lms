@extends('admin.layouts.master')

@section('title', 'Subject Create')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <style>
        .required { color: red; font-weight: bold; }

        .custom-input {
            border: 1px solid #ced4da;
            border-radius: 6px;
            padding: 10px 15px;
            transition: all 0.2s;
            margin-bottom: 15px;
        }

        .custom-input:focus {
            border-color: #4a67ff;
            box-shadow: 0 0 0 0.2rem rgba(74, 103, 255, 0.25);
            outline: none;
        }
    </style>
@endpush

@section('content')

    <div class="row mt-4 shadow-sm">
        <div class="col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Create Subject</h2>
                <hr>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="">Subject List</a></li>
                        <li class="breadcrumb-item active">Create Subject</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="card bg-white shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Subject Information</h3>
        </div>

        {{-- IMPORTANT:
            - Pass $courses from controller (Course::orderBy('title')->get())
            - Route name should be subject.store
        --}}
        <form action="{{ route('subject.store') }}" method="POST">
            @csrf

            <div class="card-body">
                <div class="row">

                    {{-- Course --}}
                    <div class="col-md-6">
                        <label>Course <span class="required">*</span></label>
                        <select name="course_id" class="form-control custom-input select2" required>
                            <option value="">-- Select Course --</option>

                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                    {{ $course->title }} @if(!empty($course->code)) ({{ $course->code }}) @endif
                                </option>
                            @endforeach
                        </select>

                        @error('course_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Subject Name --}}
                    <div class="col-md-6">
                        <label>Subject Name <span class="required">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control custom-input"
                               placeholder="Enter subject name" required>

                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Subject Code --}}
                    <div class="col-md-6 mt-3">
                        <label>Subject Code</label>
                        <input type="text" name="code" value="{{ old('code') }}" class="form-control custom-input"
                               placeholder="Example: DB101">

                        @error('code')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Credit / Hours --}}
                    <div class="col-md-6 mt-3">
                        <label>Credit / Hours</label>
                        <input type="number" name="credit" value="{{ old('credit') }}" class="form-control custom-input"
                               placeholder="e.g. 3">

                        @error('credit')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6 mt-3">
                        <label>Status</label>
                        <select name="is_active" class="form-control custom-input">
                            <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>

                        @error('is_active')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="col-md-12 mt-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control custom-input" rows="4"
                                  placeholder="Subject description...">{{ old('description') }}</textarea>

                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary px-4">
                    <i class="fas fa-save"></i> Create Subject
                </button>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('backend') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>

    <script>
        $(function () {
            $('.select2').select2({
                theme: 'bootstrap4',
                placeholder: '-- Select Course --',
                allowClear: true
            });
        });
    </script>
@endpush
