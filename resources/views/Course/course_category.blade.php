@extends('admin.layouts.master')
@section('title', 'Create Course Category')
@push('styles')
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


    </style>
@endpush
@section('content')

<div class="row mt-4 shadow-sm">
    <div class="col-12">
        <h2>Create Course Category</h2>
        <hr>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between">
        <h3 class="card-title mb-0">Category Information</h3>
        <a href="" class="btn btn-sm btn-secondary">
            Back
        </a>
    </div>

   <form action="{{ route('course-categories.store') }}" method="POST">
    @csrf

        <div class="card-body">

            {{-- Name --}}
            <div class="form-group">
                <label>Department Name <span class="text-danger">*</span></label>
                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       class="form-control custom-input"
                       placeholder="e.g. Programming"
                       required>

                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Description --}}
            <div class="form-group">
                <label>Description</label>
                <textarea name="description"
                          class="form-control custom-input"
                          rows="3"
                          placeholder="Optional..." ></textarea>
            </div>

            {{-- Status --}}
            <div class="form-group">
                <label>Status</label>
                <select name="is_active" class="form-control custom-input">
                    <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>
                        Active
                    </option>
                    <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>
                        Inactive
                    </option>
                </select>
            </div>

        </div>

        <div class="card-footer text-right">
            <button class="btn btn-primary">
                <i class="fas fa-save"></i> Save Category
            </button>
        </div>
    </form>
</div>

@endsection
