<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SiteContent extends Model
{
    protected $fillable = [
        'section',
        'key',
        'title',
        'subtitle',
        'content',
        'image',
        'video',
        'icon',
        'extra',
        'sort_order',
        'is_archived',
    ];

    protected function casts(): array
    {
        return [
            'extra' => 'array',
            'is_archived' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    /* ── Relationships ─────────────────────────────────── */

    public function media(): HasMany
    {
        return $this->hasMany(ContentMedia::class)->ordered();
    }

    public function images(): HasMany
    {
        return $this->hasMany(ContentMedia::class)->where('type', 'image')->ordered();
    }

    public function videos(): HasMany
    {
        return $this->hasMany(ContentMedia::class)->where('type', 'video')->ordered();
    }

    /* ── Scopes ───────────────────────────────────────── */

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_archived', false);
    }

    public function scopeArchived(Builder $query): Builder
    {
        return $query->where('is_archived', true);
    }

    public function scopeSection(Builder $query, string $section): Builder
    {
        return $query->where('section', $section);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    /* ── Helpers ───────────────────────────────────────── */

    /**
     * Get all active items for a section, ordered.
     */
    public static function forSection(string $section)
    {
        return static::with('media')->active()->section($section)->ordered()->get();
    }

    /**
     * Get a specific extra field value.
     */
    public function extra(string $key, $default = null)
    {
        return data_get($this->extra, $key, $default);
    }

    /**
     * Available section types for the CMS.
     */
    public static function sections(): array
    {
        return [
            'hero'         => 'Hero Banner',
            'programs'     => 'Programs',
            'clubs'        => 'Clubs / Locations',
            'schedule'     => 'Training Schedule',
            'events'       => 'Events & Competitions',
            'achievements' => 'Achievements',
            'instructors'  => 'Instructors',
            'faqs'         => 'FAQ',
            'values'       => 'Our Values',
            'features'     => 'Why Train With Us',
            'testimonials' => 'Testimonials',
            'about'        => 'About Section',
        ];
    }
}
