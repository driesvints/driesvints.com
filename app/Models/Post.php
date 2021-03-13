<?php

declare(strict_types=1);

namespace App\Models;

use App\Markdown;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Spatie\ResponseCache\Facades\ResponseCache;

final class Post extends Model implements Feedable
{
    use HasFactory;

    protected $dates = [
        'published_at',
    ];

    protected $attributes = [
        'content' => '',
        'excerpt' => '',
    ];

    protected $casts = [
        'content' => 'string',
        'excerpt' => 'string',
    ];

    public static function booted()
    {
        self::created(function () {
            ResponseCache::clear();
        });

        self::updated(function () {
            ResponseCache::clear();
        });

        self::deleted(function () {
            ResponseCache::clear();
        });
    }

    public function previous(): ?self
    {
        if ($this->published_at === null) {
            return null;
        }

        return self::query()->where('published_at', '<', $this->published_at)->orderByDesc('published_at')->first();
    }

    public function next(): ?self
    {
        if ($this->published_at === null) {
            return null;
        }

        return self::query()->where('published_at', '>', $this->published_at)->orderBy('published_at')->first();
    }

    public function setContentAttribute($value): void
    {
        $this->attributes['content'] = (string) $value;
    }

    public function setExcerptAttribute($value): void
    {
        $this->attributes['excerpt'] = (string) $value;
    }

    public function excerpt(int $length = 255): string
    {
        $content = $this->excerpt ?: $this->content();
        $cleaned = strip_tags(
            preg_replace(['/<pre>[\w\W]*?<\/pre>/', '/<h\d>[\w\W]*?<\/h\d>/'], '', $content),
            '<code>',
        );
        $truncated = substr($cleaned, 0, $length);

        if (substr_count($truncated, '<code>') > substr_count($truncated, '</code>')) {
            $truncated .= '</code>';
        }

        return strlen($cleaned) > $length
            ? preg_replace('/\s+?(\S+)?$/', '', $truncated).'...'
            : $cleaned;
    }

    public function content(): string
    {
        return app(Markdown::class)->toHtml($this->content);
    }

    public function hasFacebookVideo(): bool
    {
        return Str::contains($this->content, 'fb-video');
    }

    public function isUnpublished(): bool
    {
        return $this->published_at === null || $this->published_at->isFuture();
    }

    public function isUpdated(): bool
    {
        return $this->updated_at->subDay()->gt($this->published_at);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published_at', '<=', now());
    }

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id(route('post', $this))
            ->title($this->title)
            ->summary($this->excerpt())
            ->updated($this->updated_at)
            ->link(route('post', $this))
            ->author('Dries Vints');
    }

    public static function getFeedItems(): Collection
    {
        return self::published()->get();
    }
}
