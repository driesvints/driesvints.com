<?php
namespace Dries\Extensions\Kurenai;

use Kurenai\DocumentParser as KurenaiDocumentParser;

class DocumentParser extends KurenaiDocumentParser
{
    /**
     * Build a Document from the parsed data.
     *
     * @param  string $content
     * @param  array $metadata
     * @return \Dries\Extensions\Kurenai\Document
     */
    public function buildDocument($content, array $metadata)
    {
        $document = new Document();
        $document->setContent($content);
        $document->set($metadata);

        return $document;
    }
}
