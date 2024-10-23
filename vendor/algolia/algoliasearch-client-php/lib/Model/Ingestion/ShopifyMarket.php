<?php

// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

namespace Algolia\AlgoliaSearch\Model\Ingestion;

use Algolia\AlgoliaSearch\Model\AbstractModel;

/**
 * ShopifyMarket Class Doc Comment.
 *
 * @category Class
 *
 * @description Represents a market in Shopify.
 */
class ShopifyMarket extends AbstractModel implements ModelInterface, \ArrayAccess, \JsonSerializable
{
    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $modelTypes = [
        'countries' => 'string[]',
        'currencies' => 'string[]',
        'locales' => 'string[]',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $modelFormats = [
        'countries' => null,
        'currencies' => null,
        'locales' => null,
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'countries' => 'countries',
        'currencies' => 'currencies',
        'locales' => 'locales',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @var string[]
     */
    protected static $setters = [
        'countries' => 'setCountries',
        'currencies' => 'setCurrencies',
        'locales' => 'setLocales',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @var string[]
     */
    protected static $getters = [
        'countries' => 'getCountries',
        'currencies' => 'getCurrencies',
        'locales' => 'getLocales',
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
        if (isset($data['countries'])) {
            $this->container['countries'] = $data['countries'];
        }
        if (isset($data['currencies'])) {
            $this->container['currencies'] = $data['currencies'];
        }
        if (isset($data['locales'])) {
            $this->container['locales'] = $data['locales'];
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

        if (!isset($this->container['countries']) || null === $this->container['countries']) {
            $invalidProperties[] = "'countries' can't be null";
        }
        if (!isset($this->container['currencies']) || null === $this->container['currencies']) {
            $invalidProperties[] = "'currencies' can't be null";
        }
        if (!isset($this->container['locales']) || null === $this->container['locales']) {
            $invalidProperties[] = "'locales' can't be null";
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
     * Gets countries.
     *
     * @return string[]
     */
    public function getCountries()
    {
        return $this->container['countries'] ?? null;
    }

    /**
     * Sets countries.
     *
     * @param string[] $countries countries
     *
     * @return self
     */
    public function setCountries($countries)
    {
        $this->container['countries'] = $countries;

        return $this;
    }

    /**
     * Gets currencies.
     *
     * @return string[]
     */
    public function getCurrencies()
    {
        return $this->container['currencies'] ?? null;
    }

    /**
     * Sets currencies.
     *
     * @param string[] $currencies currencies
     *
     * @return self
     */
    public function setCurrencies($currencies)
    {
        $this->container['currencies'] = $currencies;

        return $this;
    }

    /**
     * Gets locales.
     *
     * @return string[]
     */
    public function getLocales()
    {
        return $this->container['locales'] ?? null;
    }

    /**
     * Sets locales.
     *
     * @param string[] $locales locales
     *
     * @return self
     */
    public function setLocales($locales)
    {
        $this->container['locales'] = $locales;

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
