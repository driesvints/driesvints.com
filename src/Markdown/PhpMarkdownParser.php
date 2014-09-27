<?php
namespace Dries\Markdown;

use Kurenai\MarkdownParserInterface;
use Michelf\MarkdownExtra;

class PhpMarkdownParser implements MarkdownParserInterface
{
    /**
     * Renders the markdown to HTML using th MarkdownExtra parser
     *
     * @param string $content
     * @return string
     */
    public function render($content)
    {
        return MarkdownExtra::defaultTransform($content);
    }

    /**
     * @param string $content
     * @return string
     * @deprecated This is just to support the bug with \Kurenai\Document
     */
    public function transformMarkdown($content)
    {
        return $this->render($content);
    }
}
 