<?php

namespace Neubert\EvalancheInterface\Connectors;

use Neubert\EvalancheInterface\Behaviors\ResourceBehavior;
use Neubert\EvalancheInterface\Collections\Profiles\Profile;
use Neubert\EvalancheInterface\Support\ProfileJobHandler;
use Neubert\EvalancheInterface\Support\HashMap;

/**
 */
class TargetGroupConnector extends Connector
{
    use ResourceBehavior;

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
