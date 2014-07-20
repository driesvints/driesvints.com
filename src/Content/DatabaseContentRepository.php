<?php
namespace Dries\Content;

use Illuminate\Database\Eloquent\Model;
use dflydev\markdown\MarkdownExtraParser;

class DatabaseContentRepository extends BaseContentRepository implements ContentRepositoryInterface
{
    /**
     * The Post model.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * The date attribute key.
     *
     * @var string
     */
    protected $dateKey = 'published_at';

    /**
     * Initialize the repository.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Returns the content item body.
     *
     * @return string
     */
    public function body()
    {
        $body = $this->model->body;

        // Parse content as Markdown.
        return with(new MarkdownExtraParser)->transformMarkdown($body);
    }

    /**
     * Formats the related tags to an array.
     *
     * @return array
     */
    public function tags()
    {
        if (!count($tags = $this->model->tags)) {
            return array();
        }

        return $tags->lists('title');
    }

    /**
     * Returns a specific content item attribute.
     *
     * @param  string $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        return $this->model->getAttribute($key);
    }

    /**
     * Sets a new value to a specific content item attribute.
     *
     * @param  string $key
     * @param  mixed $value
     * @return mixed
     */
    public function setAttribute($key, $value)
    {
        $this->model->setAttribute($key, $value);
    }

    /**
     * Returns the model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getModel()
    {
        return $this->model;
    }
}