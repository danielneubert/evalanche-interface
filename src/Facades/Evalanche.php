<?php

namespace Neubert\EvalancheInterface\Facades;

use Neubert\EvalancheInterface\EvalancheInterface;

/**
 * @method setup(string $username, string $password, ? string $host = null, bool $debug = false)
 *
 * @see \Neubert\EvalancheInterface\EvalancheInterface
 * @method ArticleConnector article(int $reference)
 * @method ArticleTypeConnector articleType(int $reference)
 * @method ContainerTypeConnector containerType(int $reference)
 * @method FolderConnector folder(? int $reference = null)
 * @method void setDefault($keyOrArray, ? int $value = null)
 * @method mixed getClient(string $name)
 * @method mixed getConnector(string $name, array $meta = self::CONNECTOR_DEFAULT)
 * @method array newMeta(array $meta)
 */
class Evalanche
{
    const ATTRIBUTE_TYPES = EvalancheInterface::ATTRIBUTE_TYPES;

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
