<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'flag',
        'direction',
        'is_default',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_default' => 'boolean',
        'is_active'  => 'boolean',
        'sort_order' => 'integer',
    ];

    /*
    |--------------------------------------------------------------------------
    | Boot Method (Only One Default Language)
    |--------------------------------------------------------------------------
    */

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($language) {

            // If setting this language as default
            if ($language->is_default) {

                // Remove default from other languages
                self::where('is_default', true)
                    ->where('id', '!=', $language->id)
                    ->update(['is_default' => false]);
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function translations()
    {
        return $this->hasMany(Translation::class, 'locale', 'code');
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeDefault($query)
    {
        return $query->where('is_default', true);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */


    public static function getActiveCodes()
    {
        return self::active()->pluck('code')->toArray();
    }
    public static function getDefaultCode(): string
{
    return self::where('is_default', true)->value('code') ?? config('app.locale', 'en');
}

}
