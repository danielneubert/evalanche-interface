<?php

namespace Neubert\EvalancheInterface\Facades;

use Neubert\EvalancheInterface\EvalancheInterface;

/**
 * @method static void setup(string $username, string $password, ? string $host = null, bool $debug = false)
 *
 * @method static ArticleConnector article(int $reference)
 * @method static ArticleTypeConnector articleType(int $reference)
 * @method static ContainerTypeConnector containerType(int $reference)
 * @method static FolderConnector folder(? int $reference = null)
 * @method static PoolConnector pool(? int $reference = null)
 * @method static ProfileJobHandler job(string $reference)
 * @method static void setDefault($keyOrArray, ? int $value = null)
 * @method static mixed getClient(string $name)
 * @method static mixed getConnector(string $name, array $meta = self::CONNECTOR_DEFAULT)
 * @see Neubert\EvalancheInterface\EvalancheInterface
 */
class Evalanche
{
    /**
     * @see Neubert\EvalancheInterface\EvalancheInterface::CONNECTOR_DEFAULT
     * @var array
     */
    const CONNECTOR_DEFAULT = EvalancheInterface::CONNECTOR_DEFAULT;

    /**
     * @see Neubert\EvalancheInterface\EvalancheInterface::ATTRIBUTE_TYPES
     * @var array
     */
    const ATTRIBUTE_TYPES = EvalancheInterface::ATTRIBUTE_TYPES;

    /**
     * @see Neubert\EvalancheInterface\EvalancheInterface::RESOURCE_TYPES
     * @var array
     */
    const RESOURCE_TYPES = EvalancheInterface::RESOURCE_TYPES;

    /**
     * Singleton instance for static calls.
     *
     * @var EvalancheInterface|null
     */
    private static $singleton = null;

    /**
     * Setups up the Facade.
     *
     * @param string $username
     * @param string $password
     * @param string|null $host
     * @param boolean $debug
     * @return void
     */
    public static function setup(string $username, string $password, ? string $host = null, bool $debug = false)
    {
        self::$singleton = new EvalancheInterface(
            $username,
            $password,
            $host,
            $debug,
        );
    }

    /**
     * Handles all static calls that are not defined above and routes them to the EvalancheInterface if possible.
     *
     * @param  string  $method
     * @param  array   $arguments
     * @return mixed
     */
    public static function __callStatic(string $method, array $arguments)
    {
        if (method_exists(self::$singleton, $method)) {
            return call_user_func_array([self::$singleton, $method], $arguments);
        }

        trigger_error("Call to undefined method Neubert\EvalancheInterface\Facades\Evalanche::{$method}()", E_USER_ERROR);
    }
}
