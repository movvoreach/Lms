<?php

namespace App\Http\Controllers;

use App\Models\LessonContent;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LessonContentController extends Controller
{
    public function index()
    {
        $lessons = LessonContent::with('course')->latest()->get();
        return view('Lesson.index', compact('lessons'));
    }

    public function create()
    {
        $courses = Course::orderBy('title')->get(['id','title']);
        return view('Lesson.create', compact('courses'));
    }

  public function store(Request $request)
{
    $data = $request->validate([
        'course_id'     => ['required','exists:courses,id'],

        // ✅ NEW: Unit fields
        'unit_title'    => ['nullable','string','max:255'],
        'unit_order'    => ['nullable','integer','min:1'],

        'lesson_title'  => ['required','string','max:255'],
        'content_type'  => ['required','in:text,video,file'],
        'lesson_order'  => ['nullable','integer','min:1'],
        'description'   => ['nullable','string'],

        // ✅ Make these nullable here, we will require them conditionally below
        'text_content'  => ['nullable','string'],
        'video_url'     => ['nullable','url'],
        'content_file'  => ['nullable','file','max:512000','mimes:pdf,doc,docx,ppt,pptx,zip,mp4,mov,avi,mkv'],

        'thumbnail'     => ['nullable','image','max:5120'],
        'status'        => ['required','in:active,inactive,draft'],
    ]);

    // ✅ Required by content type (clean + correct)
    if ($data['content_type'] === 'text' && !$request->filled('text_content')) {
        return back()->withErrors(['text_content' => 'Text content is required'])->withInput();
    }

    if ($data['content_type'] === 'video' && !$request->filled('video_url')) {
        return back()->withErrors(['video_url' => 'Video URL is required'])->withInput();
    }

    if ($data['content_type'] === 'file' && !$request->hasFile('content_file')) {
        return back()->withErrors(['content_file' => 'File is required'])->withInput();
    }

    $lesson = new LessonContent();

    $lesson->course_id    = $data['course_id'];

    // ✅ Save unit fields
    $lesson->unit_title   = $data['unit_title'] ?? null;
    $lesson->unit_order   = $data['unit_order'] ?? null;

    $lesson->lesson_title = $data['lesson_title'];
    $lesson->content_type = $data['content_type'];
    $lesson->lesson_order = $data['lesson_order'] ?? null;
    $lesson->description  = $data['description'] ?? null;

    // ✅ Save only relevant content
    $lesson->text_content = ($data['content_type'] === 'text')  ? ($data['text_content'] ?? null) : null;
    $lesson->video_url    = ($data['content_type'] === 'video') ? ($data['video_url'] ?? null) : null;

    // ✅ Reset file columns first (safe)
    $lesson->content_file_path = null;
    $lesson->content_file_name = null;
    $lesson->content_file_mime = null;
    $lesson->content_file_size = null;

    $lesson->status = $data['status'];

    // ✅ Upload content file only when type=file
    if ($data['content_type'] === 'file' && $request->hasFile('content_file')) {
        $file = $request->file('content_file');
        $path = $file->store('lesson_contents/files', 'public');

        $lesson->content_file_path = $path;
        $lesson->content_file_name = $file->getClientOriginalName();
        $lesson->content_file_mime = $file->getClientMimeType();
        $lesson->content_file_size = $file->getSize();
    }

    // ✅ Upload thumbnail (any type can have thumbnail)
    if ($request->hasFile('thumbnail')) {
        $thumb = $request->file('thumbnail');
        $thumbPath = $thumb->store('lesson_contents/thumbnails', 'public');
        $lesson->thumbnail_path = $thumbPath;
    }

    $lesson->save();

    return redirect()
        ->route('lessons.index')
        ->with('success', 'Lesson content created successfully!');
}

    // ✅ Show lesson detail + build sidebar sections from lesson_contents table (no section table needed)
    public function show($id)
{
    $lessonContent = LessonContent::with('course')->findOrFail($id);

    // ✅ if course relation missing, fallback by course_id
    $course = $lessonContent->course;

    if (!$course && $lessonContent->course_id) {
        $course = Course::find($lessonContent->course_id);
    }

    // ✅ still null? show error clearly
    if (!$course) {
        return back()->with('error', 'Course not found for this lesson. Please check lesson course_id.');
    }

    $hasAccess = auth()->check() && auth()->user()->hasRole('admin');

    $lessons = LessonContent::where('course_id', $course->id)
        ->orderBy('unit_order')
        ->orderBy('lesson_order')
        ->get();

    $sections = $lessons
        ->groupBy(fn ($l) => $l->unit_title ?? 'Lessons')
        ->map(function ($items, $title) {
            return (object)[
                'id' => Str::slug($title),
                'title' => $title,
                'lessons' => $items->values(),
            ];
        })
        ->values();

    return view('Lesson.show', compact('lessonContent','course','sections','hasAccess'));
}

    // ✅ Open file inline
    public function open(LessonContent $lessonContent)
    {
        abort_unless($lessonContent->content_file_path, 404);

        $fullPath = Storage::disk('public')->path($lessonContent->content_file_path);

        return response()->file($fullPath, [
            'Content-Type' => $lessonContent->content_file_mime ?? 'application/octet-stream',
            'Content-Disposition' => 'inline; filename="'.$lessonContent->content_file_name.'"',
        ]);
    }

    // ✅ Download file
    public function download(LessonContent $lessonContent)
    {
        abort_unless($lessonContent->content_file_path, 404);

        return Storage::disk('public')->download(
            $lessonContent->content_file_path,
            $lessonContent->content_file_name ?? basename($lessonContent->content_file_path)
        );
    }
}
