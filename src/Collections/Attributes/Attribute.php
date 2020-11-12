<?php

namespace Neubert\EvalancheInterface\Collections\Attributes;

use Neubert\EvalancheInterface\Collections\CollectionItem;

class Attribute extends CollectionItem
{
    // Documentation Missing
    protected function createItem(object $item) : object
    {
        return (object) [
            'id'      => $this->getProperty('id', $item),
            'label'   => $this->getProperty('name', $item),
            'type'    => null,
            'group'   => null,
            'meta'    => [
                'url' => null,
            ],
        ];
    }
}
