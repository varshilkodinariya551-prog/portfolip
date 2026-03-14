<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'long_description',
        'image', 'tech_stack', 'live_url', 'github_url',
        'featured', 'sort_order',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];

    public static function booted(): void
    {
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderByDesc('created_at');
    }

    public function getTechStackArrayAttribute(): array
    {
        return array_map('trim', explode(',', $this->tech_stack));
    }
}
