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
    protected $id = null;

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
     * The instance of the EvalancheInterface.
     *
     * @var int|null
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
            $this->id = $idOrJobHandle;
            $this->update();
        } elseif ($idOrJobHandle instanceof JobHandle) {
            $this->update($idOrJobHandle);
        } else {
            // throw error
        }
    }

    // Documentation Missing
    public function update(? JobHandle $job = null)
    {
        if (is_null($job)) {
            return $this->update($this->interface->getClient('Profile')->getJobInformationByJobId($this->id));
        }

        $this->id = $job->getId();
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
    public function getChunk() : ProfileCollection
    {
        return new ProfileCollection((array) $this->interface->getClient('Profile')->getResultByJobId($this->id)->getResult(), 'Profile', $this->interface->getConnector('Profile'));
    }

    // Documentation Missing
    public function getChunkPosition() : ? int
    {
        $position = $this->interface->getClient('Profile')->getResultCursorByJobId($this->id);
        return is_numeric($position) ? $position : null;
    }

    // Documentation Missing
    public function setChunkPosition(int $position) : bool
    {
        return $this->interface->getClient('Profile')->setResultCursor($this->id, $position);
    }
}
