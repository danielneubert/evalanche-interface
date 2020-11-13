<?php

namespace Neubert\EvalancheInterface\Behaviors;

use Neubert\EvalancheInterface\Collections\Resources\Resource;
use Neubert\EvalancheInterface\Collections\Resources\ResourceCollection;
use Scn\EvalancheSoapStruct\Struct\Generic\HashMap;

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
 * @method ResourceCollection getPools()
 * @method ResourceCollection getSmartlinks()
 * @method ResourceCollection getTargetGroups()
 * @see Neubert\EvalancheInterface\Behaviors\FolderBehavior
 */
trait FolderBehavior
{
    /**
     * ------------------------------------------------------------
     * Create Methods
     * ------------------------------------------------------------
     */

    // Documentation Missing
    public function createArticle(string $name, int $articleType, array $content)
    {
        return new Resource($this->getClient('Article')->create($articleType, $name, $this->_id(), new HashMap([])), 'Article', $this);
    }

    // Documentation Missing
    public function createArticleTemplate(string $name, int $templateType, string $template)
    {
        return new Resource($this->getClient('ArticleTemplate')->create($name, $templateType, $template, $this->_id()), 'ArticleTemplate', $this);
    }

    // Documentation Missing
    public function createArticleType(string $name)
    {
        return new Resource($this->getClient('ArticleType')->create($name, $this->_id()), 'ArticleType', $this);
    }

    // Documentation Missing
    // public function createContainer()
    // {
    //     return null;
    // }

    // Documentation Missing
    public function createContainerType(string $name)
    {
        return new Resource($this->getClient('ContainerType')->create($name, $this->_id()), 'ContainerType', $this);
    }

    // Documentation Missing
    // public function createCouponList()
    // {
    //     return null;
    // }


    // Documentation Missing
    // public function createDocument()
    // {
    //     return null;
    // }

    // Documentation Missing
    public function createFolder(string $name)
    {
        return new Resource($this->getClient('Folder')->create($name, $this->_id()), 'Folder', $this);
    }

    // Documentation Missing
    // public function createForm()
    // {
    //     return null;
    // }

    // Documentation Missing
    // public function createImage()
    // {
    //     return null;
    // }

    // Documentation Missing
    // public function createMailing()
    // {
    //     return null;
    // }

    // Documentation Missing
    // public function createMailingTemplate()
    // {
    //     return null;
    // }

    // Documentation Missing
    // public function createSmartlink()
    // {
    //     return null;
    // }

    // Documentation Missing
    // public function createTargetGroup()
    // {
    //     return null;
    // }



    /**
     * ------------------------------------------------------------
     * Get Methods
     * ------------------------------------------------------------
     */

    public function getArticles() : ResourceCollection
    {
        return new ResourceCollection($this->getClient('Article')->getByFolderId($this->_id()), 'Article', $this);
    }

    // Documentation Missing
    public function getArticleTemplates() : ResourceCollection
    {
        return new ResourceCollection($this->getClient('ArticleTemplate')->getByFolderId($this->_id()), 'ArticleTemplate', $this);
    }

    // Documentation Missing
    public function getArticleTypes() : ResourceCollection
    {
        return new ResourceCollection($this->getClient('ArticleType')->getByFolderId($this->_id()), 'ArticleType', $this);
    }

    // Documentation Missing
    public function getContainers() : ResourceCollection
    {
        return new ResourceCollection($this->getClient('Container')->getByFolderId($this->_id()), 'Container', $this);
    }

    // Documentation Missing
    public function getContainerTypes() : ResourceCollection
    {
        return new ResourceCollection($this->getClient('ContainerType')->getByFolderId($this->_id()), 'ContainerType', $this);
    }

    // Documentation Missing
    public function getCouponLists() : ResourceCollection
    {
        return new ResourceCollection($this->getClient('CouponList')->getByFolderId($this->_id()), 'CouponList', $this);
    }

    // Documentation Missing
    public function getDocuments() : ResourceCollection
    {
        return new ResourceCollection($this->getClient('Document')->getByFolderId($this->_id()), 'Document', $this);
    }

    // Documentation Missing
    public function getFolders() : ResourceCollection
    {
        return new ResourceCollection($this->getClient('Folder')->getSubFolderById($this->_id()), 'Folder', $this);
    }

    // Documentation Missing
    public function getForms() : ResourceCollection
    {
        return new ResourceCollection($this->getClient('Form')->getByFolderId($this->_id()), 'Form', $this);
    }

    // Documentation Missing
    public function getImages() : ResourceCollection
    {
        return new ResourceCollection($this->getClient('Image')->getByFolderId($this->_id()), 'Image', $this);
    }

    // Documentation Missing
    public function getMailings() : ResourceCollection
    {
        return new ResourceCollection($this->getClient('Mailing')->getByFolderId($this->_id()), 'Mailing', $this);
    }

    // Documentation Missing
    public function getMailingTemplates() : ResourceCollection
    {
        return new ResourceCollection($this->getClient('MailingTemplate')->getByFolderId($this->_id()), 'MailingTemplate', $this);
    }

    // Documentation Missing
    public function getPools() : ResourceCollection
    {
        return new ResourceCollection($this->getClient('Pool')->getByFolderId($this->_id()), 'Pool', $this);
    }

    // Documentation Missing
    public function getSmartlinks() : ResourceCollection
    {
        return new ResourceCollection($this->getClient('Smartlink')->getByFolderId($this->_id()), 'Smartlink', $this);
    }

    // Documentation Missing
    public function getTargetGroups() : ResourceCollection
    {
        return new ResourceCollection($this->getClient('TargetGroup')->getByFolderId($this->_id()), 'TargetGroup', $this);
    }
}
