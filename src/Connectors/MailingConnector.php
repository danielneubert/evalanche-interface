<?php

namespace Neubert\EvalancheInterface\Connectors;

use Neubert\EvalancheInterface\Behaviors\DetailsBehavior;
use Neubert\EvalancheInterface\Behaviors\ResourceBehavior;
use Neubert\EvalancheInterface\Collections\Mailings\MailingCollection;
use Neubert\EvalancheInterface\Collections\Resources\ResourceCollection;

/**
 * @method mixed getContent()
 * @see Neubert\EvalancheInterface\Behaviors\DetailsBehavior
 *
 * @method Resource get()
 * @method Resource getFolder()
 * @method bool delete()
 * @see Neubert\EvalancheInterface\Behaviors\ResourceBehavior
 */
class MailingConnector extends Connector
{
    use DetailsBehavior, ResourceBehavior;

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

    // Documentation Missing
    public function getPlanned(?int $mandator = null)
    {
        $mandator = $this->getDefaultValue('mandator', $mandator);

        if (is_null($mandator)) {
            // ! ERROR
            throw new \Exception("mandator fehlend");
        }

        return new MailingCollection($this->getClient()->getByTypeId(68, $mandator), 'Mailing', $this);
    }

    /**
     * Fetches all articles of a given mailing.
     *
     * @return ResourceCollection
     */
    public function getArticles(): ResourceCollection
    {
        return new ResourceCollection($this->getClient()->getArticlesByMailingId($this->_id()), 'Article', $this);
    }
}
