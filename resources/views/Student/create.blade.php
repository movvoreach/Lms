@extends('admin.layouts.master')

@section('title', db_trans('messages.student_create'))

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <style>
        .required {
            color: red;
            font-weight: bold;
        }

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
            box-shadow: 0 0 0 0.2rem rgba(74, 103, 255, .25);
            outline: none;
        }
    </style>
@endpush

@section('content')

    <div class="row mt-5">
        <div class="col-12">
            <div class="page-header mt-2">
                <h2 class="pageheader-title">{{ db_trans('messages.create_student') }}</h2>
                <hr>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/dashboard" class="breadcrumb-link">{{ db_trans('messages.home') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('students.list') }}"
                                    class="breadcrumb-link">{{ db_trans('messages.student_list') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ db_trans('messages.create_student') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm p-3 mb-3 bg-body-tertiary rounded">
        <div class="card-header">
            <h3 class="card-title">{{ db_trans('messages.student_information') }}</h3>
        </div>

        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- ✅ AUTO ROLE STUDENT (not selectable) --}}
            <input type="hidden" name="role" value="student">

            <div class="card-body">
                <div class="row">

                    {{-- Student ID --}}
                    <div class="col-md-6">
                        <label>{{ db_trans('messages.student_id') }} <span class="required">*</span></label>

                        {{-- ✅ show code from controller --}}
                        <input type="text" class="form-control custom-input"
                            value="{{ old('student_code', $studentCode ?? '') }}" readonly>

                        {{-- ✅ send to controller --}}
                        <input type="hidden" name="student_code" value="{{ old('student_code', $studentCode ?? '') }}">

                        @error('student_code')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Full Name --}}
                    <div class="col-md-6">
                        <label>{{ db_trans('messages.full_name') }} <span class="required">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control custom-input"
                            placeholder="{{ db_trans('messages.enter_full_name') }}" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6 mt-3">
                        <label>{{ db_trans('messages.email') }} <span class="required">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control custom-input"
                            placeholder="{{ db_trans('messages.enter_email') }}" required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="col-md-6 mt-3">
                        <label>{{ db_trans('messages.password') }} <span class="required">*</span></label>
                        <input type="password" name="password" class="form-control custom-input"
                            placeholder="{{ db_trans('messages.enter_password') }}" required>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Gender --}}
                    <div class="col-md-6 mt-3">
                        <label>{{ db_trans('messages.gender') }} <span class="required">*</span></label>
                        <select name="gender" class="form-control custom-input" required>
                            <option value="">{{ db_trans('messages.select_gender') }}</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>
                                {{ db_trans('messages.male') }}</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                {{ db_trans('messages.female') }}</option>
                        </select>
                        @error('gender')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Course --}}
                    <div class="col-md-6 mt-3">
                        <label>{{ db_trans('messages.course') }} <span class="required">*</span></label>

                        <select name="course" class="form-control custom-input select2bs4" required>
                            <option value="">{{ db_trans('messages.select_course') }}</option>

                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}"
                                    {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                    {{ $course->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('course')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Class / Batch --}}
                    <div class="col-md-6 mt-3">
                        <label>{{ db_trans('messages.class_batch') }}</label>
                        <input type="text" name="class_batch" value="{{ old('class_batch') }}"
                            class="form-control custom-input" placeholder="{{ db_trans('messages.enter_class_batch') }}">
                        @error('class_batch')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Date of Birth --}}
                    <div class="col-md-6 mt-3">
                        <label>{{ db_trans('messages.date_of_birth') }}</label>
                        <input type="date" name="dob" value="{{ old('dob') }}" class="form-control custom-input">
                        @error('dob')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Contact --}}
                    <div class="col-md-6 mt-3">
                        <label>{{ db_trans('messages.contact') }}</label>
                        <input type="text" name="contact" value="{{ old('contact') }}" class="form-control custom-input"
                            placeholder="{{ db_trans('messages.enter_contact') }}">
                        @error('contact')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Address --}}
                    <div class="col-md-6 mt-3">
                        <label>{{ db_trans('messages.address') }}</label>
                        <input type="text" name="address" value="{{ old('address') }}"
                            class="form-control custom-input" placeholder="{{ db_trans('messages.enter_address') }}">
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Profile Image --}}
                    <div class="col-md-6 mt-3">
                        <label>{{ db_trans('messages.profile_image') }}</label>
                        <input type="file" name="profile_image" class="form-control">
                        @error('profile_image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Note --}}
                    <div class="col-md-12 mt-3">
                        <label>{{ db_trans('messages.note') }}</label>
                        <textarea name="note" class="form-control custom-input" rows="3"
                            placeholder="{{ db_trans('messages.additional_information') }}">{{ old('note') }}</textarea>
                        @error('note')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="card-footer text-right">
                <a href="{{ route('students.list') }}" class="btn btn-danger">
                    {{ db_trans('messages.Cancel') ?? 'Cancel' }}
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ db_trans('messages.create_student') }}
                </button>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('backend') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>
    <script>
        $(function() {
            $('.select2bs4').select2({
                theme: 'bootstrap4',
                width: '100%'
            });
        });
    </script>
@endpush
