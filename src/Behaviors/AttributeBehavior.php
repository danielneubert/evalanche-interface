<?php

namespace Neubert\EvalancheInterface\Behaviors;

use Neubert\EvalancheInterface\Collections\Attributes\Attribute;
use Neubert\EvalancheInterface\Collections\Attributes\AttributeCollection;

/**
 * @method AttributeCollection getAttributes()
 * @method Attribute addAttribute(string $name, string $label, $type)
 * @method bool deleteAttribute(int $attributeId)
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
        return new Attribute(
            $this->getClient()->addAttribute(
                $this->_id(),
                $name,
                $label,
                $type
            ),
            $this->_name(),
            $this,
        );
    }

    // Documentation Missing
    public function deleteAttribute(? int $attributeId = null) : bool
    {
        return $this->getClient()->removeAttribute(
            $this->_id(),
            $this->_reference($attributeId),
        );
    }

    // Documentation Missing
    public function getOptions(? int $attributeId = null)
    {
        // check for containerType method
        if (method_exists($this->getClient(), 'getAttributeOptionsByResourceIdAndAttributeId')) {
            return $this->getClient()->getAttributeOptionsByResourceIdAndAttributeId(
                $this->_id(),
                $this->_reference($attributeId),
            );
        } else {
            return $this->getClient()->getAttributeOptions(
                $this->_id(),
                $this->_reference($attributeId),
            );
        }
    }

    // Documentation Missing
    public function addOption(string $label, ? int $attributeId = null)
    {
        // check for containerType method
        if (method_exists($this->getClient(), 'createAttributeOption')) {
            return $this->getClient()->createAttributeOption(
                $this->_id(),
                $this->_reference($attributeId),
                $label,
            );
        } else {
            return $this->getClient()->addAttributeOption(
                $this->_id(),
                $this->_reference($attributeId),
                $this->clientAccessor == 'Pool'
                    ? [$label]
                    : $label,
            );
        }
    }

    // ! Missing
    // Documentation Missing
    public function deleteOption(int $optionId, ? int $attributeId = null) : bool
    {
        // removeAttributeOption(int <article-type-id>,int <attribute-id>,int <attribute-option-id>): bool
        // removeAttributeOption(int <container-type-id> int <attribute-id>, int <attribute-option-id>): bool
        // deleteAttributeOption(int <pool-id>, int <attribute-id>, int <option-id>): PoolAttribute
        return false;
    }

    // Documentation Missing
    private function decomposeOptions(array $options) : array
    {
        return array_map(function ($option) {
            return $this->decomposeOption($option);
        }, $options);
    }

    // Documentation Missing
    private function decomposeOption(object $option) : object
    {
        return (object) [
            'id' => $option->getId(),
            'name' => $option->getName(),
            'label' => $option->getLabel(),
        ];
    }
}
