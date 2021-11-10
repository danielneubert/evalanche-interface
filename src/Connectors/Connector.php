<?php

namespace Neubert\EvalancheInterface\Connectors;

use Neubert\EvalancheInterface\EvalancheInterface;

class Connector
{
    private $meta = null;
    private $interface = null;

    public function __construct(EvalancheInterface $interface)
    {
        $this->interface = $interface;
    }

    public function setMeta(array $meta)
    {
        $this->meta = $meta;
    }

    protected function _name(): string
    {
        $name = explode('\\', static::class);
        $name = array_pop($name);
        return explode('Connector', $name)[0];
    }

    protected function _id()
    {
        return $this->meta['id'];
    }

    public function getId()
    {
        return $this->_id();
    }

    protected function _folder()
    {
        return $this->meta['folder'];
    }

    protected function _interface()
    {
        return $this->interface;
    }

    protected function getMeta(string $key)
    {
        return $this->meta[$key] ?? null;
    }

    protected function _reference(?int $default = null)
    {
        $value = $this->meta['reference'] ?? $default;

        if (is_null($value)) {
            $trace = debug_backtrace();
            array_shift($trace);
            $trace = array_shift($trace);
            trigger_error("Uncaught ArgumentError: No reference passed for method {$trace['class']}::{$trace['function']}", E_USER_ERROR);
        }

        return $value;
    }

    public function getDefaultValue(string $key, ?int $fallbackValue = null)
    {
        return $this->interface->getDefaultValue($key, $fallbackValue);
    }

    public function getClient(?string $name = null)
    {
        return is_null($name)
            ? $this->interface->getClient($this->clientAccessor)
            : $this->interface->getClient($name);
    }

    public function getConnector(?string $name = null, array $meta = EvalancheConnector::CONNECTOR_DEFAULT)
    {
        return is_null($name)
            ? $this->interface->getConnector($this->clientAccessor, $meta)
            : $this->interface->getConnector($name, $meta);
    }
}
