<?php

namespace Neubert\EvalancheInterface\Connectors;

use Neubert\EvalancheInterface\Behaviors\AttributeBehavior;
use Neubert\EvalancheInterface\Behaviors\ResourceBehavior;
use Neubert\EvalancheInterface\Collections\Resources\Resource;

/**
 * @method AttributeCollection getAttributes()
 * @method Attribute addAttribute(string $name, string $label, $type)
 * @method bool removeAttribute(int $attributeId)
 * @see Neubert\EvalancheInterface\Behaviors\AttributeBehavior#
 *
 * @method Resource copyTo()
 * @method bool delete()
 * @method Resource get()
 * @method Resource getFolder()
 * @method Resource moveTo()
 * @see Neubert\EvalancheInterface\Behaviors\ResourceBehavior
 */
class PoolConnector extends Connector
{
    use AttributeBehavior, ResourceBehavior;

    /**
     * Client Accessor
     *
     * @var string
     */
    protected $clientAccessor = 'Pool';
}
