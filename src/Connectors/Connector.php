<?php

namespace Neubert\EvalancheInterface\Connectors;

use Neubert\EvalancheInterface\EvalancheInterface;

class Connector
{
    private $meta = null;
    private $connector = null;

    public function __construct(EvalancheInterface $connector)
    {
        $this->connector = $connector;
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

    public function getClient(? string $name = null)
    {
        return is_null($name)
            ? $this->connector->getClient($this->clientAccessor)
            : $this->connector->getClient($name);
    }

    public function getConnector(? string $name = null, array $meta = EvalancheConnector::CONNECTOR_DEFAULT)
    {
        return is_null($name)
            ? $this->connector->getConnector($this->clientAccessor, $meta)
            : $this->connector->getConnector($name, $meta);
    }
}
