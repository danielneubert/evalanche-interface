<?php

namespace Neubert\EvalancheInterface\Connectors;

use Neubert\EvalancheInterface\Behaviors\GroupBehavior;
use Neubert\EvalancheInterface\Behaviors\ResourceBehavior;

/**
 * @method AttributeCollection getAttributes()
 * @method bool deleteAttribute(int $attributeId)
 * @see Neubert\EvalancheInterface\Behaviors\AttributeBehavior
 *
 * @method AttributeGroupCollection getGroups()
 * @method Attribute addAttribute(string $name, string $label, $type, int $groupId)
 * @method AttributeGroup addGroup(string $label)
 * @method bool deleteGroup(int $groupId)
 * @see Neubert\EvalancheInterface\Behaviors\GroupBehavior
 *
 * @method Resource get()
 * @method Resource getFolder()
 * @method bool delete()
 * @see Neubert\EvalancheInterface\Behaviors\ResourceBehavior
 */
class ArticleTypeConnector extends Connector
{
    use GroupBehavior, ResourceBehavior;

    /**
     * Client Accessor
     *
     * @var string
     */
    protected $clientAccessor = 'ArticleType';
}
