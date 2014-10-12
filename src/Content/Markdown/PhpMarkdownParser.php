<?php
namespace Dries\Content\Markdown;

use Kurenai\MarkdownParserInterface;
use Michelf\MarkdownExtra;

/**
 * PHP Markdown parser to be used with the Kurenai library
 */
class PhpMarkdownParser implements MarkdownParserInterface
{
    /**
     * Renders the markdown to HTML using the MarkdownExtra parser
     *
     * @param string $content
     * @return string
     */
    public function render($content)
    {
        return MarkdownExtra::defaultTransform($content);
    }
}
