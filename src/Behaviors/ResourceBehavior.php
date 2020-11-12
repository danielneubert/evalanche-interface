<?php

namespace Neubert\EvalancheInterface\Behaviors;

use Neubert\EvalancheInterface\Collections\Resources\Resource;

/**
 * @method Resource get()
 * @method Resource getFolder()
 * @method bool delete()
 * @see Neubert\EvalancheInterface\Behaviors\ResourceBehavior
 */
trait ResourceBehavior
{
    // Documentation Missing
    public function get() : Resource
    {
        return new Resource($this->getClient()->getById($this->_id()), $this->_name(), $this);
    }

    // Documentation Missing
    public function getFolder() : Resource
    {
        return !is_null($this->_folder())
            ? new Resource($this->getClient('Folder')->get($this->_folder()), $this->_name(), $this)
            : $this->get()->getFolder();
    }

    // Documentation Missing
    public function delete() : bool
    {
        return $this->getClient()->delete($this->_id());
    }
}
