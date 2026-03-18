<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Translation extends Model
{
    use HasFactory;

    protected $fillable = [
        'group',     // messages, validation, auth...
        'key',       // dashboard, student_list...
        'locale',    // en, km, zh...
        'value',     // translated text
    ];

    protected $casts = [
        'group'  => 'string',
        'key'    => 'string',
        'locale' => 'string',
        'value'  => 'string',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // Belongs to a language (via code)
    public function language()
    {
        return $this->belongsTo(Language::class, 'locale', 'code');
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    // Filter by locale
    public function scopeLocale($query, $locale)
    {
        return $query->where('locale', $locale);
    }

    // Filter by group
    public function scopeGroup($query, $group)
    {
        return $query->where('group', $group);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    // Get translation value quickly
    public static function getValue($group, $key, $locale)
    {
        return self::where('group', $group)
            ->where('key', $key)
            ->where('locale', $locale)
            ->value('value');
    }

    // Get all translations for a locale (grouped)
    public static function getGroupedByLocale($locale)
    {
        return self::where('locale', $locale)
            ->get()
            ->groupBy('group')
            ->map(function ($rows) {
                return $rows->pluck('value', 'key')->toArray();
            })
            ->toArray();
    }
}
