<?php

namespace Neubert\EvalancheInterface\Tests\Behaviors;

use Neubert\EvalancheInterface\Facades\Evalanche;
use Neubert\EvalancheInterface\Collections\Resources\Resource;

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

    public function testResourceMethodCopyAndMove()
    {
        if (in_array($this->clientAccessor, ['Folder'])) {
            $this->markTestSkipped("The resource \"{$this->clientAccessor}\" doesn't support copy and move.");
            return;
        }

        $this->set('rb--movecopy-folder', call_user_func(
            [
                $this->getClient(getPhpUnitValue('EVALANCHE_TEST_FOLDER'), 'Folder'),
                'createFolder',
            ],
            '[TEST] ResourceBehaviorTestCase'
        ));

        $this->set('rb--movecopy-article', $this->getClientWith('rb--id')->copyTo($this->get('rb--movecopy-folder')->id));
        $this->assertInstanceOf(Resource::class, $this->get('rb--movecopy-article'));
        $this->assertEquals($this->get('rb--movecopy-folder')->id, $this->get('rb--movecopy-article')->folder);

        $this->set('rb--movecopy-article', $this->get('rb--movecopy-article')->moveTo(getPhpUnitValue('EVALANCHE_TEST_FOLDER')));
        $this->assertInstanceOf(Resource::class, $this->get('rb--movecopy-article'));
        $this->assertEquals(getPhpUnitValue('EVALANCHE_TEST_FOLDER'), $this->get('rb--movecopy-article')->folder);
    }

    public function testResourceMethodDelete()
    {
        // inconsistent Folder API
        if ($this->clientAccessor == 'Folder') {
            $this->assertNull($this->getClientWith('rb--id')->delete());
        } else {
            $this->assertTrue($this->get('rb--movecopy-article')->delete());
            $this->assertNull($this->get('rb--movecopy-folder')->delete());
            $this->assertTrue($this->getClientWith('rb--id')->delete());
        }
    }
}
