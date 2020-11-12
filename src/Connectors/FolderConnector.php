<?php

namespace Neubert\EvalancheInterface\Connectors;

use Neubert\EvalancheInterface\Behaviors\FolderBehavior;
use Neubert\EvalancheInterface\Behaviors\ResourceBehavior;
use Neubert\EvalancheInterface\Collections\Resources\Resource;

/**
 * @method Resource createArticles()
 * ! [Mising] @method Resource createArticleTemplates()
 * @method Resource createArticleTypes()
 * ! [Mising] @method Resource createContainers()
 * @method Resource createContainerTypes()
 * ! [Mising] @method Resource createCouponLists()
 * ! [Mising] @method Resource createDocuments()
 * @method Resource createFolders()
 * ! [Mising] @method Resource createForms()
 * ! [Mising] @method Resource createImages()
 * ! [Mising] @method Resource createMailings()
 * ! [Mising] @method Resource createMailingTemplates()
 * ! [Mising] @method Resource createSmartlinks()
 * ! [Mising] @method Resource createTargetGroups()
 * @method ResourceCollection getArticles()
 * @method ResourceCollection getArticleTemplates()
 * @method ResourceCollection getArticleTypes()
 * @method ResourceCollection getContainers()
 * @method ResourceCollection getContainerTypes()
 * @method ResourceCollection getCouponLists()
 * @method ResourceCollection getDocuments()
 * @method ResourceCollection getFolders()
 * @method ResourceCollection getForms()
 * @method ResourceCollection getImages()
 * @method ResourceCollection getMailings()
 * @method ResourceCollection getMailingTemplates()
 * @method ResourceCollection getSmartlinks()
 * @method ResourceCollection getTargetGroups()
 * @see Neubert\EvalancheInterface\Behaviors\FolderBehavior
 *
 * @method Resource getFolder()
 * @see Neubert\EvalancheInterface\Behaviors\ResourceBehavior
 */
class FolderConnector extends Connector
{
    use FolderBehavior, ResourceBehavior;

    /**
     * Client Accessor
     *
     * @var string
     */
    protected $clientAccessor = 'Folder';

    // Documentation Missing
    public function get() : Resource
    {
        // support for inconsitent Folder API
        return new Resource($this->getClient()->get($this->_id()), 'Folder', $this);
    }

    // Documentation Missing
    public function delete()
    {
        // support for inconsitent Folder API (doesn't return a bool)
        return $this->getClient()->delete($this->_id());
    }
}
