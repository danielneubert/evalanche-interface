<?php

namespace Neubert\EvalancheInterface\Behaviors;

use Scn\EvalancheSoapApiConnector\Client\Pool\PoolClient;
use Neubert\EvalancheInterface\Collections\Attributes\Attribute;
use Neubert\EvalancheInterface\Collections\Attributes\AttributeCollection;
use Neubert\EvalancheInterface\Collections\Attributes\Option;
use Neubert\EvalancheInterface\Collections\Attributes\OptionCollection;
use Neubert\EvalancheInterface\EvalancheInterface;

/**
 * @method AttributeCollection getAttributes()
 * @method Attribute addAttribute(string $name, string $label, $type)
 * @method bool deleteAttribute(? int $attributeId = null)
 * @method OptionCollection getOptions(? int $attributeId = null)
 * @method Option addOption(string $label, ? int $attributeId = null)
 * @method bool deleteOption(int $optionId, ? int $attributeId = null)
 * @see Neubert\EvalancheInterface\Behaviors\AttributeBehavior
 */
trait AttributeBehavior
{
    /**
     * --------------------------------------------------
     * Attributes
     * --------------------------------------------------
     */

    /**
     * Receive all attributes for the resource.
     *
     * @return AttributeCollection
     */
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

    /**
     * Add an attribute to the resource.
     *
     * @param  string          $name
     * @param  string          $label
     * @param  string|integer  $type
     * @return Attribute
     */
    public function addAttribute(string $name, string $label, $type) : Attribute
    {
        return new Attribute(
            $this->getClient()->addAttribute(
                $this->_id(),
                $name,
                $label,
                $this->_resolveType($type),
            ),
            $this->_name(),
            $this,
        );
    }

    /**
     * Deletes an attribute from the resource.
     *
     * @param  integer|null  $attributeId
     * @return boolean
     */
    public function deleteAttribute(? int $attributeId = null) : bool
    {
        return $this->getClient()->removeAttribute(
            $this->_id(),
            $this->_reference($attributeId),
        );
    }



    /**
     * --------------------------------------------------
     * Attribute Options
     * --------------------------------------------------
     */

    /**
     * Receive all options for the attribute.
     *
     * @param  integer|null  $attributeId
     * @return void
     */
    public function getOptions(? int $attributeId = null) : OptionCollection
    {
        if ($this->clientAccessor == 'Pool') {
            if (is_null($this->getMeta('resultCache'))) {
                trigger_error("Attribute options can't be accessed without fetching all attributes. (getAttributes)", E_USER_ERROR);
            }

            return new OptionCollection(
                $this->getMeta('resultCache')->getOptions(),
                $this->_name(),
                $this,
            );
        } else {
            if (method_exists($this->getClient(), 'getAttributeOptionsByResourceIdAndAttributeId')) {
                // support for containerType
                return new OptionCollection(
                    $this->getClient()->getAttributeOptionsByResourceIdAndAttributeId(
                        $this->_id(),
                        $this->_reference($attributeId),
                    ),
                    $this->_name(),
                    $this,
                );
            } else {
                return new OptionCollection(
                    $this->getClient()->getAttributeOptions(
                        $this->_id(),
                        $this->_reference($attributeId),
                    ),
                    $this->_name(),
                    $this,
                );
            }
        }
    }

    /**
     * Add an option to the attribute.
     *
     * @param  string        $label
     * @param  integer|null  $attributeId
     * @return void
     */
    public function addOption(string $label, ? int $attributeId = null) : Option
    {
        if (method_exists($this->getClient(), 'createAttributeOption')) {
            // support for articleType
            return new Option(
                $this->getClient()->createAttributeOption(
                    $this->_id(),
                    $this->_reference($attributeId),
                    $label,
                ),
                $this->_name(),
                $this,
            );
        } else {
            return new Option(
                $this->getClient()->addAttributeOption(
                    $this->_id(),
                    $this->_reference($attributeId),
                    $this->clientAccessor == 'Pool'
                        ? [$label]
                    : $label,
                ),
                $this->_name(),
                $this,
            );
        }
    }

    /**
     * Deletes an option from the attribute.
     *
     * @param  integer       $optionId
     * @param  integer|null  $attributeId
     * @return boolean
     */
    public function deleteOption(int $optionId, ? int $attributeId = null) : bool
    {
        if (method_exists($this->getClient(), 'deleteAttributeOption')) {
            // support for pool
            return $this->getClient()->deleteAttributeOption(
                $this->_id(),
                $this->_reference($attributeId),
                $optionId,
            );
        } else {
            return $this->getClient()->removeAttributeOption(
                $this->_id(),
                $this->_reference($attributeId),
                $optionId,
            );
        }
    }



    /**
     * --------------------------------------------------
     * Internal Method
     * --------------------------------------------------
     */

    /**
     * Resolves the given type wether it's an integer or a string and returns the type id.
     *
     * @param  integer|string  $type
     * @return integer
     */
    protected function _resolveType($type) : int
    {
        $given = $type;

        $attributeTypes = $this->clientAccessor == 'Pool'
            ? EvalancheInterface::ATTRIBUTE_TYPES_POOL
            : EvalancheInterface::ATTRIBUTE_TYPES;

        if (is_string($type) && in_array($type, $attributeTypes)) {
            $type = array_search($type, $attributeTypes);
        }

        if (!is_numeric($type)) {
            $trace = debug_backtrace();
            array_shift($trace);
            $trace = array_shift($trace);
            trigger_error("Undefined attribue type \"{$given}\": {$trace['class']}::{$trace['function']}", E_USER_ERROR);
        }

        return $type;
    }
}
