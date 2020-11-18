<?php

namespace Neubert\EvalancheInterface\Behaviors;

use Neubert\EvalancheInterface\Collections\Resources\Resource;

/**
 * @method Resource get()
 * @method Resource getFolder()
 * @method Resource moveTo(int $folderId)
 * @method Resource copyTo(int $folderId)
 * @method bool delete()
 * @see Neubert\EvalancheInterface\Behaviors\ResourceBehavior
 */
trait ResourceBehavior
{
    /**
     * Receive all informations about the resource.
     *
     * @return Resource
     */
    public function get() : Resource
    {
        return new Resource($this->getClient()->getById($this->_id()), $this->_name(), $this);
    }

    /**
     * Receive the parent folder for the resource.
     *
     * @return Resource
     */
    public function getFolder() : Resource
    {
        return !is_null($this->_folder())
            ? new Resource($this->getClient('Folder')->get($this->_folder()), $this->_name(), $this)
            : $this->get()->getFolder();
    }

    /**
     * Move the resource to another folder.
     *
     * @todo Accept FolderConnector as argument.
     *
     * @param  integer  $folderId
     * @return Resource
     */
    public function moveTo(int $folderId) : Resource
    {
        return new Resource($this->getClient()->move($this->_id(), $folderId), $this->_name(), $this);
    }

    /**
     * Copy the resource to another folder.
     *
     * @todo Accept FolderConnector as argument.
     *
     * @param  integer  $folderId
     * @return Resource
     */
    public function copyTo(int $folderId) : Resource
    {
        return new Resource($this->getClient()->copy($this->_id(), $folderId), $this->_name(), $this);
    }

    /**
     * Delete the resource.
     *
     * @return boolean
     */
    public function delete() : bool
    {
        return $this->getClient()->delete($this->_id());
    }
}
