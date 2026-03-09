<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContentMedia extends Model
{
    protected $table = 'content_media';

    protected $fillable = [
        'site_content_id',
        'type',
        'path',
        'original_name',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }

    /* ── Relationships ────────────────────────────────── */

    public function siteContent(): BelongsTo
    {
        return $this->belongsTo(SiteContent::class);
    }

    /* ── Scopes ───────────────────────────────────────── */

    public function scopeImages($query)
    {
        return $query->where('type', 'image');
    }

    public function scopeVideos($query)
    {
        return $query->where('type', 'video');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    /* ── Helpers ───────────────────────────────────────── */

    public function isImage(): bool
    {
        return $this->type === 'image';
    }

    public function isVideo(): bool
    {
        return $this->type === 'video';
    }

    /**
     * Get the public URL for this media item.
     */
    public function getUrlAttribute(): string
    {
        if (str_starts_with($this->path, 'content/')) {
            return asset('storage/' . $this->path);
        }
        return asset($this->path);
    }
}
