<?php

namespace App\Http\Controllers\Translation;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::orderBy('is_default', 'desc')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        // Count keys per locale
        $keyCountByLocale = Translation::selectRaw('locale, COUNT(DISTINCT CONCAT(`group`,".",`key`)) as total_keys')
            ->groupBy('locale')
            ->pluck('total_keys', 'locale');

        return view('Translate.index', compact('languages', 'keyCountByLocale'));
    }

    public function create()
    {
        return view('Translate.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code'       => 'required|string|max:10|unique:languages,code',
            'name'       => 'required|string|max:100',
            'flag'       => 'nullable|string|max:50',
            'direction'  => 'required|in:ltr,rtl',
            'sort_order' => 'nullable|integer|min:0',
            'is_active'  => 'nullable|boolean',
        ]);

        $language = Language::create([
            'code'       => strtolower($data['code']),
            'name'       => $data['name'],
            'flag'       => $data['flag'] ?? null,
            'direction'  => $data['direction'],
            'sort_order' => $data['sort_order'] ?? 0,
            'is_active'  => $request->boolean('is_active', true),
            'is_default' => false,
        ]);

        // ✅ OPTIONAL: Copy translations from default language into the new language
        $defaultLocale = Language::getDefaultCode(); // from your Language model helper
        $defaultRows = Translation::where('locale', $defaultLocale)->get();

        foreach ($defaultRows as $row) {
            Translation::updateOrCreate(
                ['group' => $row->group, 'key' => $row->key, 'locale' => $language->code],
                ['value' => $row->value] // copy english text (you can later edit)
            );
        }

        // clear cache if you use cached db translations
        Cache::forget("db_translations_{$language->code}");

        return redirect()->route('admin.languages.index')->with('success', 'Language created successfully.');
    }

    public function setDefault(Language $language)
    {
        // Your Language model boot() ensures only one default
        $language->update(['is_default' => true]);

        return back()->with('success', 'Default language updated.');
    }

    public function destroy(Language $language)
    {
        if ($language->is_default) {
            return back()->with('error', 'Cannot delete default language.');
        }

        Translation::where('locale', $language->code)->delete();
        $language->delete();

        Cache::forget("db_translations_{$language->code}");

        return back()->with('success', 'Language deleted successfully.');
    }

   public function switch($locale)
{
    $language = \App\Models\Language::where('code', $locale)
        ->where('is_active', true)
        ->first();

    if (!$language) {
        return back()->with('error', 'Language not available.');
    }

    session(['locale' => $locale]);

    return back();
}
}
