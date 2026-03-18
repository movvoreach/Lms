@extends('admin.layouts.master')

@section('title', db_trans('messages.lesson_content_create'))

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <style>
        .required { color:red; font-weight:bold; }
        .custom-input{
            border:1px solid #ced4da;border-radius:6px;padding:10px 15px;
            transition:all .2s;margin-bottom:15px;
        }
        .custom-input:focus{
            border-color:#4a67ff;box-shadow:0 0 0 .2rem rgba(74,103,255,.25);outline:none;
        }
        .thumbnail-preview{
            width:240px;height:150px;border:2px dashed #ced4da;border-radius:8px;background:#f8f9fa;
            display:flex;align-items:center;justify-content:center;cursor:pointer;overflow:hidden;transition:all .2s;
        }
        .thumbnail-preview:hover{ border-color:#4a67ff;background:#eef1ff; }
        .thumbnail-preview img{ width:100%;height:100%;object-fit:cover; }
        .thumbnail-preview span{ color:#6c757d;text-align:center;font-size:14px; }
    </style>
@endpush

@section('content')

    <div class="row mt-4 shadow-sm">
        <div class="col-12">
            <div class="page-header">
                <h2 class="pageheader-title">{{ db_trans('messages.create_lesson_content') }}</h2>
                <hr>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{ db_trans('messages.home') }}</a></li>
                        <li class="breadcrumb-item"><a href="/course/list">{{ db_trans('messages.course_list') }}</a></li>
                        <li class="breadcrumb-item"><a href="/lessons">{{ db_trans('messages.lesson_contents') }}</a></li>
                        <li class="breadcrumb-item active">{{ db_trans('messages.create_lesson_content') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="card bg-white shadow-sm">
        <div class="card-header">
            <h3 class="card-title">{{ db_trans('messages.lesson_content_information') }}</h3>
        </div>

        <form action="{{ route('lessons.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="row">

                    {{-- Select Course --}}
                    <div class="col-md-6">
                        <label>{{ db_trans('messages.select_course') }} <span class="required">*</span></label>
                        <select name="course_id" class="form-control custom-input select2" required>
                            <option value="">{{ db_trans('messages.choose_course') }}</option>
                            @isset($courses)
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>

                    {{-- Lesson Title --}}
                    <div class="col-md-6">
                        <label>{{ db_trans('messages.lesson_title') }} <span class="required">*</span></label>
                        <input type="text" name="lesson_title" class="form-control custom-input"
                               placeholder="{{ db_trans('messages.enter_lesson_title') }}" required>
                    </div>
                    {{-- Unit Title --}}
<div class="col-md-6 mt-3">
    <label>{{ db_trans('messages.unit_title') }}</label>
    <input type="text" name="unit_title"
           class="form-control custom-input"
           placeholder="Unit 4: Possessions">
</div>

{{-- Unit Order --}}
<div class="col-md-6 mt-3">
    <label>{{ db_trans('messages.unit_order') }}</label>
    <input type="number" name="unit_order"
           class="form-control custom-input"
           placeholder="4">
</div>

                    {{-- Content Type --}}
                    <div class="col-md-6 mt-3">
                        <label>{{ db_trans('messages.content_type') }} <span class="required">*</span></label>
                        <select name="content_type" id="content_type" class="form-control custom-input select2" required>
                            <option value="">{{ db_trans('messages.choose_type') }}</option>
                            <option value="text">{{ db_trans('messages.type_text_article') }}</option>
                            <option value="video">{{ db_trans('messages.type_video_url') }}</option>
                            <option value="file">{{ db_trans('messages.type_upload_file') }}</option>
                        </select>
                    </div>

                    {{-- Lesson Order --}}
                    <div class="col-md-6 mt-3">
                        <label>{{ db_trans('messages.lesson_order') }}</label>
                        <input type="number" name="lesson_order" class="form-control custom-input"
                               placeholder="{{ db_trans('messages.example_one') }}">
                    </div>

                    {{-- Description --}}
                    <div class="col-md-12 mt-3">
                        <label>{{ db_trans('messages.lesson_description') }}</label>
                        <textarea name="description" class="form-control custom-input" rows="4"
                                  placeholder="{{ db_trans('messages.lesson_description_placeholder') }}"></textarea>
                    </div>

                    {{-- Text Content --}}
                    <div class="col-md-12 mt-3" id="text_content_wrap" style="display:none;">
                        <label>{{ db_trans('messages.lesson_content_text') }}</label>
                        <textarea name="text_content" class="form-control custom-input" rows="6"
                                  placeholder="{{ db_trans('messages.write_lesson_content_here') }}"></textarea>
                    </div>

                    {{-- Video URL --}}
                    <div class="col-md-12 mt-3" id="video_url_wrap" style="display:none;">
                        <label>{{ db_trans('messages.video_url') }}</label>
                        <input type="url" name="video_url" class="form-control custom-input"
                               placeholder="{{ db_trans('messages.video_url_placeholder') }}">
                        <small class="text-muted">{{ db_trans('messages.video_url_support') }}</small>
                    </div>

                    {{-- Upload File --}}
                    <div class="col-md-12 mt-3" id="file_upload_wrap" style="display:none;">
                        <label>{{ db_trans('messages.upload_file') }}</label>
                        <input type="file" name="content_file" class="form-control custom-input"
                               accept=".pdf,.doc,.docx,.ppt,.pptx,.zip">
                        <small class="text-muted">{{ db_trans('messages.allowed_file_types') }}</small>
                    </div>

                    {{-- Thumbnail --}}
                    <div class="col-md-6 mt-4">
                        <label>{{ db_trans('messages.lesson_thumbnail') }}</label>

                        <div class="thumbnail-preview" onclick="document.getElementById('thumbnail').click()">
                            <span id="thumbnailText">
                                <i class="fas fa-image fa-2x"></i><br>
                                {{ db_trans('messages.click_to_upload_image') }}
                            </span>
                            <img id="thumbnailPreview" style="display:none;">
                        </div>

                        <input type="file" name="thumbnail" id="thumbnail" class="d-none" accept="image/*">
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6 mt-4">
                        <label>{{ db_trans('messages.status') }} <span class="required">*</span></label>
                        <select name="status" class="form-control custom-input select2" required>
                            <option value="active" selected>{{ db_trans('messages.active') }}</option>
                            <option value="inactive">{{ db_trans('messages.inactive') }}</option>
                            <option value="draft">{{ db_trans('messages.draft') }}</option>
                        </select>
                    </div>

                </div>
            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary px-4">
                    <i class="fas fa-save"></i> {{ db_trans('messages.create_lesson_content') }}
                </button>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('backend') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>

    <script>
        $(function () {

            $('.select2').select2({ theme:'bootstrap4', width:'100%' });

            $('#thumbnail').on('change', function(e){
                const file = e.target.files[0];
                if(!file) return;
                const reader = new FileReader();
                reader.onload = function(e){
                    $('#thumbnailPreview').attr('src', e.target.result).show();
                    $('#thumbnailText').hide();
                };
                reader.readAsDataURL(file);
            });

            function toggleContentFields(){
                const type = $('#content_type').val();
                $('#text_content_wrap, #video_url_wrap, #file_upload_wrap').hide();
                if(type === 'text') $('#text_content_wrap').show();
                if(type === 'video') $('#video_url_wrap').show();
                if(type === 'file') $('#file_upload_wrap').show();
            }
            $('#content_type').on('change', toggleContentFields);
            toggleContentFields();
        });
    </script>
@endpush
