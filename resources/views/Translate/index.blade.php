@extends('admin.layouts.master')

@section('title', 'Teachers Management')

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <style>
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
    </style>
@endpush

@section('content')

    {{-- PAGE HEADER --}}
    <section class="content-header">
        <div class="container-fluid">
            <h1>Lang Management</h1>
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
                    <select class="form-control">
                        <option>All Departments</option>
                        <option>Math</option>
                        <option>Science</option>
                        <option>English</option>
                        <option>IT</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control">
                        <option>All Status</option>
                        <option>Active</option>
                        <option>Inactive</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control">
                        <option>All Designations</option>
                        <option>Lecturer</option>
                        <option>Senior Lecturer</option>
                        <option>Assistant Professor</option>
                        <option>Professor</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    {{-- TEACHER TABLE --}}
    <div class="card">

        {{-- Header --}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Languages</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">{{ db_trans('messages.dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{ db_trans('messages.language')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        {{-- Table --}}
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">All Languages</h3>
                        <a href="{{ route('admin.languages.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add New Language
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="8%" class="text-center">Flag</th>
                                    <th width="10%">Code</th>
                                    <th width="18%">Name</th>
                                    <th width="12%">Status</th>
                                    <th width="12%">Translation Keys</th>
                                    <th width="23%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($languages as $i => $lang)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>

                                        <td class="text-center" style="font-size:32px;">
                                            {{ $lang->flag ?? '🏳️' }}
                                        </td>

                                        <td>
                                            <span class="badge badge-info text-uppercase">
                                                {{ $lang->code }}
                                            </span>
                                        </td>

                                        <td>
                                            <strong>{{ $lang->name }}</strong>
                                        </td>

                                        <td>
                                            @if ($lang->is_default)
                                                <span class="badge badge-success">
                                                    <i class="fas fa-check-circle"></i> Default
                                                </span>
                                            @elseif(!$lang->is_active)
                                                <span class="badge badge-danger">
                                                    <i class="fas fa-ban"></i> Disabled
                                                </span>
                                            @else
                                                <span class="badge badge-secondary">Active</span>
                                            @endif
                                        </td>

                                        <td>
                                            <span class="badge badge-success">
                                                {{ $keyCountByLocale[$lang->code] ?? 0 }} keys
                                            </span>
                                        </td>

                                        <td>
                                            {{-- Edit Translations --}}
                                            <a href="{{ route('admin.translations.editByLocale', $lang->code) }}"
                                                class="btn btn-sm btn-info" title="Edit Translations">
                                                <i class="fas fa-edit"></i>
                                            </a>


                                            {{-- Set Default --}}
                                            @if (!$lang->is_default)
                                                <form action="{{ route('admin.languages.default', $lang->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success"
                                                        title="Set as Default">
                                                        <i class="fas fa-star"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            {{-- Delete --}}
                                            @if (!$lang->is_default)
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    onclick="deleteLanguage('{{ $lang->id }}')" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                                <form id="delete-form-{{ $lang->id }}"
                                                    action="{{ route('admin.languages.destroy', $lang->id) }}"
                                                    method="POST" style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">No languages found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            {{-- Add New Translation Key --}}
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">{{ db_trans('messages.add_new_translation_key')}}</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.translations.addKeyToAll') }}" method="POST">
                        @csrf

                        <input type="hidden" name="group" value="messages">

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="key">Translation Key</label>
                                    <input type="text" class="form-control custom-input" id="key" name="key"
                                        placeholder="e.g., dashboard" required>
                                    <small class="text-muted">Use lowercase + underscore. Example:
                                        <b>student_list</b></small>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="value">Default Value (English)</label>
                                    <input type="text" class="form-control custom-input" id="value" name="value"
                                        placeholder="e.g., Dashboard" required>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <button type="submit" class="btn btn-success btn-block">
                                        <i class="fas fa-plus"></i> Add to All
                                    </button>
                                </div>
                            </div>
                        </div>

                        <small class="text-muted">
                            <i class="fas fa-info-circle"></i>
                            This will add the translation key to all active languages (DB dynamic translation).
                        </small>
                    </form>
                </div>
            </div>

        </div>

    </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script>
        $(function() {
            $('.data-table').DataTable();
            $('.select2').select2({
                theme: 'bootstrap4'
            });

            $('#addTeacher, .editTeacher').click(function() {
                $('#teacherModal').modal('show');
            });

            $('.deleteTeacher').click(function() {
                Swal.fire({
                    title: 'Delete this teacher?',
                    icon: 'warning',
                    showCancelButton: true
                });
            });
        });
    </script>
@endpush
