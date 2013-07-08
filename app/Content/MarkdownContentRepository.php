<?php namespace Content;

use Kurenai\DocumentParser;

class MarkdownContentRepository extends BaseContentRepository implements ContentRepositoryInterface {

	/**
	 * The Kurenai Markdown parser.
	 *
	 * @var \Kurenai\DocumentParser
	 */
	protected $parser;

	/**
	 * The Markdown Document.
	 *
	 * @var \Kurenai\Document
	 */
	protected $document;

	/**
	 * Initialize the repository.
	 *
	 * @param  string  $source
	 * @param  \Kurenai\DocumentParser  $parser
	 * @return void
	 */
	public function __construct($source, DocumentParser $parser)
	{
		$this->parser = $parser;
		$this->document = $this->parse($source);
	}

    /**
     * Parse a markdown document.
     *
     * @param  string  $source
     * @return \Kurenai\Document
     */
	protected function parse($source)
	{
		$source = file_get_contents($source);

		return $this->parser->parse($source);
	}

	/**
	 * Returns the content item date.
	 *
	 * @param  string  $format
	 * @return string
	 */
	public function date($format = 'Y/m/d H:i:s')
	{
		return $this->formatDate($this->getAttribute('date'), $format);
	}

	/**
	 * Returns the content item body.
	 *
	 * @return string
	 */
	public function body()
	{
		return $this->document->getHtmlContent();
	}

	/**
	 * Returns a specific content item attribute.
	 *
	 * @param  string  $key
	 * @return mixed
	 */
	public function getAttribute($key)
	{
		return $this->document->get($key);
	}

	/**
	 * Sets a new value to a specific content item attribute.
	 *
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return mixed
	 */
	public function setAttribute($key, $value)
	{
		$this->document->add($key, $value);
	}

	/**
	 * Returns the Kurenai Parser.
	 *
	 * @return \Kurenai\Parser
	 */
	public function getParser()
	{
		return $this->parser;
	}

	/**
	 * Returns the Kurenai Document.
	 *
	 * @return \Kurenai\Document
	 */
	public function getDocument()
	{
		return $this->document;
	}

}