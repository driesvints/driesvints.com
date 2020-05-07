<?php

declare(strict_types=1);

namespace App;

use League\CommonMark\MarkdownConverterInterface;

final class Markdown
{
    private MarkdownConverterInterface $converter;

    public function __construct(MarkdownConverterInterface $converter)
    {
        $this->converter = $converter;
    }

    public function toHtml(string $markdown): string
    {
        return $this->converter->convertToHtml($markdown);
    }
}
