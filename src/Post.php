<?php

namespace Dries;

require_once __DIR__.'/../vendor/autoload.php';

use DateTime;
use Illuminate\Support\Str;
use Mni\FrontYAML\Document;
use SplFileInfo;

class Post
{
    /**
     * @var \SplFileInfo
     */
    private $file;

    /**
     * @var \Mni\FrontYAML\Document
     */
    private $document;

    public function __construct(SplFileInfo $file, Document $document)
    {
        $this->file = $file;
        $this->document = $document;
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->document->getYAML()['title'];
    }

    /**
     * @return string
     */
    public function slug()
    {
        return $this->file->getBasename('.md');
    }

    /**
     * @return \DateTime
     */
    public function publishedAt()
    {
        return new DateTime($this->document->getYAML()['publishedAt']);
    }

    /**
     * @param int $words
     * @return string
     */
    public function excerpt($words = 50)
    {
        $content = $this->document->getContent();

        // If a more tag was found we'll take the first part.
        if (strpos($content, '<!--more-->')) {
            $parts = explode('<!--more-->', $content);

            return strip_tags($parts[0]);
        }

        return Str::words(strip_tags($content), $words);
    }
}
