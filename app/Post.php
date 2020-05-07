<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

final class Post extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at',
    ];

    public function previous(): ?Post
    {
        return self::query()->where('published_at', '<', $this->published_at)->orderByDesc('published_at')->first();
    }

    public function next(): ?Post
    {
        return self::query()->where('published_at', '>', $this->published_at)->orderBy('published_at')->first();
    }

    public function excerpt(int $length = 255): string
    {
        $content = $this->excerpt ?? $this->content;
        $cleaned = strip_tags(
            preg_replace(['/<pre>[\w\W]*?<\/pre>/', '/<h\d>[\w\W]*?<\/h\d>/'], '', $content),
            '<code>'
        );
        $truncated = substr($cleaned, 0, $length);

        if (substr_count($truncated, '<code>') > substr_count($truncated, '</code>')) {
            $truncated .= '</code>';
        }

        return strlen($cleaned) > $length
            ? preg_replace('/\s+?(\S+)?$/', '', $truncated) . '...'
            : $cleaned;
    }

    public function content(): string
    {
        return app(Markdown::class)->toHtml($this->content);
    }
}
