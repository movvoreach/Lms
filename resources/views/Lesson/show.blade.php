@extends('admin.layouts.master')

@section('title', 'Lesson Detail')

@push('styles')
    <style>
        .lesson-wrap {
            display: grid;
            grid-template-columns: 1fr 360px;
            gap: 18px;
        }

        @media(max-width: 992px) {
            .lesson-wrap {
                grid-template-columns: 1fr;
            }
        }

        /* Left content area */
        .player-box {
            position: relative;
            background: #111827;
            border-radius: 18px;
            overflow: hidden;
            min-height: 520px;
        }

        .player-inner {
            width: 100%;
            height: 100%;
            background: #f3f4f6;
        }

        .player-inner iframe,
        .player-inner video,
        .player-inner img {
            width: 100%;
            height: 520px;
            object-fit: cover;
            border: 0;
            display: block;
        }

        /* LOCK overlay */
        .lock-overlay {
            position: absolute;
            inset: 0;
            background: rgba(17, 24, 39, .55);
            backdrop-filter: blur(3px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 18px;
            z-index: 5;
        }

        .lock-card {
            background: #fff;
            width: 420px;
            max-width: 95%;
            border-radius: 16px;
            padding: 18px;
            text-align: center;
            box-shadow: 0 10px 35px rgba(0, 0, 0, .25);
        }

        .lock-card h4 {
            font-family: 'Battambang', sans-serif;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .lock-card p {
            margin: 0 0 14px 0;
            color: #6b7280;
            font-family: 'Battambang', sans-serif;
        }

        /* Right sidebar */
        .side-box {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            overflow: hidden;
        }

        .side-title {
            padding: 14px 16px;
            font-size: 24px;
            font-family: 'Battambang', sans-serif;
            font-weight: 700;
            border-bottom: 1px solid #e5e7eb;
        }

        .unit-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 14px;
            cursor: pointer;
            border-bottom: 1px solid #eef2f7;
            background: #fff;
        }

        .unit-head:hover {
            background: #f8fafc;
        }

        .unit-name {
            font-weight: 700;
        }

        .unit-body {
            padding: 0;
        }

        .lesson-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 12px 14px;
            border-bottom: 1px solid #eef2f7;
            text-decoration: none !important;
            color: #111827;
        }

        .lesson-item:hover {
            background: #f8fafc;
        }

        .lesson-item.active {
            background: #3b61a8;
            color: #fff;
        }

        .lesson-left {
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 0;
        }

        .lesson-left .title {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 220px;
        }

        .lock-ico {
            opacity: .85;
        }

        .lesson-item.active .lock-ico {
            color: #fff;
            opacity: 1;
        }
    </style>
@endpush

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-muted" style="font-size:13px;">
                        {{ $course->title ?? 'Course' }} > {{ $lessonContent->lesson_title }}
                    </div>
                </div>

                <a href="{{ url('/lessons/list') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
    </section>

    <div class="container-fluid mt-3">

        <div class="lesson-wrap">

            {{-- LEFT: Player / Content --}}
            <div class="player-box">
                <div class="player-inner">

                    {{-- Show thumbnail or content --}}
                    @if ($lessonContent->content_type === 'video' && $lessonContent->video_url)
                        {{-- Youtube embed if possible --}}
                        @php
                            $url = $lessonContent->video_url;
                            $youtubeId = null;
                            if ($url) {
                                if (preg_match('~youtu\.be/([^?&]+)~', $url, $m)) {
                                    $youtubeId = $m[1];
                                }
                                if (preg_match('~v=([^?&]+)~', $url, $m)) {
                                    $youtubeId = $m[1];
                                }
                                if (preg_match('~embed/([^?&]+)~', $url, $m)) {
                                    $youtubeId = $m[1];
                                }
                            }
                        @endphp

                        @if ($youtubeId)
                            <iframe src="https://www.youtube.com/embed/{{ $youtubeId }}" allowfullscreen></iframe>
                        @else
                            {{-- fallback image --}}
                            <img src="{{ $lessonContent->thumbnail_path ? asset('storage/' . $lessonContent->thumbnail_path) : 'https://via.placeholder.com/1200x600?text=Lesson' }}"
                                alt="Lesson">
                        @endif
                    @elseif($lessonContent->thumbnail_path)
                        <img src="{{ asset('storage/' . $lessonContent->thumbnail_path) }}" alt="Lesson">
                    @else
                        <img src="https://via.placeholder.com/1200x600?text=Lesson" alt="Lesson">
                    @endif

                </div>

                {{-- LOCK overlay (like screenshot) --}}
                @if (!$hasAccess)
                    <div class="lock-overlay">
                        <div class="lock-card">
                            <h4>មេរៀននេះត្រូវបានចាក់សោ</h4>
                            <p>សូមចុះឈ្មោះ/បង់ថ្លៃវគ្គសិក្សា ដើម្បីចូលមើលមាតិកា</p>

                            <a href="{{ route('courses.enroll', $course->id) ?? '#' }}" class="btn btn-primary px-4">
                                <i class="fas fa-lock"></i> បើកមេរៀនដើម្បីមើល
                            </a>
                        </div>
                    </div>
                @endif
            </div>

            {{-- RIGHT: Sidebar Units/Lessons --}}
            <div class="side-box">
                <div class="side-title">មេរៀន</div>

                <div id="unitsAccordion">

                    @foreach ($sections as $sIndex => $section)
                        @php
                            $open = $section->lessons->contains('id', $lessonContent->id);
                            $collapseId = 'unit_' . $sIndex;
                        @endphp
                        ...
                    @endforeach

                </div>

            </div>

        </div>

        {{-- OPTIONAL: Below content text/file info (only if has access) --}}
        @if ($hasAccess)
            <div class="card mt-3">
                <div class="card-body">

                    <h4 class="mb-2">{{ $lessonContent->lesson_title }}</h4>
                    @if ($lessonContent->description)
                        <p class="text-muted">{{ $lessonContent->description }}</p>
                        <hr>
                    @endif

                    @if ($lessonContent->content_type === 'text')
                        <div style="white-space: pre-line;">{{ $lessonContent->text_content }}</div>
                    @endif

                    @if ($lessonContent->content_type === 'file')
                        @if ($lessonContent->content_file_path)
                            <a target="_blank" href="{{ route('lessons.lesson-contents.open', $lessonContent->id) }}"
                                class="btn btn-success btn-sm">
                                <i class="fas fa-eye"></i> Open
                            </a>
                            <a href="{{ route('lessons.lesson-contents.download', $lessonContent->id) }}"
                                class="btn btn-primary btn-sm">
                                <i class="fas fa-download"></i> Download
                            </a>
                        @else
                            <div class="alert alert-danger mt-2">No file uploaded for this lesson.</div>
                        @endif
                    @endif

                </div>
            </div>
        @endif

    </div>
@endsection
