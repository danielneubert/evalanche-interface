<?php

namespace Neubert\EvalancheInterface\Connectors;

use Neubert\EvalancheInterface\Behaviors\ResourceBehavior;

/**
 * @method Resource get()
 * @method Resource getFolder()
 * @method bool delete()
 * @see Neubert\EvalancheInterface\Behaviors\ResourceBehavior
 */
class MailingConnector extends Connector
{
    use ResourceBehavior;

    /**
     * Client Accessor
     *
     * @var string
     */
    protected $clientAccessor = 'Mailing';

    // Documentation Missing
    public function sendTo(array $profileIds)
    {
        return $this->getClient('Mailing')->sendToProfiles(
            $this->_id(),
            $profileIds
        );
    }

    // Documentation Missing
    public function getConfiguration()
    {
        return $this->getClient('Mailing')->getConfiguration(
            $this->_id()
        );
    }

    // Documentation Missing
    public function setTitle(string $title)
    {
        return $this->getClient('Mailing')->updateTitle(
            $this->_id(),
            $title
        );
    }
}
