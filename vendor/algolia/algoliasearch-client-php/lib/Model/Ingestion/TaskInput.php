<?php

// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

namespace Algolia\AlgoliaSearch\Model\Ingestion;

use Algolia\AlgoliaSearch\Model\AbstractModel;

/**
 * TaskInput Class Doc Comment.
 *
 * @category Class
 *
 * @description Configuration of the task, depending on its type.
 */
class TaskInput extends AbstractModel implements ModelInterface, \ArrayAccess, \JsonSerializable
{
    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $modelTypes = [
        'mapping' => '\Algolia\AlgoliaSearch\Model\Ingestion\MappingInput',
        'streams' => '\Algolia\AlgoliaSearch\Model\Ingestion\DockerStreams[]',
        'metafields' => '\Algolia\AlgoliaSearch\Model\Ingestion\ShopifyMetafield[]',
        'market' => '\Algolia\AlgoliaSearch\Model\Ingestion\ShopifyMarket',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $modelFormats = [
        'mapping' => null,
        'streams' => null,
        'metafields' => null,
        'market' => null,
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'mapping' => 'mapping',
        'streams' => 'streams',
        'metafields' => 'metafields',
        'market' => 'market',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @var string[]
     */
    protected static $setters = [
        'mapping' => 'setMapping',
        'streams' => 'setStreams',
        'metafields' => 'setMetafields',
        'market' => 'setMarket',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @var string[]
     */
    protected static $getters = [
        'mapping' => 'getMapping',
        'streams' => 'getStreams',
        'metafields' => 'getMetafields',
        'market' => 'getMarket',
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
        if (isset($data['mapping'])) {
            $this->container['mapping'] = $data['mapping'];
        }
        if (isset($data['streams'])) {
            $this->container['streams'] = $data['streams'];
        }
        if (isset($data['metafields'])) {
            $this->container['metafields'] = $data['metafields'];
        }
        if (isset($data['market'])) {
            $this->container['market'] = $data['market'];
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
        $invalidProperties = [];

        if (!isset($this->container['mapping']) || null === $this->container['mapping']) {
            $invalidProperties[] = "'mapping' can't be null";
        }
        if (!isset($this->container['streams']) || null === $this->container['streams']) {
            $invalidProperties[] = "'streams' can't be null";
        }
        if (!isset($this->container['metafields']) || null === $this->container['metafields']) {
            $invalidProperties[] = "'metafields' can't be null";
        }
        if (!isset($this->container['market']) || null === $this->container['market']) {
            $invalidProperties[] = "'market' can't be null";
        }

        return $invalidProperties;
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
     * Gets mapping.
     *
     * @return MappingInput
     */
    public function getMapping()
    {
        return $this->container['mapping'] ?? null;
    }

    /**
     * Sets mapping.
     *
     * @param MappingInput $mapping mapping
     *
     * @return self
     */
    public function setMapping($mapping)
    {
        $this->container['mapping'] = $mapping;

        return $this;
    }

    /**
     * Gets streams.
     *
     * @return \Algolia\AlgoliaSearch\Model\Ingestion\DockerStreams[]
     */
    public function getStreams()
    {
        return $this->container['streams'] ?? null;
    }

    /**
     * Sets streams.
     *
     * @param \Algolia\AlgoliaSearch\Model\Ingestion\DockerStreams[] $streams streams
     *
     * @return self
     */
    public function setStreams($streams)
    {
        $this->container['streams'] = $streams;

        return $this;
    }

    /**
     * Gets metafields.
     *
     * @return \Algolia\AlgoliaSearch\Model\Ingestion\ShopifyMetafield[]
     */
    public function getMetafields()
    {
        return $this->container['metafields'] ?? null;
    }

    /**
     * Sets metafields.
     *
     * @param \Algolia\AlgoliaSearch\Model\Ingestion\ShopifyMetafield[] $metafields metafields
     *
     * @return self
     */
    public function setMetafields($metafields)
    {
        $this->container['metafields'] = $metafields;

        return $this;
    }

    /**
     * Gets market.
     *
     * @return ShopifyMarket
     */
    public function getMarket()
    {
        return $this->container['market'] ?? null;
    }

    /**
     * Sets market.
     *
     * @param ShopifyMarket $market market
     *
     * @return self
     */
    public function setMarket($market)
    {
        $this->container['market'] = $market;

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