@extends('admin.layouts.master')

@section('title', db_trans('messages.create_teacher'))

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <style>
        .content-wrapper * { font-family: 'Battambang', sans-serif !important; }

        .required { color: red; font-weight: bold; }

        .custom-input {
            border: 1px solid #ced4da;
            border-radius: 6px;
            padding: 0.6rem 1rem;
            transition: border-color 0.2s, box-shadow 0.2s;
            margin-bottom: 10px;
        }

        .custom-input:focus {
            border-color: #1f7ae0;
            box-shadow: 0 0 0 0.2rem rgba(31, 122, 224, 0.25);
            outline: none;
        }

        .card-title { font-weight: 600; }
    </style>
@endpush

@section('content')

    <div class="row mt-5">
        <div class="col-12">
            <div class="page-header mt-2">
                <h2 class="pageheader-title">{{ db_trans('messages.create_teacher') }}</h2>
                <hr>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/dashboard">{{ db_trans('messages.home') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('teacher.index') }}">{{ db_trans('messages.teacher_list') }}</a>
                        </li>
                        <li class="breadcrumb-item active">
                            {{ db_trans('messages.create_teacher') }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title">{{ db_trans('messages.teacher_information') }}</h3>
        </div>

        <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- ✅ AUTO ROLE TEACHER (no select role) --}}
            <input type="hidden" name="role" value="teacher">

            <div class="card-body">
                <div class="row">

                    {{-- Teacher ID --}}
                    <div class="col-md-6">
                        <label>
                            {{ db_trans('messages.teacher_id') }}
                            <span class="required">*</span>
                        </label>

                        <input type="text" name="teacher_id"
                               class="form-control custom-input"
                               value="{{ old('teacher_id', $nextTeacherId ?? '') }}"
                               readonly required>

                        {{-- ✅ FIX: correct error key --}}
                        @error('teacher_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Full Name --}}
                    <div class="col-md-6">
                        <label>
                            {{ db_trans('messages.full_name') }}
                            <span class="required">*</span>
                        </label>

                        <input type="text" name="name"
                               value="{{ old('name') }}"
                               class="form-control custom-input"
                               placeholder="{{ db_trans('messages.enter_full_name') }}"
                               required>

                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6 mt-3">
                        <label>
                            {{ db_trans('messages.email') }}
                            <span class="required">*</span>
                        </label>

                        <input type="email" name="email"
                               value="{{ old('email') }}"
                               class="form-control custom-input"
                               placeholder="example@email.com"
                               required>

                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="col-md-6 mt-3">
                        <label>
                            {{ db_trans('messages.password') }}
                            <span class="required">*</span>
                        </label>

                        <input type="password" name="password"
                               class="form-control custom-input"
                               placeholder="********"
                               required>

                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Course --}}
                    <div class="col-md-6 mt-3">
                        <label>
                            {{ db_trans('messages.course') }}
                            <span class="required">*</span>
                        </label>

                        <select name="course" class="form-control custom-input select2bs4" required>
                            <option value="">{{ db_trans('messages.select_course') }}</option>
                            <option value="computer_science" {{ old('course') == 'computer_science' ? 'selected' : '' }}>
                                វិទ្យាសាស្ត្រកុំព្យូទ័រ
                            </option>
                            <option value="math" {{ old('course') == 'math' ? 'selected' : '' }}>
                                គណិតវិទ្យា
                            </option>
                            <option value="english" {{ old('course') == 'english' ? 'selected' : '' }}>
                                ភាសាអង់គ្លេស
                            </option>
                            <option value="physics" {{ old('course') == 'physics' ? 'selected' : '' }}>
                                រូបវិទ្យា
                            </option>
                        </select>

                        @error('course')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Experience --}}
                    <div class="col-md-6 mt-3">
                        <label>{{ db_trans('messages.experience') }}</label>

                        <select name="experience" class="form-control custom-input select2bs4">
                            <option value="">{{ db_trans('messages.select') ?? '--Select--' }}</option>
                            <option value="1_year" {{ old('experience') == '1_year' ? 'selected' : '' }}>១ ឆ្នាំ</option>
                            <option value="2_year" {{ old('experience') == '2_year' ? 'selected' : '' }}>២ ឆ្នាំ</option>
                            <option value="3_year" {{ old('experience') == '3_year' ? 'selected' : '' }}>៣ ឆ្នាំ</option>
                            <option value="5_plus" {{ old('experience') == '5_plus' ? 'selected' : '' }}>៥+ ឆ្នាំ</option>
                        </select>

                        @error('experience')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Education --}}
                    <div class="col-md-6 mt-3">
                        <label>{{ db_trans('messages.education') }}</label>

                        <select name="education" class="form-control custom-input select2bs4">
                            <option value="">{{ db_trans('messages.select') ?? '--Select--' }}</option>
                            <option value="bachelor" {{ old('education') == 'bachelor' ? 'selected' : '' }}>
                                បរិញ្ញាបត្រ
                            </option>
                            <option value="master" {{ old('education') == 'master' ? 'selected' : '' }}>
                                អនុបណ្ឌិត
                            </option>
                            <option value="phd" {{ old('education') == 'phd' ? 'selected' : '' }}>
                                បណ្ឌិត (PhD)
                            </option>
                        </select>

                        @error('education')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Skill --}}
                    <div class="col-md-6 mt-3">
                        <label>{{ db_trans('messages.skill') }}</label>

                        <input type="text" name="skills"
                               value="{{ old('skills') }}"
                               class="form-control custom-input"
                               placeholder="Laravel, PHP, Networking">

                        @error('skills')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Contact --}}
                    <div class="col-md-6 mt-3">
                        <label>{{ db_trans('messages.contact') }}</label>

                        <input type="text" name="contact"
                               value="{{ old('contact') }}"
                               class="form-control custom-input"
                               placeholder="012 345 678">

                        @error('contact')
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
                                  placeholder="{{ db_trans('messages.additional_info') }}">{{ old('note') }}</textarea>

                        @error('note')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="card-footer text-center">
                <a href="{{ route('teacher.index') }}" class="btn btn-danger">
                    {{ db_trans('messages.Cancel') }}
                </a>

                <button type="submit" class="btn btn-primary">
                    {{ db_trans('messages.create_teacher') }}
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
