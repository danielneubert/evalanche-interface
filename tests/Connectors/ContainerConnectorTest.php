<?php

namespace Connectors;

use Neubert\EvalancheInterface\Tests\Behaviors\ResourceBehaviorTestCase;
use Neubert\EvalancheInterface\Tests\Connectors\ConnectorTestCase;

class ContainerConnectorTest extends ConnectorTestCase
{
    use ResourceBehaviorTestCase;

    /**
     * Client Accessor
     *
     * @var string
     */
    protected $clientAccessor = 'Container';
}
