<?php

namespace Neubert\EvalancheInterface\Collections\Details;

use Neubert\EvalancheInterface\Collections\CollectionItem;
use Neubert\EvalancheInterface\EvalancheInterface;

class Details extends CollectionItem
{
    // Documentation Missing
    protected function createItem(object $item, int $id) : object
    {
        return (object) [
            'key'       => $this->getProperty('key', $item),
            'value'      => $this->getProperty('value', $item),
        ];
    }
}
