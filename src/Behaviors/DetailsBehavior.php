<?php

namespace Neubert\EvalancheInterface\Behaviors;

use Neubert\EvalancheInterface\Support\HashMap;

/**
 * @method mixed getContent()
 * @see Neubert\EvalancheInterface\Behaviors\DetailBehavior
 */
trait DetailsBehavior
{
    /**
     * Fetch one or all details of an object.
     *
     * @param  string|null  $field
     * @return mixed
     */
    public function getDetails(?string $field = null)
    {
        $field = is_string($field) ? strtoupper($field) : null;
        $details = $this->clientAccessor == 'Mailing'
            ? $this->getClient()->getDetailsById($this->_id())
            : $this->getClient()->getDetailById($this->_id());

        $response = HashMap::decompose($details);

        if (is_null($field)) {
            return $response;
        }

        return isset($response[$field])
            ? $response[$field]
            : null;
    }
}
