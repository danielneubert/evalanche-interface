<?php

namespace Neubert\EvalancheInterface\Collections\Profiles;

use Neubert\EvalancheInterface\Collections\CollectionItem;
use Neubert\EvalancheInterface\EvalancheInterface;
use Neubert\EvalancheInterface\Support\HashMap;

class Profile extends CollectionItem
{
    // Documentation Missing
    protected function createItem(object $item) : object
    {
        $item = HashMap::decompose($item);

        return (object) array_merge(
            [
                'id' => $item['PROFILEID'] ?? null,
            ],
            $item
        );
    }

    /**
     * var_dump()
     * Streamlines the contents for var_dump().
     *
     * @return array
     */
    public function __debugInfo()
    {
        return array_filter($this->toArray(), function ($value, $key) {
            return $key != 'id';
        }, ARRAY_FILTER_USE_BOTH);
    }
}
