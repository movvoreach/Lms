@extends('admin.layouts.master')

@section('title', 'Lesson Contents Management')

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
            box-shadow: 0 0 0 0.2srem rgba(74, 103, 255, 0.25);
            outline: none;
        }

        .required {
            color: red;
        }

        /* small thumbnail in table */
        .thumb {
            width: 55px;
            height: 38px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #e5e7eb;
        }
    </style>
@endpush

@section('content')

    {{-- PAGE HEADER --}}
    <section class="content-header">
        <div class="container-fluid">
            <h1>Lesson Contents Management</h1>
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
                    <label class="mb-1">Course</label>
                    <select class="form-control select2 custom-input">
                        <option value="">All Courses</option>
                        {{-- @foreach ($courses as $c)
                        <option value="{{$c->id}}">{{$c->title}}</option>
                    @endforeach --}}
                        <option>Intro to Programming</option>
                        <option>MS Access</option>
                        <option>DSA</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="mb-1">Content Type</label>
                    <select class="form-control select2 custom-input">
                        <option value="">All Types</option>
                        <option value="text">Text</option>
                        <option value="video">Video</option>
                        <option value="file">File</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="mb-1">Status</label>
                    <select class="form-control select2 custom-input">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="mb-1">Keyword</label>
                    <input type="text" class="form-control custom-input" placeholder="Search title...">
                </div>

            </div>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lesson Content List</h3>

            <a href="/lessons/create">
                <button class="btn btn-primary btn-sm float-right" id="addLesson">
                    <i class="fas fa-plus"></i> Add
                </button>
            </a>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th width="40">#</th>
                        <th width="80">Thumb</th>
                        <th>Lesson Title</th>
                        <th>Course</th>
                        <th width="90">Type</th>
                        <th width="90">Order</th>
                        <th width="120">Status</th>
                        <th width="170">Created</th>
                        <th width="160">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($lessons as $i => $l)
                        <tr>
                            <td>{{ $i + 1 }}</td>

                            <td>
                                @if ($l->thumbnail_path)
                                    <img class="thumb" src="{{ asset('storage/' . $l->thumbnail_path) }}" alt="thumb">
                                @else
                                    <img class="thumb" src="https://via.placeholder.com/120x80.png?text=No+Img"
                                        alt="thumb">
                                @endif
                            </td>

                            <td>{{ $l->lesson_title }}</td>

                            <td>{{ $l->course?->title ?? 'N/A' }}</td>

                            <td>
                                @if ($l->content_type == 'text')
                                    <span class="badge badge-info">Text</span>
                                @elseif($l->content_type == 'video')
                                    <span class="badge badge-warning">Video</span>
                                @else
                                    <span class="badge badge-dark">File</span>
                                @endif
                            </td>

                            <td>{{ $l->lesson_order ?? '-' }}</td>

                            <td>
                                @if ($l->status == 'active')
                                    <span class="badge badge-success">Active</span>
                                @elseif($l->status == 'inactive')
                                    <span class="badge badge-danger">Inactive</span>
                                @else
                                    <span class="badge badge-secondary">Draft</span>
                                @endif
                            </td>

                            <td>{{ $l->created_at?->format('Y-m-d') }}</td>

                            <td>
                                {{-- View --}}
                                <a href="{{ url('lessons/show/' . $l->id) }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>

                                {{-- Edit --}}
                                <a href="{{ url('lessons/edit/' . $l->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- Open / Download file if type=file --}}
                                @if ($l->content_type == 'file' && $l->content_file_path)
                                    <a target="_blank" href="{{ route('lessons.lesson-contents.open', $l->id) }}"
                                        class="btn btn-success btn-sm">
                                        <i class="fas fa-file"></i>
                                    </a>

                                    <a href="{{ route('lessons.lesson-contents.download', $l->id) }}"
                                        class="btn btn-primary btn-sm">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <a href="{{ route('lessons.show', $l->id) }}" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">No lesson contents found.</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
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

            $('.data-table').DataTable({
                pageLength: 10,
                responsive: true
            });

            $('.select2').select2({
                theme: 'bootstrap4',
                width: '100%'
            });

            $('#addLesson, .editLesson').click(function() {
                $('#lessonModal').modal('show');
            });

            $('.deleteLesson').click(function() {
                const id = $(this).data('id');
                Swal.fire({
                    title: 'Delete this lesson content?',
                    text: 'This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // TODO: submit delete form or ajax
                        // $('#deleteForm-'+id).submit();
                    }
                });
            });

        });
    </script>
@endpush
