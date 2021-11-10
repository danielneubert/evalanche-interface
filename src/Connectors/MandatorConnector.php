<?php

namespace Neubert\EvalancheInterface\Connectors;

/**
 * @method Resource get()
 * @method Resource getFolder()
 * @method bool delete()
 * @see Neubert\EvalancheInterface\Behaviors\ResourceBehavior
 */
class MandatorConnector extends Connector
{
    /**
     * Client Accessor
     *
     * @var string
     */
    protected $clientAccessor = 'Mandator';

    // ! DOCU MISSING
    public function get()
    {
        return $this->getClient()->getById($this->_id());
    }

    // ! DOCU MISSING
    public function getList()
    {
        return $this->getClient()->getList();
    }
}
