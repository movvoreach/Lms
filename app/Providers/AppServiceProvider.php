<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Language;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // ✅ If DB table doesn't exist yet (before migrate), don't query it
        if (!Schema::hasTable('languages')) {
            $fallbackLocale = config('app.locale', 'en');

            App::setLocale($fallbackLocale);
            View::share('currentLocale', $fallbackLocale);
            View::share('appLanguages', collect()); // empty collection

            return;
        }

        // Get default language from DB (safe)
        $default = Language::where('is_default', true)->value('code')
            ?? config('app.locale', 'en');

        // Current locale: session locale or default
        $locale = session()->get('locale', $default);

        // Set locale
        App::setLocale($locale);

        // Share current locale
        View::share('currentLocale', $locale);

        // Share active languages
        View::share(
            'appLanguages',
            Language::where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('name')
                ->get()
        );
    }
}
