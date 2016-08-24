<?php

namespace Dries;

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Finder\Finder;
use Mni\FrontYAML\Parser;

class Blog
{
    /**
     * @var \Symfony\Component\Finder\Finder
     */
    private $filesystem;

    /**
     * @var \Mni\FrontYAML\Parser
     */
    private $parser;

    /**
     * @var string
     */
    private $blogPath = __DIR__.'/../source/blog/';

    public function __construct(Finder $filesystem, Parser $parser)
    {
        $this->filesystem = $filesystem;
        $this->parser = $parser;
    }

    /**
     * @return static
     */
    public static function yolo()
    {
        return new self(new Finder(), new Parser());
    }

    /**
     * @return \Illuminate\Support\Collection|\Dries\Post[]
     */
    public function posts()
    {
        return collect(iterator_to_array(
                $this->filesystem->files()->in($this->blogPath)
            ))
            ->map(function ($file) {
                return new Post(
                    $file,
                    $this->parser->parse($file->getContents())
                );
            })
            ->sort(function (Post $a, Post $b) {
                if ($a->publishedAt() == $b->publishedAt()) {
                    return 0;
                }

                return ($a->publishedAt() < $b->publishedAt()) ? 1 : -1;
            });
    }

    /**
     * @return \Dries\Post
     */
    public function getPostByTitle($title)
    {
        return $this->posts()
            ->filter(function (Post $post) use ($title) {
                return $post->title() === $title;
            })
            ->first();
    }
}
