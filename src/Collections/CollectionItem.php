<?php

namespace Neubert\EvalancheInterface\Collections;

use JsonSerializable;
use Neubert\EvalancheInterface\EvalancheInterface;

class CollectionItem implements JsonSerializable
{
    /**
     * Name of the connector type.
     *
     * @var string
     */
    private $type;

    /**
     * The wrapped item.
     *
     * @var object
     */
    private $item;

    /**
     * Instance of the connector.
     *
     * @var mixed
     */
    private $connector;

    /**
     * ------------------------------------------------------------
     * Internal Methods
     * ------------------------------------------------------------
     */

    /**
     * Create new instance.
     *
     * @param object $item
     * @param string $type
     * @param mixed  $connector
     */
    public function __construct(object $item, string $type, $connector)
    {
        $this->type = $type;
        $this->item = method_exists($this, 'createItem') ? $this->createItem($item, $connector->getId()) : $item;
        $this->connector = $connector->getConnector($type, EvalancheInterface::newMeta([
            'id' => $this->item->_id ?? ($this->item->id ?? null),
            'folder' => $this->item->folder ?? null,
            'reference' => $this->item->_reference ?? ($this->item->id ?? null),
            'resultCache' => $item,
        ]));
    }

    /**
     * Returns the value of an Evalanche result via their corelated getter-method.
     *
     * @param  string       $name
     * @param  object|null  $item
     * @return void
     */
    protected function getProperty(string $name, ? object $item = null)
    {
        $name = ucfirst($name);
        return method_exists($item ?? $this->item, "get{$name}")
            ? call_user_func([$item ?? $this->item, "get{$name}"])
            : null;
    }



    /**
     * ------------------------------------------------------------
     * Callable Methods
     * ------------------------------------------------------------
     */

    /**
     * Returns an array representation of the item content.
     *
     * @return array
     */
    public function toArray() : array
    {
        $item = $this->item;

        if (isset($item->_id)) {
            unset($item->_id);
        }

        if (isset($item->_reference)) {
            unset($item->_reference);
        }

        return (array) $item;
    }



    /**
     * ------------------------------------------------------------
     * Magic PHP Methods
     * ------------------------------------------------------------
     */

    /**
     * JsonSerializable
     * Enable direct json_encode() on collections.
     *
     * @return array
     */
    public function jsonSerialize() : array
    {
        return $this->toArray();
    }

    /**
     * var_dump()
     * Streamlines the contents for var_dump().
     *
     * @return array
     */
    public function __debugInfo()
    {
        return $this->toArray();
    }

    /**
     * Direct access to the item properties.
     *
     * @param  string  $method
     * @return mixed
     */
    public function __get(string $name)
    {
        if (property_exists($this->item, $name)) {
            return $this->item->$name;
        }

        trigger_error("Undefined property: Neubert\EvalancheInterface\Collections\CollectionItem::{$name}", E_USER_NOTICE);
    }

    /**
     * Triggers error when an item property should be overwritten.
     *
     * @param  string  $method
     * @return void
     */
    public function __set(string $name, $value)
    {
        if (property_exists($this->item, $name)) {
            trigger_error("Cannot write to property Neubert\EvalancheInterface\Collections\CollectionItem::{$name}", E_USER_ERROR);
        }

        trigger_error("Undefined property: Neubert\EvalancheInterface\Collections\CollectionItem::{$name}", E_USER_NOTICE);
    }

    /**
     * Handles all calls that are not defined above and routes them to the correlated Connector if possible.
     *
     * @param  string  $method
     * @param  array   $arguments
     * @return mixed
     */
    public function __call(string $method, array $arguments)
    {
        if (method_exists($this->connector, $method)) {
            return call_user_func_array([$this->connector, $method], $arguments);
        }

        trigger_error("Call to undefined method Neubert\EvalancheInterface\Collections\CollectionItem::{$method}()", E_USER_ERROR);
    }
}
