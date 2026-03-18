<?php

namespace App\Http\Controllers\Translation;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class TranslationController extends Controller
{
    /**
     * Show translation editor by locale
     * GET admin/translations/{locale}
     */
    public function editByLocale(string $locale)
    {
        $language = Language::where('code', $locale)->firstOrFail();

        $translations = Translation::where('locale', $locale)
            ->orderBy('group')
            ->orderBy('key')
            ->get();

        return view('Translate.translations', compact('language', 'translations'));
    }

    /**
     * Save translations by locale
     * POST admin/translations/{locale}
     * translations[ID] => value
     */
    public function updateByLocale(Request $request, string $locale)
    {
        // Ensure language exists
        Language::where('code', $locale)->firstOrFail();

        $items = $request->input('translations', []);
        if (!is_array($items) || empty($items)) {
            return back()->with('error', 'No translations received.');
        }

        // Optional: limit size to prevent huge posts
        // if (count($items) > 3000) return back()->with('error', 'Too many items.');

        foreach ($items as $id => $value) {
            // Only update numeric IDs
            if (!is_numeric($id)) continue;

            Translation::where('id', (int)$id)
                ->where('locale', $locale)
                ->update([
                    'value' => $value ?? '',
                ]);
        }

        // Clear cache once
        Cache::forget("db_translations_{$locale}");

        return back()->with('success', 'Translations saved successfully.');
    }

    /**
     * Add a new translation key to all active languages
     * POST admin/translations/add-key
     * group, key, value
     */
public function addKeyToAll(Request $request)
{
    $data = $request->validate([
        'group' => 'required|string|max:50',
        'key'   => 'required|string|max:150',
        'value' => 'required|string|max:500',
    ]);

    $data['key'] = strtolower(trim($data['key']));
    $data['key'] = str_replace(' ', '_', $data['key']);

    $languages = Language::where('is_active', true)->get();

    foreach ($languages as $lang) {
        Translation::updateOrCreate(
            [
                'group'  => $data['group'],
                'key'    => $data['key'],
                'locale' => $lang->code,
            ],
            [
                // ✅ put english default value to all languages (no empty)
                'value' => $data['value'],
            ]
        );

        Cache::forget("db_translations_{$lang->code}");
    }

    return back()->with('success', 'Translation key added to all languages!');
}

}
