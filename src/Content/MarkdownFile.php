<?php
namespace Dries\Content;

use Kurenai\DocumentParser;

class MarkdownFile extends AbstractContent
{
    /**
     * The filepath for this Markdown file
     *
     * @var string
     */
    protected $filepath;

    /**
     * The Kurenai Markdown parser
     *
     * @var \Kurenai\DocumentParser
     */
    protected $parser;

    /**
     * The Markdown Document
     *
     * @var \Kurenai\Document
     */
    protected $document;

    /**
     * The date attribute key
     *
     * @var string
     */
    protected $dateKey = 'date';

    /**
     * Initialize the repository
     *
     * @param string $filepath
     * @param \Kurenai\DocumentParser $parser
     */
    public function __construct($filepath, DocumentParser $parser)
    {
        $this->filepath = $filepath;
        $this->parser = $parser;
        $this->document = $this->parse($filepath);
    }

    /**
     * Parse a markdown document
     *
     * @param  string $filepath
     * @return \Kurenai\Document
     */
    protected function parse($filepath)
    {
        $file = file_get_contents($filepath);

        return $this->parser->parse($file);
    }

    /**
     * Returns the content item body
     *
     * This function overrides the dynamic body property call.
     *
     * @return string
     */
    public function body()
    {
        return $this->document->getHtmlContent();
    }

    /**
     * Returns the content item's tags
     *
     * This function overrides the dynamic tags property call.
     *
     * @return array
     */
    public function tags()
    {
        $tags = explode(', ', $this->getAttribute('tags'));

        return !empty($tags[0]) ? $tags : array();
    }

    /**
     * Determines if comments should be disabled or not
     *
     * @return bool
     */
    public function disable_comments()
    {
        return ($this->getAttribute('disable_comments') === 'true');
    }

    /**
     * Returns a specific content item attribute
     *
     * @param  string $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        return $this->document->get($key);
    }

    /**
     * Sets a new value to a specific content item attribute
     *
     * @param  string $key
     * @param  mixed $value
     * @return mixed
     */
    public function setAttribute($key, $value)
    {
        $this->document->add($key, $value);
    }

    /**
     * Returns the Kurenai Parser
     *
     * @return \Kurenai\DocumentParser
     */
    public function getParser()
    {
        return $this->parser;
    }

    /**
     * Returns the Kurenai Document
     *
     * @return \Kurenai\Document
     */
    public function getDocument()
    {
        return $this->document;
    }
}
