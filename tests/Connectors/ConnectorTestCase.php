<?php

namespace Neubert\EvalancheInterface\Tests\Connectors;

use PHPUnit\Framework\TestCase;
use Neubert\EvalancheInterface\Facades\Evalanche;
use Neubert\EvalancheInterface\Collections\Resources\Resource;

class ConnectorTestCase extends TestCase
{
    /**
     * Returns the client either for the given name or the testing class.
     *
     * @param  integer  $id
     * @param  string   $connector
     * @return void
     */
    protected function getClient(int $id, string $connector = null)
    {
        return is_null($connector)
            ? call_user_func([Evalanche::class, lcfirst($this->clientAccessor)], $id)
            : call_user_func([Evalanche::class, lcfirst($connector)], $id);
    }

    /**
     * Returns the client for the testing class populated with the stored id.
     *
     * @param  string  $name
     * @return void
     */
    protected function getClientWith(string $name)
    {
        return $this->getClient($this->get($name));
    }

    /**
     * Creates a resource for the current test.
     *
     * @return Resource
     */
    protected function createResource()
    {
        $resource = call_user_func_array([$this->getClient(getPhpUnitValue('EVALANCHE_TEST_FOLDER'), 'Folder'), "create{$this->clientAccessor}"], func_get_args());
        $this->assertInstanceOf(Resource::class, $resource);
        return $resource;
    }

    /**
     * Resets the Evalanche connection.
     *
     * @return void
     */
    protected function resetConnection()
    {
        $this->assertTrue(class_exists(Evalanche::class));
        Evalanche::setup(
            getPhpUnitValue('EVALANCHE_USERNAME'),
            getPhpUnitValue('EVALANCHE_PASSWORD'),
            getPhpUnitValue('EVALANCHE_HOST')
        );
    }

    /**
     * Helpers to access a global variable.
     *
     * @param  string  $name
     * @return mixed
     */
    protected function get(string $name)
    {
        $class = debug_backtrace(\DEBUG_BACKTRACE_IGNORE_ARGS, 0)[0]['class'];
        return $GLOBALS["{$class}--{$name}"] ?? null;
    }

    /**
     * Helpers to access a global variable.
     *
     * @param  string  $name
     * @return void
     */
    protected function set(string $name, $value)
    {
        $class = debug_backtrace(\DEBUG_BACKTRACE_IGNORE_ARGS, 0)[0]['class'];
        $GLOBALS["{$class}--{$name}"] = $value;
    }
}
