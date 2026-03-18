<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switch(string $locale, Request $request)
    {
        $available = config('app.available_locales', ['en']);

        if (!in_array($locale, $available)) {
            $locale = config('app.locale');
        }

        Session::put('locale', $locale);

        return back();
    }
}
