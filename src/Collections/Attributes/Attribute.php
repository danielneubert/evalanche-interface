<?php

namespace Neubert\EvalancheInterface\Collections\Attributes;

use Neubert\EvalancheInterface\Collections\CollectionItem;
use Neubert\EvalancheInterface\EvalancheInterface;

class Attribute extends CollectionItem
{
    // Documentation Missing
    protected function createItem(object $item, int $id): object
    {
        return (object) [
            '_id'        => $id,
            '_reference' => $this->getProperty('id', $item),
            'id'         => $this->getProperty('id', $item),
            'name'       => $this->getProperty('name', $item),
            'label'      => $this->getProperty('label', $item),
            'type'       => EvalancheInterface::ATTRIBUTE_TYPES[$this->getProperty('typeId', $item)] ?? null,
            'typeId'     => $this->getProperty('typeId', $item),
            'group'      => $this->getProperty('groupId', $item),
            'meta'       => (object) [
                'url'        => null,
                'isRequired' => $this->getProperty('mandatory', $item),
                'canOptions' => $this->getProperty('allowOptions', $item) ?? (method_exists($item, 'hasOptions') ? $item->hasOptions() : null),
                'info'       => $this->getProperty('helpText', $item),
                'help'       => $this->getProperty('inputHelpText', $item),
            ],
        ];
    }
}
