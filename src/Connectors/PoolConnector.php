<?php

namespace Neubert\EvalancheInterface\Connectors;

use Neubert\EvalancheInterface\Behaviors\FolderBehavior;
use Neubert\EvalancheInterface\Behaviors\ResourceBehavior;
use Neubert\EvalancheInterface\Collections\Resources\Resource;

/**
 * @method Resource copyTo()
 * @method bool delete()
 * @method Resource get()
 * @method Resource getFolder()
 * @method Resource moveTo()
 * @see Neubert\EvalancheInterface\Behaviors\ResourceBehavior
 */
class PoolConnector extends Connector
{
    use ResourceBehavior;

    /**
     * Client Accessor
     *
     * @var string
     */
    protected $clientAccessor = 'Pool';
}
