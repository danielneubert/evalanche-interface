<?php

namespace Neubert\EvalancheInterface\Tests\Behaviors;

use Neubert\EvalancheInterface\Facades\Evalanche;

trait ResourceBehaviorTestCase
{
    public function testResourceSetup()
    {
        $this->resetConnection();
    }

    public function testResourceSetupCreate()
    {
        $this->set('rb--id', $this->createResource("[TEST] ResourceBehaviorTestCase")->id);
        $this->assertTrue(is_numeric($this->get('rb--id')));
    }

    public function testResourceMethodGet()
    {
        $this->assertEquals($this->get('rb--id'), $this->getClientWith('rb--id')->get()->id);
    }

    public function testResourceMethodGetFolder()
    {
        $this->assertEquals(getPhpUnitValue('EVALANCHE_TEST_FOLDER'), $this->getClientWith('rb--id')->getFolder()->id);
    }

    public function testResourceMethodDelete()
    {
        // inconsistent Folder API
        if ($this->clientAccessor == 'Folder') {
            $this->assertNull($this->getClientWith('rb--id')->delete());
        } else {
            $this->assertTrue($this->getClientWith('rb--id')->delete());
        }
    }
}
