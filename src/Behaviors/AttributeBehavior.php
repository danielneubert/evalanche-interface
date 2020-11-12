<?php

namespace Neubert\EvalancheInterface\Behaviors;

use Neubert\EvalancheInterface\Collections\Attributes\Attribute;
use Neubert\EvalancheInterface\Collections\Attributes\AttributeCollection;

/**
 * @method AttributeCollection getAttributes()
 * @method Attribute addAttribute(string $name, string $label, $type)
 * @method bool removeAttribute(int $attributeId)
 * @see Neubert\EvalancheInterface\Behaviors\AttributeBehavior
 */
trait AttributeBehavior
{
    // Documentation Missing
    public function getAttributes() : AttributeCollection
    {
        if (method_exists($this->getClient(), 'getAttributesByResourceId')) {
            // support inconsistent ContainerType API
            return new AttributeCollection($this->getClient()->getAttributesByResourceId($this->_id()), $this->_name(), $this);
        }

        if (method_exists($this->getClient(), 'getAttributesByPool')) {
            // support Pool API
            return new AttributeCollection($this->getClient()->getAttributesByPool($this->_id()), $this->_name(), $this);
        }

        return new AttributeCollection($this->getClient()->getAttributes($this->_id()), $this->_name(), $this);
    }

    // Documentation Missing
    public function addAttribute(string $name, string $label, $type) : Attribute
    {
        return new Attribute($this->getClient()->addAttribute($this->_id(), $name, $label, $type), $this->_name(), $this);
    }

    // Documentation Missing
    public function removeAttribute(int $attributeId) : bool
    {
        return $this->getClient()->removeAttribute($this->_id(), $attributeId);
    }
}
