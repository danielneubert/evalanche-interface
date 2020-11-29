<?php

namespace Neubert\EvalancheInterface\Connectors;

use Neubert\EvalancheInterface\Collections\Profiles\Profile;
use Neubert\EvalancheInterface\Support\HashMap;

/**
 */
class ProfileConnector extends Connector
{
    /**
     * Client Accessor
     *
     * @var string
     */
    protected $clientAccessor = 'Profile';

    // Documentation Missing
    public function get(): Profile
    {
        return new Profile($this->getClient()->getById($this->_id()), 'Profile', $this);
    }

    // Documentation Missing
    public function update(array $fields)
    {
        return $this->getClient()->updateById($this->_id(), HashMap::compose($fields));
    }

    // Documentation Missing
    public function delete(): bool
    {
        return $this->getClient()->delete([$this->_id()]);
    }
}
