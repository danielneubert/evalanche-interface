<?php

namespace Neubert\EvalancheInterface\Support;

use Neubert\EvalancheInterface\EvalancheInterface;
use Neubert\EvalancheInterface\Collections\Profiles\ProfileCollection;
use Scn\EvalancheSoapStruct\Struct\Generic\JobHandle;

class ProfileJobHandler
{
    /**
     * List of all status values.
     *
     * @var array
     */
    const STATUS = [
        0 => 'Waiting',
        2 => 'Done',
    ];

    /**
     * Id of the Evalanche Export Job.
     *
     * @var int|null
     */
    public $_id = null;

    /**
     * Job status.
     *
     * @var int|null
     */
    protected $status = null;

    /**
     * Requestes chunks.
     *
     * @var int|null
     */
    protected $chunkSize = null;

    /**
     * Chunks left.
     *
     * @var int|null
     */
    protected $chunksLeft = null;

    /**
     * The instance of the EvalancheInterface.
     *
     * @var EvalancheInterface|null
     */
    private $interface = null;

    /**
     * New ProfileJob instance.
     *
     * @param  string       $test
     */
    public function __construct($idOrJobHandle, EvalancheInterface $interface)
    {
        $this->interface = $interface;

        if (is_string($idOrJobHandle)) {
            $this->_id = $idOrJobHandle;
            $this->update();
        } elseif ($idOrJobHandle instanceof JobHandle) {
            $this->update($idOrJobHandle);
        } else {
            // throw error
        }
    }

    // Documentation Missing
    public function update(?JobHandle $job = null)
    {
        if (is_null($job)) {
            return $this->update($this->interface->getClient('Profile')->getJobInformationByJobId($this->_id));
        }

        $this->_id = $job->getId();
        $this->status = $job->getStatus();
        $this->chunkSize = $job->getResultChunks();
    }

    // Documentation Missing
    public function isWaiting()
    {
        return $this->status === 0;
    }

    // Documentation Missing
    public function isDone()
    {
        return $this->status === 2;
    }

    // Documentation Missing
    public function isLast()
    {
        return $this->chunksLeft === 0;
    }

    // Documentation Missing
    public function whenDone(float $rate = 1, int $timeout = 300)
    {
        $timeout += time();
        $rate = intval($rate / 1000000);

        while (time() < $timeout) {
            if ($this->isDone()) {
                break;
            }

            $this->update();

            if ($this->isDone()) {
                break;
            }

            usleep($rate);
        }

        return $this;
    }

    // Documentation Missing
    public function getChunk(): ProfileCollection
    {
        $chunkResult = $this->interface->getClient('Profile')->getResultByJobId($this->_id);
        $this->chunksLeft = $chunkResult->getChunksLeft();
        return new ProfileCollection((array) $chunkResult->getResult(), 'Profile', $this->interface->getConnector('Profile'));
    }

    // Documentation Missing
    public function getChunks(): ProfileCollection
    {
        $resultArray = [];

        while (is_null($this->chunksLeft) || $this->chunksLeft > 0) {
            $chunkResult = $this->interface->getClient('Profile')->getResultByJobId($this->_id);
            $this->chunksLeft = $chunkResult->getChunksLeft();
            $chunkResult = (array) $chunkResult->getResult();
            $resultArray = [...$resultArray, ...$chunkResult];
            var_dump('iterating');
        }

        return new ProfileCollection($resultArray, 'Profile', $this->interface->getConnector('Profile'));
    }

    // Documentation Missing
    public function getChunkPosition(): ?int
    {
        $position = $this->interface->getClient('Profile')->getResultCursorByJobId($this->_id);
        return is_numeric($position) ? $position : null;
    }

    // Documentation Missing
    public function setChunkPosition(int $position): bool
    {
        return $this->interface->getClient('Profile')->setResultCursor($this->_id, $position);
    }


    /**
     * Direct access to the item properties.
     *
     * @param  string  $method
     * @return mixed
     */
    public function __get(string $name)
    {
        if ($name == 'id') {
            return $this->_id;
        }

        trigger_error("Undefined property: Neubert\EvalancheInterface\Collections\CollectionItem::{$name}", E_USER_NOTICE);
    }

    /**
     * Triggers error when an item property should be overwritten.
     *
     * @param  string  $method
     * @return void
     */
    public function __set(string $name, $value)
    {
        if ($this->item == 'id') {
            trigger_error("Cannot write to property Neubert\EvalancheInterface\Collections\CollectionItem::{$name}", E_USER_ERROR);
        }

        trigger_error("Undefined property: Neubert\EvalancheInterface\Collections\CollectionItem::{$name}", E_USER_NOTICE);
    }
}
