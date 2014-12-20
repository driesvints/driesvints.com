<?php
namespace Dries\Content\Markdown;

use Kurenai\MarkdownParserInterface;
use League\CommonMark\CommonMarkConverter;

class LeagueCommonMarkParser implements MarkdownParserInterface
{
    /**
     * @var \League\CommonMark\CommonMarkConverter
     */
    private $converter;

    /**
     * @param \League\CommonMark\CommonMarkConverter $converter
     */
    public function __construct(CommonMarkConverter $converter)
    {
        $this->converter = $converter;
    }

    /**
     * Renders the markdown to HTML
     *
     * @param string $content
     * @return string
     */
    public function render($content)
    {
        return $this->converter->convertToHtml($content);
    }
}
