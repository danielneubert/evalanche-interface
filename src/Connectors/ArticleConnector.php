<?php

namespace Neubert\EvalancheInterface\Connectors;

use Neubert\EvalancheInterface\Behaviors\ResourceBehavior;
use Neubert\EvalancheInterface\Behaviors\DetailsBehavior;

/**
 * @method Resource get()
 * @method Resource getFolder()
 * @method bool delete()
 * @see Neubert\EvalancheInterface\Behaviors\ResourceBehavior
 */
class ArticleConnector extends Connector
{
    use ResourceBehavior,DetailsBehavior;

    /**
     * Client Accessor
     *
     * @var string
     */
    protected $clientAccessor = 'Article';
}
