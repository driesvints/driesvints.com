<?php
namespace Dries\Content;

use Dries\Content\Markdown\MarkdownFile;
use Illuminate\Filesystem\Filesystem;
use Kurenai\DocumentParser;

class Manager
{
    /**
     * A list of content sources
     *
     * @var array
     */
    protected $sources = [];

    /**
     * The Illuminate Filesystem
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $filesystem;

    /**
     * The parser used to parse markdown files
     *
     * @var \Kurenai\DocumentParser
     */
    protected $markdownParser;

    /**
     * @param array $sources
     * @param \Illuminate\Filesystem\Filesystem $filesystem
     * @param \Kurenai\DocumentParser $markdownParser
     */
    public function __construct(array $sources, Filesystem $filesystem, DocumentParser $markdownParser)
    {
        $this->sources = $sources;
        $this->filesystem = $filesystem;
        $this->markdownParser = $markdownParser;
    }

    /**
     * Gets content for a content type
     *
     * @param string $type
     * @return \Dries\Content\Collection
     */
    public function get($type)
    {
        $sources = $this->getSourcesFromContentType($type);
        $items = [];

        foreach ($sources as $source) {
            $content = $this->load($source);

            $items = array_merge($items, $content);
        }

        return new Collection($items);
    }

    /**
     * Filters content from a specific content type based on a tag
     *
     * @param string $type
     * @param string $tag
     * @param string $orderBy
     * @param string $direction
     * @return \Dries\Content\Collection
     */
    public function tagged($type, $tag, $orderBy = 'date', $direction = 'desc')
    {
        // Get the content for the specified content type.
        $content = $this->get($type);

        // Only return published and tagged content.
        return $content->tagged($tag, $orderBy, $direction);
    }

    /**
     * Returns the content sources for a specific content type
     *
     * @param string $type
     * @return array
     */
    protected function getSourcesFromContentType($type)
    {
        // Only return the sources if they content type key was declared.
        if (array_key_exists($type, $this->sources)) {
            return $this->sources[$type];
        }

        return [];
    }

    /**
     * Loads content from a specific source
     *
     * We'll try to determine what type of content source we're dealing with
     * and load the content from the specific source accordingly.
     *
     * @param mixed $source
     * @return array
     */
    protected function load($source)
    {
        // If the source is a directory, load the files from it.
        if ($this->isDirectory($source)) {
            return $this->loadFromDirectory($source);
        }

        return [];
    }

    /**
     * Determine if the provided content source is a directory
     *
     * @param mixed $source
     * @return bool
     */
    protected function isDirectory($source)
    {
        return is_string($source) && is_dir($source);
    }

    /**
     * Load static content from a directory
     *
     * @param string $directory
     * @return array
     */
    protected function loadFromDirectory($directory)
    {
        // Get all the files from the directory.
        $files = $this->filesystem->files($directory);

        $items = [];

        foreach ($files as $file) {
            // Attempt to create a Content instance from the file.
            $item = $this->loadFromFile($file);

            // If we've successfully created a Content instance
            // from the file, add it to the items array.
            if ($item instanceof Content) {
                $items[] = $item;
            }
        }

        return $items;
    }

    /**
     * Loads static content from a file
     *
     * When we're loading content from a directory, we'll try to determine which type
     * of file we're dealing with and create an appropriate Content instance from it.
     *
     * @param string $file
     * @return \Dries\Content\MarkdownFile|null
     */
    protected function loadFromFile($file)
    {
        // If the file is a Markdown file.
        if ($this->isMarkdownFile($file)) {
            return new MarkdownFile($file, $this->markdownParser);
        }

        return null;
    }

    /**
     * Checks if a given file is a markdown file
     *
     * @param string $file
     * @return bool
     */
    protected function isMarkdownFile($file)
    {
        return $this->filesystem->extension($file) === 'md';
    }
}
