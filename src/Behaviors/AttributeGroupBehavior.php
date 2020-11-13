<?php

namespace Neubert\EvalancheInterface\Behaviors;

use Neubert\EvalancheInterface\Behaviors\AttributeBehavior;
use Neubert\EvalancheInterface\Collections\Attributes\Attribute;
use Neubert\EvalancheInterface\Collections\Attributes\Group;
use Neubert\EvalancheInterface\Collections\Attributes\GroupCollection;

/**
 * @method AttributeCollection getAttributes()
 * @method bool deleteAttribute(int $attributeId)
 * @see Neubert\EvalancheInterface\Behaviors\AttributeBehavior
 *
 * @method AttributeGroupCollection getGroups()
 * @method Attribute addAttribute(string $name, string $label, $type, int $groupId)
 * @method AttributeGroup addGroup(string $label)
 * @method bool deleteGroup(int $groupId)
 * @see Neubert\EvalancheInterface\Behaviors\AttributeGroupBehavior
 */
trait AttributeGroupBehavior
{
    use AttributeBehavior;

    // Documentation Missing
    public function getGroups() : GroupCollection
    {
        // support for inconsitent ContainerType API
        return new GroupCollection(method_exists($this->getClient(), 'getAttributeGroupsByResourceId')
                ? $this->getClient()->getAttributeGroupsByResourceId($this->_id())
                : $this->getClient()->getAttributeGroups($this->_id()), $this->_name(), $this);
    }

    // Documentation Missing (Overwrites the AttributeBehavior::addAttribute())
    public function addAttribute(string $name, string $label, $type, int $groupId) : Attribute
    {
        return new Attribute($this->getClient()->addAttribute($this->_id(), $name, $label, $type, $groupId), $this->_name(), $this);
    }

    // Documentation Missing
    public function addGroup(string $label) : Group
    {
        return new Group($this->getClient()->addAttributeGroup($this->_id(), $label), $this->_name(), $this);
    }

    // Documentation Missing
    public function deleteGroup(int $groupId) : bool
    {
        return $this->getClient()->removeAttributeGroup($this->_id(), $groupId);
    }
}
