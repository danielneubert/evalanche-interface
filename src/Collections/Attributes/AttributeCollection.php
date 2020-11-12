<?php

namespace Neubert\EvalancheInterface\Collections\Attributes;

use Neubert\EvalancheInterface\Collections\Collection;

class AttributeCollection extends Collection
{
    /**
     * Defines the Class all collection items should be populated with.
     *
     * @var string
     */
    protected $itemClass = Attribute::class;
}
