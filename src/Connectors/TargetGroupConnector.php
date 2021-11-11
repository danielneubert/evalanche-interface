<?php

namespace Neubert\EvalancheInterface\Connectors;

use Neubert\EvalancheInterface\Behaviors\DetailsBehavior;
use Neubert\EvalancheInterface\Behaviors\ResourceBehavior;
use Neubert\EvalancheInterface\Support\ProfileJobHandler;

/**
 * @method ProfileJobHandler getProfiles()
 *
 * @method mixed getContent()
 * @see Neubert\EvalancheInterface\Behaviors\DetailsBehavior
 *
 * @method Resource get()
 * @method Resource getFolder()
 * @method bool delete()
 * @see Neubert\EvalancheInterface\Behaviors\ResourceBehavior
 */
class TargetGroupConnector extends Connector
{
    use DetailsBehavior, ResourceBehavior;

    /**
     * Client Accessor
     *
     * @var string
     */
    protected $clientAccessor = 'TargetGroup';

    // Documentation Missing
    public function getProfiles(array $attributeNames)
    {
        $attributeNames = array_map(function ($name) {
            return strtoupper($name);
        }, $attributeNames);

        // always fetch the profile ID for chainability
        if (!in_array('PROFILEID', $attributeNames)) {
            $attributeNames[] = 'PROFILEID';
        }

        return new ProfileJobHandler($this->getClient('Profile')->getByTargetGroup(
            $this->_id(),
            $attributeNames,
        ), $this->_interface());
    }
}
