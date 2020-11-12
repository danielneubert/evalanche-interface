<?php

namespace Connectors;

use Neubert\EvalancheInterface\Tests\Behaviors\AttributeGroupBehaviorTestCase;
use Neubert\EvalancheInterface\Tests\Behaviors\ResourceBehaviorTestCase;
use Neubert\EvalancheInterface\Tests\Connectors\ConnectorTestCase;

class ContainerTypeConnectorTest extends ConnectorTestCase
{
    use ResourceBehaviorTestCase, AttributeGroupBehaviorTestCase;

    /**
     * Client Accessor
     *
     * @var string
     */
    protected $clientAccessor = 'ContainerType';
}
