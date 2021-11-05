<?php

namespace Neubert\EvalancheInterface\Behaviors;

use Neubert\EvalancheInterface\Collections\Details\Details;
use Neubert\EvalancheInterface\Collections\Details\DetailsCollection;
use Neubert\EvalancheInterface\EvalancheInterface;

/**
 * @method AttributeCollection getDetails()
 * @see Neubert\EvalancheInterface\Behaviors\DetailsBehavior
 */
trait DetailsBehavior
{
    /**
     * --------------------------------------------------
     * Details
     * --------------------------------------------------
     */

    /**
     * Receive all Details for the resource.
     *
     * @return DetailsCollection
     */
    public function getDetails() : DetailsCollection
    {
        return new DetailsCollection($this->getClient()->getDetailById($this->_id())->getItems(), $this->_name(), $this);


    }

}
