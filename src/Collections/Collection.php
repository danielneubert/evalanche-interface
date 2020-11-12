<?php

namespace Neubert\EvalancheInterface\Collections;

use ArrayIterator;
use JsonSerializable;
use IteratorAggregate;
use Neubert\EvalancheInterface\EvalancheConnector;

class Collection implements IteratorAggregate, JsonSerializable
{
    /**
     * The items contained in the collection.
     *
     * @var array
     */
    protected $items;



    /**
     * ------------------------------------------------------------
     * Callable Methods
     * ------------------------------------------------------------
     */

    /**
     * Get all of the items in the collection.
     *
     * @return array
     */
    public function all() : array
    {
        return $this->items;
    }

    /**
     * Count the number of items in the collection.
     *
     * @return integer
     */
    public function count() : int
    {
        return count($this->items);
    }

    /**
     * Execute a callback over each item.
     *
     * @param  callable  $callback
     * @return $this
     */
    public function each(callable $callback)
    {
        foreach ($this as $key => $item) {
            if ($callback($item, $key) === false) {
                break;
            }
        }

        return $this;
    }

    /**
     * Run a filter over each of the items.
     *
     * @param  callable|null  $callback
     * @return $this
     */
    public function filter(callable $callback)
    {
        $this->items = array_filter($this->items, $handler, ARRAY_FILTER_USE_BOTH);
        return $this;
    }

    /**
     * Get the first item from the collection passing the given truth test.
     *
     * @param  callable|null  $callback
     * @param  mixed  $default
     * @return mixed
     */
    public function first(? callable $callback = null, $default = null)
    {
        if ($this->isEmpty()) {
            return $default;
        }

        foreach ($this->items as $key => $value) {
            if (is_null($callback) || $callback($value, $key)) {
                return $value;
            }
        }

        return $default;
    }

    /**
     * Determine if the collection is empty or not.
     *
     * @return bool
     */
    public function isEmpty() : bool
    {
        return empty($this->items);
    }

    /**
     * Determine if the collection is not empty.
     *
     * @return bool
     */
    public function isNotEmpty() : bool
    {
        return !empty($this->items);
    }

    /**
     * Run a map over each of the items.
     *
     * @param  callable  $callback
     * @return $this
     */
    public function map(callable $callback)
    {
        $keys = array_keys($this->items);
        $items = array_map($callback, $this->items, $keys);
        $this->items = array_combine($keys, $items);
        return $this;
    }



    /**
     * ------------------------------------------------------------
     * Internal Methods
     * ------------------------------------------------------------
     */

    /**
     * Create new instance.
     *
     * @param array $items
     */
    public function __construct(array $items, string $type, $connector)
    {
        $this->items = array_map(function ($item) use ($type, $connector) {
            return new $this->itemClass($item, $type, $connector);
        }, $items);
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
        return $this->all();
    }

    /**
     * IteratorAggregate
     * Enable direct foreach() loops on collections.
     *
     * @return array
     */
    public function getIterator() : ArrayIterator
    {
        return new ArrayIterator($this->all());
    }

    /**
     * var_dump()
     * Streamlines the contents for var_dump().
     *
     * @return array
     */
    public function __debugInfo()
    {
        return $this->all();
    }
}
