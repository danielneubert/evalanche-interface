<?php

use PHPUnit\Framework\TestCase;
use Neubert\EvalancheInterface\Connectors\FolderConnector;
use Neubert\EvalancheInterface\EvalancheInterface;
use Neubert\EvalancheInterface\Facades\Evalanche;

class EvalancheInterfaceTest extends TestCase
{
    public function testInterfaceIsWorking() : void
    {
        $this->assertTrue(class_exists(EvalancheInterface::class));
        $this->assertTrue((EvalancheInterface::RESOURCE_TYPES[0] ?? false) === 'Folder');
        $connection = new EvalancheInterface(
            getPhpUnitValue('EVALANCHE_USERNAME'),
            getPhpUnitValue('EVALANCHE_PASSWORD'),
            getPhpUnitValue('EVALANCHE_HOST'),
        );
        $this->assertInstanceOf(EvalancheInterface::class, $connection);
    }

    public function testInterfaceFacadeIsWorking() : void
    {
        Evalanche::setup(
            getPhpUnitValue('EVALANCHE_USERNAME'),
            getPhpUnitValue('EVALANCHE_PASSWORD'),
            getPhpUnitValue('EVALANCHE_HOST'),
        );

        $this->assertInstanceOf(FolderConnector::class, Evalanche::folder(getPhpUnitValue('EVALANCHE_TEST_FOLDER')));
    }

    public function testInterfaceCanAccessFolder() : void
    {
        Evalanche::setup(
            getPhpUnitValue('EVALANCHE_USERNAME'),
            getPhpUnitValue('EVALANCHE_PASSWORD'),
            getPhpUnitValue('EVALANCHE_HOST'),
        );

        $this->assertEquals(Evalanche::folder(getPhpUnitValue('EVALANCHE_TEST_FOLDER'))->get()->id, getPhpUnitValue('EVALANCHE_TEST_FOLDER'));
    }
}
