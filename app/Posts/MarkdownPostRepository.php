<?php namespace Posts;

use Kurenai\DocumentParser;

class MarkdownPostRepository implements PostRepositoryInterface {

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
	 * Get metadata from the document.
	 *
	 * @param  string $key
	 * @return mixed
	 */
	public function meta($key = null)
	{
		return $this->document->get($key);
	}

	/**
	 * Returns the post title.
	 *
	 * @return string
	 */
	public function title()
	{
		return $this->meta('title');
	}

	/**
	 * Returns the post slug.
	 *
	 * @return string
	 */
	public function slug()
	{
		return $this->meta('slug');
	}

	/**
	 * Returns the post date.
	 *
	 * @return string
	 */
	public function date()
	{
		return $this->meta('date');
	}

	/**
	 * Returns the post body.
	 *
	 * @return string
	 */
	public function body()
	{
		return $this->document->getHtmlContent();
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