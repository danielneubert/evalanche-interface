<?php

namespace Neubert\EvalancheInterface\Connectors;

use Neubert\EvalancheInterface\Support\HashMap;
use Neubert\EvalancheInterface\Behaviors\ResourceBehavior;

/**
 * @method Resource get()
 * @method Resource getFolder()
 * @method bool delete()
 * @see Neubert\EvalancheInterface\Behaviors\ResourceBehavior
 */
class ContainerConnector extends Connector
{
    use ResourceBehavior;

    /**
     * Client Accessor
     *
     * @var string
     */
    protected $clientAccessor = 'Container';

    // ! Documentation Missing
    public function getContent(?string $field = null)
    {
        $field = is_string($field) ? strtoupper($field) : null;
        $response = HashMap::decompose($this->getClient()->getDetailById($this->_id()));
        return !is_null($field)
            ? (isset($response[strtoupper($field)]) ? $response[strtoupper($field)] : null)
            : $response;
    }
}
