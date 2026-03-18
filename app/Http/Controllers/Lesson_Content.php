<?php

namespace App\Http\Controllers;

class LessonContentController extends Controller
{
    //

    public function index(){
    return view('Lesson.index');
}
public function create(){
    return view('Lesson.create');
}
}
