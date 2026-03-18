<?php

use App\Models\Translation;
use Illuminate\Support\Facades\Cache;

if (!function_exists('db_trans')) {

    function db_trans(string $fullKey): string
{
    $locale = app()->getLocale();
    $fallback = 'en'; // or Language::getDefaultCode()

    [$group, $key] = array_pad(explode('.', $fullKey, 2), 2, null);

    $val = \App\Models\Translation::where('group', $group)
        ->where('key', $key)
        ->where('locale', $locale)
        ->value('value');

    if (!empty($val)) return $val;

    // ✅ fallback to English if missing/empty
    $fallbackVal = \App\Models\Translation::where('group', $group)
        ->where('key', $key)
        ->where('locale', $fallback)
        ->value('value');

    return $fallbackVal ?: $fullKey;
}

}
