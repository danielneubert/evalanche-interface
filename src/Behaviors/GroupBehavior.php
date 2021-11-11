<?php

namespace Neubert\EvalancheInterface\Behaviors;

use Neubert\EvalancheInterface\Behaviors\AttributeBehavior;
use Neubert\EvalancheInterface\Collections\Attributes\Attribute;
use Neubert\EvalancheInterface\Collections\Attributes\Group;
use Neubert\EvalancheInterface\Collections\Attributes\GroupCollection;

/**
 * @method AttributeCollection getAttributes()
 * @method bool deleteAttribute(? int $attributeId = null)
 * @method OptionCollection getOptions(? int $attributeId = null)
 * @method Option addOption(string $label, ? int $attributeId = null)
 * @method bool deleteOption(int $optionId, ? int $attributeId = null)
 * @see Neubert\EvalancheInterface\Behaviors\AttributeBehavior
 *
 * @method GroupCollection getGroups()
 * @method Attribute addAttribute(string $name, string $label, $type, ? int $groupId = null)
 * @method Group addGroup(string $label)
 * @method bool deleteGroup(? int $groupId = null)
 * @see Neubert\EvalancheInterface\Behaviors\GroupBehavior
 */
trait GroupBehavior
{
    use AttributeBehavior;

    /**
     * Add an attribute to the resource.
     *
     * @param  string          $name
     * @param  string          $label
     * @param  string|integer  $type
     * @param  integer|null    $groupId
     * @return Attribute
     */
    public function addAttribute(string $name, string $label, $type, ?int $groupId = null): Attribute
    {
        return new Attribute(
            $this->getClient()->addAttribute(
                $this->_id(),
                $name,
                $label,
                $this->_resolveType($type),
                $this->_reference($groupId),
            ),
            $this->_name(),
            $this,
        );
    }

    /**
     * Receive all attribute groups for the resource.
     *
     * @return GroupCollection
     */
    public function getGroups(): GroupCollection
    {
        // support for inconsitent ContainerType API
        return new GroupCollection(method_exists($this->getClient(), 'getAttributeGroupsByResourceId')
            ? $this->getClient()->getAttributeGroupsByResourceId($this->_id())
            : $this->getClient()->getAttributeGroups($this->_id()), $this->_name(), $this);
    }

    /**
     * Add a attribute group to the resource.
     *
     * @param  string  $label
     * @return Group
     */
    public function addGroup(string $label): Group
    {
        return new Group($this->getClient()->addAttributeGroup($this->_id(), $label), $this->_name(), $this);
    }

    /**
     * Deletes an attribute group from the resource.
     *
     * @param  integer|null  $groupId
     * @return boolean
     */
    public function deleteGroup(?int $groupId = null): bool
    {
        return $this->getClient()->removeAttributeGroup(
            $this->_id(),
            $this->_reference($groupId),
        );
    }
}
