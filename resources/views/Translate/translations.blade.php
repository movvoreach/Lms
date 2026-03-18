@extends('admin.layouts.master')

@section('title', 'Edit Translations')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <style>
        .sticky-head {
            position: sticky;
            top: 0;
            background: #fff;
            z-index: 10;
        }
    </style>
@endpush

@section('content')
        <div class="content-header​ mt-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            Edit Translations - {{ $language->name }}
                            <span class="badge badge-info text-uppercase">{{ $language->code }}</span>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.languages.index') }}">Languages</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('admin.translations.updateByLocale', $language->code) }}" method="POST">
                    @csrf

                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Translation Keys & Values</h3>
                                <input type="text" id="searchKeys" class="form-control form-control-sm"
                                    placeholder="Search keys..." style="width: 300px;">
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                                <table class="table table-bordered table-striped table-hover" id="translationsTable">
                                    <thead class="sticky-head">
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="35%">Key</th>
                                            <th width="60%">Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($translations as $i => $t)
                                            <tr class="translation-row" data-key="{{ strtolower($t->key) }}">
                                                <td>{{ $i + 1 }}</td>
                                                <td>
                                                    <code>{{ $t->group }}.{{ $t->key }}</code>
                                                    <div class="text-muted small">Locale: {{ $t->locale }}</div>
                                                </td>
                                                <td>
                                                    {{-- ✅ Save by ID --}}
                                                    <input type="text" class="form-control"
                                                        name="translations[{{ $t->id }}]"
                                                        value="{{ $t->value }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save Translations
                            </button>
                            <a href="{{ route('admin.languages.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back to Languages
                            </a>
                            <span class="float-right text-muted">
                                <strong>{{ $translations->count() }}</strong> translation keys
                            </span>
                        </div>
                    </div>
                </form>

                {{-- Stats --}}
                <div class="row">
                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="fas fa-key"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Keys</span>
                                <span class="info-box-number">{{ $translations->count() }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="fas fa-language"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Language</span>
                                <span class="info-box-number text-uppercase">{{ $language->code }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning"><i class="fas fa-file-code"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Source</span>
                                <span class="info-box-number" style="font-size: 14px;">DB Translations</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        // Simple search filter
        document.getElementById('searchKeys').addEventListener('keyup', function() {
            const q = this.value.toLowerCase().trim();
            document.querySelectorAll('.translation-row').forEach(row => {
                const key = row.getAttribute('data-key') || '';
                row.style.display = key.includes(q) ? '' : 'none';
            });
        });
    </script>
@endpush
