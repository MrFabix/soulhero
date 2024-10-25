<?php

// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

namespace Algolia\AlgoliaSearch\Model\Monitoring;

use Algolia\AlgoliaSearch\Model\AbstractModel;

/**
 * Server Class Doc Comment.
 *
 * @category Class
 */
class Server extends AbstractModel implements ModelInterface, \ArrayAccess, \JsonSerializable
{
    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $modelTypes = [
        'name' => 'string',
        'region' => '\Algolia\AlgoliaSearch\Model\Monitoring\Region',
        'isSlave' => 'bool',
        'isReplica' => 'bool',
        'cluster' => 'string',
        'status' => '\Algolia\AlgoliaSearch\Model\Monitoring\ServerStatus',
        'type' => '\Algolia\AlgoliaSearch\Model\Monitoring\Type',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $modelFormats = [
        'name' => null,
        'region' => null,
        'isSlave' => null,
        'isReplica' => null,
        'cluster' => null,
        'status' => null,
        'type' => null,
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'name' => 'name',
        'region' => 'region',
        'isSlave' => 'is_slave',
        'isReplica' => 'is_replica',
        'cluster' => 'cluster',
        'status' => 'status',
        'type' => 'type',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'region' => 'setRegion',
        'isSlave' => 'setIsSlave',
        'isReplica' => 'setIsReplica',
        'cluster' => 'setCluster',
        'status' => 'setStatus',
        'type' => 'setType',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'region' => 'getRegion',
        'isSlave' => 'getIsSlave',
        'isReplica' => 'getIsReplica',
        'cluster' => 'getCluster',
        'status' => 'getStatus',
        'type' => 'getType',
    ];

    /**
     * Associative array for storing property values.
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor.
     *
     * @param mixed[] $data Associated array of property values
     */
    public function __construct(?array $data = null)
    {
        if (isset($data['name'])) {
            $this->container['name'] = $data['name'];
        }
        if (isset($data['region'])) {
            $this->container['region'] = $data['region'];
        }
        if (isset($data['isSlave'])) {
            $this->container['isSlave'] = $data['isSlave'];
        }
        if (isset($data['isReplica'])) {
            $this->container['isReplica'] = $data['isReplica'];
        }
        if (isset($data['cluster'])) {
            $this->container['cluster'] = $data['cluster'];
        }
        if (isset($data['status'])) {
            $this->container['status'] = $data['status'];
        }
        if (isset($data['type'])) {
            $this->container['type'] = $data['type'];
        }
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @return array
     */
    public static function modelTypes()
    {
        return self::$modelTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @return array
     */
    public static function modelFormats()
    {
        return self::$modelFormats;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        return [];
    }

    /**
     * Validate all the properties in the model
     * return true if all passed.
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return 0 === count($this->listInvalidProperties());
    }

    /**
     * Gets name.
     *
     * @return null|string
     */
    public function getName()
    {
        return $this->container['name'] ?? null;
    }

    /**
     * Sets name.
     *
     * @param null|string $name server name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets region.
     *
     * @return null|Region
     */
    public function getRegion()
    {
        return $this->container['region'] ?? null;
    }

    /**
     * Sets region.
     *
     * @param null|Region $region region
     *
     * @return self
     */
    public function setRegion($region)
    {
        $this->container['region'] = $region;

        return $this;
    }

    /**
     * Gets isSlave.
     *
     * @return null|bool
     *
     * @deprecated
     */
    public function getIsSlave()
    {
        return $this->container['isSlave'] ?? null;
    }

    /**
     * Sets isSlave.
     *
     * @param null|bool $isSlave Included to support legacy applications. Use `is_replica` instead.
     *
     * @return self
     *
     * @deprecated
     */
    public function setIsSlave($isSlave)
    {
        $this->container['isSlave'] = $isSlave;

        return $this;
    }

    /**
     * Gets isReplica.
     *
     * @return null|bool
     */
    public function getIsReplica()
    {
        return $this->container['isReplica'] ?? null;
    }

    /**
     * Sets isReplica.
     *
     * @param null|bool $isReplica whether this server is a replica of another server
     *
     * @return self
     */
    public function setIsReplica($isReplica)
    {
        $this->container['isReplica'] = $isReplica;

        return $this;
    }

    /**
     * Gets cluster.
     *
     * @return null|string
     */
    public function getCluster()
    {
        return $this->container['cluster'] ?? null;
    }

    /**
     * Sets cluster.
     *
     * @param null|string $cluster name of the cluster to which this server belongs
     *
     * @return self
     */
    public function setCluster($cluster)
    {
        $this->container['cluster'] = $cluster;

        return $this;
    }

    /**
     * Gets status.
     *
     * @return null|ServerStatus
     */
    public function getStatus()
    {
        return $this->container['status'] ?? null;
    }

    /**
     * Sets status.
     *
     * @param null|ServerStatus $status status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets type.
     *
     * @return null|Type
     */
    public function getType()
    {
        return $this->container['type'] ?? null;
    }

    /**
     * Sets type.
     *
     * @param null|Type $type type
     *
     * @return self
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param int $offset Offset
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param int $offset Offset
     *
     * @return null|mixed
     */
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param null|int $offset Offset
     * @param mixed    $value  Value to be set
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param int $offset Offset
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
}