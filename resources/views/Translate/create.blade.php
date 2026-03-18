@extends('admin.layouts.master')

@section('title', 'Add New Language')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
@endpush

@section('content')


    <div class="content-header mt-3">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add New Language</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.languages.index') }}">Languages</a></li>
                        <li class="breadcrumb-item active">Add New</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.languages.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Language Information</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="code">Language Code <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control @error('code') is-invalid @enderror"
                                           id="code"
                                           name="code"
                                           value="{{ old('code') }}"
                                           placeholder="e.g., en, km, fr, zh"
                                           required>
                                    <small class="text-muted">ISO 639-1 language code (2 letters)</small>
                                    @error('code') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name">Language Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           id="name"
                                           name="name"
                                           value="{{ old('name') }}"
                                           placeholder="e.g., English, Khmer"
                                           required>
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="flag">Flag Emoji</label>
                                    <input type="text"
                                           class="form-control @error('flag') is-invalid @enderror"
                                           id="flag"
                                           name="flag"
                                           value="{{ old('flag') }}"
                                           placeholder="e.g., 🇬🇧 🇰🇭 🇫🇷">
                                    <small class="text-muted">Optional: Add a flag emoji for visual identification</small>
                                    @error('flag') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="direction">Direction</label>
                                    <select name="direction" id="direction" class="form-control">
                                        <option value="ltr" {{ old('direction','ltr')=='ltr'?'selected':'' }}>LTR</option>
                                        <option value="rtl" {{ old('direction')=='rtl'?'selected':'' }}>RTL</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="sort_order">Sort Order</label>
                                    <input type="number"
                                           class="form-control @error('sort_order') is-invalid @enderror"
                                           id="sort_order"
                                           name="sort_order"
                                           value="{{ old('sort_order',0) }}"
                                           min="0">
                                    @error('sort_order') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1"
                                           {{ old('is_active',1) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Active</label>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Create Language
                                </button>

                                <a href="{{ route('admin.languages.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Cancel
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Right side info --}}
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-info">
                                    <h5><i class="icon fas fa-info-circle"></i> How it works</h5>
                                    <p>The new language will be created based on the default language template.</p>
                                    <p>All translation keys will be copied with default values, then you can edit them.</p>
                                </div>

                                <h6>Common Language Codes</h6>
                                <table class="table table-sm">
                                    <tbody>
                                    <tr><td>🇬🇧 English</td><td><code>en</code></td></tr>
                                    <tr><td>🇰🇭 Khmer</td><td><code>km</code></td></tr>
                                    <tr><td>🇫🇷 French</td><td><code>fr</code></td></tr>
                                    <tr><td>🇨🇳 Chinese</td><td><code>zh</code></td></tr>
                                    <tr><td>🇯🇵 Japanese</td><td><code>ja</code></td></tr>
                                    <tr><td>🇰🇷 Korean</td><td><code>ko</code></td></tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </section>
</div>
@endsection
