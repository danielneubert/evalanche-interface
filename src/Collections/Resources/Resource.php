<?php

namespace Neubert\EvalancheInterface\Collections\Resources;

use Neubert\EvalancheInterface\Collections\CollectionItem;
use Neubert\EvalancheInterface\EvalancheInterface;

class Resource extends CollectionItem
{
    // Documentation Missing
    protected function createItem(object $item): object
    {
        if ($item instanceof \Scn\EvalancheSoapStruct\Struct\Mailing\MailingArticle) {
            return (object) [
                'id'      => $this->getProperty('articleId', $item),
                'label'   => null,
                'type'    => null,
                'folder'  => null,
                'meta'    => (object) [
                    'url' => null,
                ],
            ];
        }

        return (object) [
            'id'      => $this->getProperty('id', $item),
            'label'   => $this->getProperty('name', $item),
            'type'    => EvalancheInterface::RESOURCE_TYPES[intval($this->getProperty('typeId', $item))] ?? null,
            'folder'  => $this->getProperty('folderId', $item) ?? $this->getProperty('parentId', $item),
            'meta'    => (object) [
                'url' => $this->getProperty('url', $item) ?? null,
            ],
        ];
    }
}
