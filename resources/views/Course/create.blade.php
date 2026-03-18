@extends('admin.layouts.master')

@section('title', 'Course Create')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <style>
        .required {
            color: red;
            font-weight: bold;
        }

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

        .thumbnail-preview {
            width: 240px;
            height: 150px;
            border: 2px dashed #ced4da;
            border-radius: 8px;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            overflow: hidden;
            transition: all 0.2s;
        }

        .thumbnail-preview:hover {
            border-color: #4a67ff;
            background: #eef1ff;
        }

        .thumbnail-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .thumbnail-preview span {
            color: #6c757d;
            text-align: center;
            font-size: 14px;
        }
    </style>
@endpush

@section('content')

    <div class="row mt-4 shadow-sm">
        <div class="col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Create Course</h2>
                <hr>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="">Course List</a></li>
                        <li class="breadcrumb-item active">Create Course</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="card bg-white shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Course Information</h3>

            {{-- Quick add category button --}}

        </div>

      <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="row">

                    {{-- Category --}}
                    <div class="col-md-6">
                        <label>Department <span class="required">*</span></label>
                        <select name="category_id" class="form-control custom-input select2" required>

                            <option value="">-- Select Department --</option>

                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    {{-- Title --}}
                    <div class="col-md-6">
                        <label>Course Title <span class="required">*</span></label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control custom-input"
                            placeholder="Enter course title" required>
                    </div>

                    {{-- Course Code --}}
                    <div class="col-md-6 mt-3">
                        <label>Course Code</label>
                        <input type="text" name="code" value="{{ old('code') }}" class="form-control custom-input"
                            placeholder="Example: CS101">
                    </div>

                    {{-- Duration --}}
                    <div class="col-md-6 mt-3">
                        <label>Duration (Hours)</label>
                        <input type="number" name="duration_hours" value="{{ old('duration_hours') }}"
                            class="form-control custom-input" placeholder="e.g. 40">
                    </div>

                    {{-- Fee --}}
                    <div class="col-md-6 mt-3">
                        <label>Course Fee ($)</label>
                        <input type="number" step="0.01" name="fee" value="{{ old('fee') }}"
                            class="form-control custom-input" placeholder="0.00">
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6 mt-3">
                        <label>Status</label>
                        <select name="is_active" class="form-control custom-input">
                            <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    {{-- Description --}}
                    <div class="col-md-12 mt-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control custom-input" rows="4">{{ old('description') }}</textarea>
                    </div>
                    {{-- Start Date --}}
                    <div class="col-md-6 mt-3">
                        <label>Start Date</label>
                        <input type="date" name="start_date" value="{{ old('start_date') }}"
                            class="form-control custom-input">
                        @error('start_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- End Date --}}
                    <div class="col-md-6 mt-3">
                        <label>End Date</label>
                        <input type="date" name="end_date" value="{{ old('end_date') }}"
                            class="form-control custom-input">
                        @error('end_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- Thumbnail --}}
                    <div class="col-md-6 mt-4">
                        <label>Course Thumbnail <span class="required">*</span></label>

                        <div class="thumbnail-preview" onclick="document.getElementById('thumbnail').click()">
                            <span id="thumbnailText">
                                <i class="fas fa-image fa-2x"></i><br>
                                Click to upload image
                            </span>
                            <img id="thumbnailPreview" style="display:none;">
                        </div>

                        <input type="file" name="thumbnail" id="thumbnail" class="d-none" accept="image/*" required>
                    </div>

                </div>
            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary px-4">
                    <i class="fas fa-save"></i> Create Course
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

            // Select2
            $('.select2').select2({
                theme: 'bootstrap4',
                placeholder: '-- Select Category --',
                allowClear: true
            });

            // Thumbnail Preview
            $('#thumbnail').on('change', function(e) {
                const file = e.target.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#thumbnailPreview').attr('src', e.target.result).show();
                    $('#thumbnailText').hide();
                };
                reader.readAsDataURL(file);
            });

        });
    </script>
@endpush
