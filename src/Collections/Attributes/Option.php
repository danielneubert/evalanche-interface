<?php

namespace Neubert\EvalancheInterface\Collections\Attributes;

use Neubert\EvalancheInterface\Collections\CollectionItem;

class Option extends CollectionItem
{
    // Documentation Missing
    protected function createItem(object $item, int $id) : object
    {
        return (object) [
            '_id'        => $id,
            '_reference' => $this->getProperty('id', $item),
            'id'         => $this->getProperty('id', $item),
            'name'       => $this->getProperty('name', $item),
            'label'      => $this->getProperty('label', $item),
            'type'       => null,
            'group'      => null,
            'meta'       => [
                'url'    => null,
            ],
        ];
    }
}
