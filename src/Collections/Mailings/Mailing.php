<?php

namespace Neubert\EvalancheInterface\Collections\Mailings;

use Neubert\EvalancheInterface\Collections\CollectionItem;
use Neubert\EvalancheInterface\EvalancheInterface;

class Mailing extends CollectionItem
{
    // Documentation Missing
    protected function createItem(object $item): object
    {
        return (object) [
            'id'      => $this->getProperty('id', $item),
            'label'   => $this->getProperty('name', $item),
            'type'    => $this->getProperty('typeId', $item),
            'folder'  => $this->getProperty('folderId', $item) ?? $this->getProperty('parentId', $item),
            'meta'    => (object) [
                'url' => $this->getProperty('url', $item) ?? null,
                'preview' => $this->getProperty('previewUrl', $item) ?? null,
                'planned_at' => $this->getProperty('timestamp', $item) ?? null,
                'shipping_at' => $this->getProperty('sendStartTime', $item) ?? null,
                'shipped_at' => $this->getProperty('sendEndTime', $item) ?? null,
                'subject' => $this->getProperty('subject', $item) ?? null,
                'targetgroup' => $this->getProperty('targetGroupId', $item) ?? null,
            ],
        ];
    }
}
