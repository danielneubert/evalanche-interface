<?php

namespace Neubert\EvalancheInterface\Connectors;

use Neubert\EvalancheInterface\Behaviors\DetailsBehavior;
use Neubert\EvalancheInterface\Behaviors\ResourceBehavior;

/**
 * @method mixed getContent()
 * @see Neubert\EvalancheInterface\Behaviors\DetailsBehavior
 *
 * @method Resource get()
 * @method Resource getFolder()
 * @method bool delete()
 * @see Neubert\EvalancheInterface\Behaviors\ResourceBehavior
 */
class ContainerConnector extends Connector
{
    use DetailsBehavior, ResourceBehavior;

    /**
     * Client Accessor
     *
     * @var string
     */
    protected $clientAccessor = 'Container';
}
