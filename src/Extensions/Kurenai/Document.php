<?php
namespace Dries\Extensions\Kurenai;

use Michelf\MarkdownExtra;
use Kurenai\Document as KurenaiDocument;

class Document extends KurenaiDocument
{
    /**
     * Get the document content in HTML format.
     *
     * @return string
     */
    public function getHtmlContent()
    {
        return MarkdownExtra::defaultTransform($this->content);
    }
}
