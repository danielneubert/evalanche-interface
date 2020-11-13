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

    protected function _name() : string
    {
        $name = explode('\\', static::class);
        $name = array_pop($name);
        return explode('Connector', $name)[0];
    }

    protected function _id()
    {
        return $this->meta['id'];
    }

    protected function _folder()
    {
        return $this->meta['folder'];
    }

    protected function _interface()
    {
        return $this->interface;
    }

    public function getClient(? string $name = null)
    {
        return is_null($name)
            ? $this->interface->getClient($this->clientAccessor)
            : $this->interface->getClient($name);
    }

    public function getConnector(? string $name = null, array $meta = EvalancheConnector::CONNECTOR_DEFAULT)
    {
        return is_null($name)
            ? $this->interface->getConnector($this->clientAccessor, $meta)
            : $this->interface->getConnector($name, $meta);
    }
}
