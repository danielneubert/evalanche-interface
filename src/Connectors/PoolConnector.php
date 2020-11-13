<?php

namespace Neubert\EvalancheInterface\Connectors;

use Neubert\EvalancheInterface\EvalancheInterface;
use Neubert\EvalancheInterface\Behaviors\AttributeBehavior;
use Neubert\EvalancheInterface\Behaviors\ResourceBehavior;
use Neubert\EvalancheInterface\Collections\Profiles\Profile;
use Neubert\EvalancheInterface\Collections\Profiles\ProfileCollection;
use Neubert\EvalancheInterface\Support\ProfileJobHandler;

/**
 * @method AttributeCollection getAttributes()
 * @method Attribute addAttribute(string $name, string $label, $type)
 * @method bool removeAttribute(int $attributeId)
 * @see Neubert\EvalancheInterface\Behaviors\AttributeBehavior#
 *
 * @method Resource copyTo()
 * @method bool delete()
 * @method Resource get()
 * @method Resource getFolder()
 * @method Resource moveTo()
 * @see Neubert\EvalancheInterface\Behaviors\ResourceBehavior
 */
class PoolConnector extends Connector
{
    use AttributeBehavior, ResourceBehavior;

    /**
     * Client Accessor
     *
     * @var string
     */
    protected $clientAccessor = 'Pool';

    /**
     * The arguments for requesting specific profiles.
     *
     * @var array
     */
    protected $conditional = null;

    /**
     * Extend default constructor.
     *
     * @param EvalancheInterface $interface
     */
    public function __construct(EvalancheInterface $interface)
    {
        parent::__construct($interface);
        $this->conditional = (object) [
            'key' => null,
            'value' => null,
        ];
    }

    // Documentation Missing
    public function where(string $key, $value) : PoolConnector
    {
        $this->conditional->key = strtoupper($key);
        $this->conditional->value = $value;
        return $this;
    }

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

        if (!is_null($this->conditional->key)) {
            return new ProfileCollection($this->getClient('Profile')->getByKey(
                $this->_id(),
                $this->conditional->key,
                $this->conditional->value,
                $attributeNames,
            ), 'Profile', $this);
        } else {
            return new ProfileJobHandler($this->getClient('Profile')->getByPool(
                $this->_id(),
                $attributeNames,
            ), $this->_interface());
        }
    }

    // Documentation Missing
    public function updateProfiles(array $values) : bool
    {
        if (!is_null($this->conditional->key)) {
            return $this->getClient('Profile')->updateByKey(
                $this->_id(),
                $this->conditional->key,
                $this->conditional->value,
                HashMap::compose($values),
            );
        } else {
            return $this->getClient('Profile')->updateByPool(
                $this->_id(),
                HashMap::compose($values),
            );
        }
    }
}
