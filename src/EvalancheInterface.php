<?php

namespace Neubert\EvalancheInterface;

use Scn\EvalancheSoapApiConnector\EvalancheConnection;

use Neubert\EvalancheInterface\Connectors\ArticleConnector;
use Neubert\EvalancheInterface\Connectors\ArticleTypeConnector;
use Neubert\EvalancheInterface\Connectors\ContainerConnector;
use Neubert\EvalancheInterface\Connectors\ContainerTypeConnector;
use Neubert\EvalancheInterface\Connectors\FolderConnector;
use Neubert\EvalancheInterface\Connectors\PoolConnector;
use Neubert\EvalancheInterface\Connectors\MailingConnector;
use Neubert\EvalancheInterface\Connectors\MandatorConnector;
use Neubert\EvalancheInterface\Connectors\ProfileConnector;
use Neubert\EvalancheInterface\Connectors\TargetGroupConnector;
use Neubert\EvalancheInterface\Support\ProfileJobHandler;

/**
 * @method ArticleConnector article(int $reference)
 * @method ArticleTypeConnector articleType(int $reference)
 * @method ContainerConnector container(int $reference)
 * @method ContainerTypeConnector containerType(int $reference)
 * @method FolderConnector folder(? int $reference = null)
 * @method PoolConnector pool(? int $reference = null)
 * @method ProfileConnector profile(int $reference = null)
 * @method TargetGroupConnector targetgroup(string $reference)
 * @method ProfileJobHandler job(string $reference)
 * @method void setDefault($keyOrArray, ? int $value = null)
 * @method mixed getClient(string $name)
 * @method mixed getConnector(string $name, array $meta = self::CONNECTOR_DEFAULT)
 * @see Neubert\EvalancheInterface\EvalancheInterface
 */
class EvalancheInterface
{
    /**
     * All available connectors.
     *
     * @var array
     */
    protected $connectors = [
        'Article'           => ArticleConnector::class,
        'ArticleType'       => ArticleTypeConnector::class,
        'Container'         => ContainerConnector::class,
        'ContainerType'     => ContainerTypeConnector::class,
        'Folder'            => FolderConnector::class,
        'Mailing'           => MailingConnector::class,
        'Mandator'          => MandatorConnector::class,
        'Pool'              => PoolConnector::class,
        'Profile'           => ProfileConnector::class,
        'TargetGroup'       => TargetGroupConnector::class,
    ];

    /**
     * Defaults that get populated during the setup.
     *
     * @var array
     */
    protected $defaults = [
        'pool' => null,
        'folder' => null,
        'mandator' => null,
    ];

    /**
     * EvalancheConnection instance.
     *
     * @var EvalancheConnection|null
     */
    protected $connection = null;

    /**
     * ------------------------------------------------------------
     * Connector Accessors
     * ------------------------------------------------------------
     */

    /**
     * Provides the ArticleConnector
     *
     * @param  integer  $reference
     * @return ArticleConnector
     */
    public function article(int $reference): ArticleConnector
    {
        return $this->getConnector('Article', self::newMeta([
            'id' => $reference,
        ]));
    }

    /**
     * Provides the ArticleTypeConnector
     *
     * @param  integer  $reference
     * @return ArticleTypeConnector
     */
    public function articleType(int $reference): ArticleTypeConnector
    {
        return $this->getConnector('ArticleType', self::newMeta([
            'id' => $reference,
        ]));
    }

    /**
     * Provides the ContainerConnector
     *
     * @param  integer  $reference
     * @return ContainerConnector
     */
    public function container(int $reference): ContainerConnector
    {
        return $this->getConnector('Container', self::newMeta([
            'id' => $reference,
        ]));
    }

    /**
     * Provides the ContainerTypeConnector
     *
     * @param  integer  $reference
     * @return ContainerTypeConnector
     */
    public function containerType(int $reference): ContainerTypeConnector
    {
        return $this->getConnector('ContainerType', self::newMeta([
            'id' => $reference,
        ]));
    }

    /**
     * Provides the FolderConnector
     *
     * @param  integer  $reference
     * @return FolderConnector
     */
    public function folder(?int $reference = null): FolderConnector
    {
        return $this->getConnector('Folder', self::newMeta([
            'id' => $reference ?? ($this->defaults['folder'] ?? null),
        ]));
    }

    /**
     * Provides the MailingConnector
     *
     * @param  integer  $reference
     * @return MailingConnector
     */
    public function mailing(?int $reference = null): MailingConnector
    {
        return $this->getConnector('Mailing', self::newMeta([
            'id' => $reference,
        ]));
    }

    /**
     * Provides the PoolConnector
     *
     * @param  integer  $reference
     * @return MandatorConnector
     */
    public function mandator(?int $reference = null): MandatorConnector
    {
        return $this->getConnector('Mandator', self::newMeta([
            'id' => $reference ?? ($this->defaults['folder'] ?? null),
        ]));
    }

    /**
     * Provides the PoolConnector
     *
     * @param  integer  $reference
     * @return PoolConnector
     */
    public function pool(?int $reference = null): PoolConnector
    {
        return $this->getConnector('Pool', self::newMeta([
            'id' => $reference ?? ($this->defaults['pool'] ?? null),
        ]));
    }

    /**
     * Provides the PoolConnector
     *
     * @param  integer  $reference
     * @return ProfileConnector
     */
    public function profile(int $reference): ProfileConnector
    {
        return $this->getConnector('Profile', self::newMeta([
            'id' => $reference,
        ]));
    }

    /**
     * Provides the PoolConnector
     *
     * @param  integer  $reference
     * @return TargetGroupConnector
     */
    public function targetgroup(int $reference): TargetGroupConnector
    {
        return $this->getConnector('TargetGroup', self::newMeta([
            'id' => $reference,
        ]));
    }

    /**
     * ------------------------------------------------------------
     * Callable Methods
     * ------------------------------------------------------------
     */

    /**
     * Provides the ProfileJobHandler
     *
     * @param  string  $reference
     * @return ProfileJobHandler
     */
    public function job(string $reference): ProfileJobHandler
    {
        return new ProfileJobHandler($reference, $this);
    }

    /**
     * Writes the defaults array values with the given set.
     *
     * @param  string|array  $keyOrArray
     * @param  integer|null  $value
     * @return void
     */
    public function setDefault($keyOrArray, ?int $value = null): void
    {
        if (is_array($keyOrArray)) {
            $this->defaults = array_merge($this->defaults, $keyOrArray);
        } elseif (is_string($keyOrArray)) {
            $this->defaults = array_merge($this->defaults, [
                $keyOrArray => $value,
            ]);
        }
    }

    /**
     * ------------------------------------------------------------
     * Internal Methods
     * ------------------------------------------------------------
     */

    /**
     * Returns a specific default value.
     *
     * @param  string  $name
     * @return mixed
     */
    public function getDefaultValue(string $key, ?int $fallbackValue = null)
    {
        return isset($this->defaults[$key]) ? ($this->defaults[$key] ?? $fallbackValue) : $fallbackValue;
    }

    /**
     * Returns a specific EvalancheConnection client.
     *
     * @param  string  $name
     * @return mixed
     */
    public function getClient(string $name)
    {
        return call_user_func([$this->connection, "create{$name}Client"]);
    }

    /**
     * Returns the requested connector and ppopulates it with the given meta values.
     *
     * @param  string  $name
     * @param  array   $meta
     * @return mixed
     */
    public function getConnector(string $name, array $meta = self::CONNECTOR_DEFAULT)
    {
        if (isset($this->connectors[$name])) {
            $connector = new $this->connectors[$name]($this);
            $connector->setMeta($meta);
            return $connector;
        }

        throw new \Exception("Evalanche connector \"{$name}\" isn't available.");
    }

    /**
     * Returns a prepopulated meta values array for a connector.
     *
     * @param  array   $meta
     * @return array
     */
    public static function newMeta(array $meta): array
    {
        return array_merge(self::CONNECTOR_DEFAULT, $meta);
    }

    /**
     * ------------------------------------------------------------
     * Setup
     * ------------------------------------------------------------
     */

    /**
     * New EvalancheInterface instance. This will create a EvalancheConnection object.
     *
     * @param  string       $username
     * @param  string       $password
     * @param  string|null  $host
     * @param  boolean      $debug
     */
    public function __construct(string $username, string $password, ?string $host = null, bool $debug = false)
    {
        $this->connection = EvalancheConnection::create(
            $host ?? 'scnem2.com',
            $username,
            $password,
            $debug
        );
    }

    /**
     * ------------------------------------------------------------
     * Constants
     * ------------------------------------------------------------
     */

    /**
     * Connector default values.
     *
     * @var array
     */
    const CONNECTOR_DEFAULT = [
        'id'        => null,
        'folder'    => null,
        'reference' => null,
    ];

    /**
     * Attribute types.
     *
     * @var array
     */
    const ATTRIBUTE_TYPES = [
        1  => 'Input',
        2  => 'Textarea/Full',
        3  => 'Image',
        4  => 'List/Link',
        5  => 'DateTime',
        6  => 'Select',
        7  => 'Select/Multible',
        8  => 'Textarea/Editor',
        9  => 'Help/Text',
        10 => 'Textarea',
        11 => 'Help/Separator',
        12 => 'Color',
        13 => 'Checkbox',
        14 => 'Help/Html',
        15 => 'Container',
        16 => 'Link',
        17 => 'Code',
        18 => 'List/Image',
        19 => 'List/KeyValue',
        20 => 'List/Container',
    ];

    /**
     * Pool attribute types.
     *
     * @var array
     */
    const ATTRIBUTE_TYPES_POOL = [
        1  => 'Select/Salutation',
        2  => 'Select/Country',
        3  => 'Select/State',
        4  => 'Input/PhoneMobilePrefix',
        5  => 'Input',
        6  => 'Textarea',
        7  => 'Select',
        8  => 'Select/Multible',
        9  => 'Input/Date',
        10 => 'Input/Email',
        11 => 'Input/DateTime',
        12 => 'Select/Language',
        16 => 'Checkbox',
        20 => 'Input/Number',
        21 => 'Input/Zip',
        22 => 'Input/IpAddress',
    ];

    /**
     * Resource types.
     *
     * @var array
     */
    const RESOURCE_TYPES = [
        0  => 'Folder',
        10 => 'TargetGroup',
        20 => 'ArticleType',
        21 => 'Article',
        22 => 'ContainerType',
        23 => 'Container',
        33 => 'ArticleTemplate',
        34 => 'ArticleTemplate/Text',
        36 => 'ArticleTemplate/Leadpage',
        65 => 'MailingTemplate',
        66 => 'Mailing',
        69 => 'Mailing/Event',
        76 => 'Mailing/Trigger',
    ];
}
