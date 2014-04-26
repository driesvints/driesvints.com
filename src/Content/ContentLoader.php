<?php namespace Dries\Content;

use Illuminate\Config\Repository;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Database\Eloquent\Model;
use Dries\Extensions\Kurenai\DocumentParser;

class ContentLoader {

	/**
	 * The Illuminate Config Repository.
	 *
	 * @var \Illuminate\Config\Repository
	 */
	protected $config;

	/**
	 * The Illuminate Filesystem.
	 *
	 * @var \Illuminate\Filesystem\Filesystem
	 */
	protected $filesystem;

	/**
	 * Initialize the Content Loader instance.
	 *
	 * @param  \Illuminate\Config\Repository  $config
	 * @param  \Illuminate\Filesystem\Filesystem  $filesystem
	 * @return void
	 */
	public function __construct(Repository $config, Filesystem $filesystem)
	{
		$this->config = $config;
		$this->filesystem = $filesystem;
	}

	/**
	 * Gets content from a list of sources.
	 *
	 * @param  mixed  $sources
	 * @return \Dries\Content\Collection
	 */
	public function get($sources)
	{
		$sources = (array) $sources;

		$items = array();

		foreach ($sources as $source)
		{
			$content = $this->load($source);

			$items = array_merge($content, $items);
		}

		return new Collection($items);
	}

	/**
	 * Loads content from a specific source.
	 *
	 * @param  string  $source
	 * @return array
	 */
	protected function load($source)
	{
		// If it's a instantiable class.
		if (class_exists($source))
		{
			$class = new $source;

			// If it's an Eloquent model.
			if ($class instanceof Model)
			{
				return $this->loadFromModel($class);
			}
		}

		// If the source is a directory, load the files from it.
		if (is_string($source) && is_dir($source))
		{
			return $this->loadFromDirectory($source);
		}

		return array();
	}

	/**
	 * Loads content a configuration option's sources.
	 *
	 * @param  string  $type
	 * @return array
	 */
	public function config($type)
	{
		$sources = $this->config->get("content.{$type}");

		return $this->get($sources);
	}

	/**
	 * Loads content from an Eloquent model.
	 *
	 * @param  \Illuminate\Database\Eloquent\Model  $model
	 * @return array
	 */
	protected function loadFromModel(Model $model)
	{
		$items = array();

		foreach ($model->get() as $item)
		{
			$items[] = new DatabaseContentRepository($item);
		}

		return $items;
	}

	/**
	 * Loads static content from a directory.
	 *
	 * @param  string  $directory
	 * @return array
	 */
	protected function loadFromDirectory($directory)
	{
		$files = $this->filesystem->files($directory);

		$items = array();

		foreach ($files as $file)
		{
			$item = $this->loadFromFile($file);

			if ($item instanceof ContentRepositoryInterface)
			{
				$items[] = $item;
			}
		}

		return $items;
	}

	/**
	 * Loads static content from a file.
	 *
	 * @param  string  $file
	 * @return mixed
	 */
	protected function loadFromFile($file)
	{
		// If the file is a Markdown file.
		if ($this->validateMarkdownFile($file))
		{
			$parser = new DocumentParser;

			return new MarkdownContentRepository($file, $parser);
		}
	}

	/**
	 * Validates if a given file is a markdown file.
	 *
	 * @param  string  $file
	 * @return bool
	 */
	protected function validateMarkdownFile($file)
	{
		return $this->filesystem->extension($file) === 'md';
	}

	/**
	 * Get the Illuminate Config Repository.
	 *
	 * @return \Illuminate\Config\Repository
	 */
	public function getConfig()
	{
		return $this->config;
	}

	/**
	 * Get the Illuminate Filesystem.
	 *
	 * @return \Illuminate\Filesystem\Filesystem
	 */
	public function getFilesystem()
	{
		return $this->filesystem;
	}

}