<?php

namespace Neubert\EvalancheInterface\Collections\Profiles;

use Neubert\EvalancheInterface\Collections\Collection;

class ProfileCollection extends Collection
{
    /**
     * Defines the Class all collection items should be populated with.
     *
     * @var string
     */
    protected $itemClass = Profile::class;
}
