<?php

namespace Neubert\EvalancheInterface\Collections\Resources;

use Neubert\EvalancheInterface\Collections\Collection;

class ResourceCollection extends Collection
{
    /**
     * Defines the Class all collection items should be populated with.
     *
     * @var string
     */
    protected $itemClass = Resource::class;
}
