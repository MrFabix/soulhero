<?php

// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

namespace Algolia\AlgoliaSearch\Api;

use Algolia\AlgoliaSearch\Algolia;
use Algolia\AlgoliaSearch\Configuration\RecommendConfig;
use Algolia\AlgoliaSearch\Model\Recommend\GetRecommendationsParams;
use Algolia\AlgoliaSearch\Model\Recommend\SearchRecommendRulesParams;
use Algolia\AlgoliaSearch\ObjectSerializer;
use Algolia\AlgoliaSearch\RetryStrategy\ApiWrapper;
use Algolia\AlgoliaSearch\RetryStrategy\ApiWrapperInterface;
use Algolia\AlgoliaSearch\RetryStrategy\ClusterHosts;
use GuzzleHttp\Psr7\Query;

/**
 * RecommendClient Class Doc Comment.
 *
 * @category Class
 */
class RecommendClient
{
    public const VERSION = '4.0.0';

    /**
     * @var ApiWrapperInterface
     */
    protected $api;

    /**
     * @var RecommendConfig
     */
    protected $config;

    public function __construct(ApiWrapperInterface $apiWrapper, RecommendConfig $config)
    {
        $this->config = $config;
        $this->api = $apiWrapper;
    }

    /**
     * Instantiate the client with basic credentials.
     *
     * @param string $appId  Application ID
     * @param string $apiKey Algolia API Key
     */
    public static function create($appId = null, $apiKey = null)
    {
        return static::createWithConfig(RecommendConfig::create($appId, $apiKey));
    }

    /**
     * Instantiate the client with configuration.
     *
     * @param RecommendConfig $config Configuration
     */
    public static function createWithConfig(RecommendConfig $config)
    {
        $config = clone $config;

        $apiWrapper = new ApiWrapper(
            Algolia::getHttpClient(),
            $config,
            self::getClusterHosts($config)
        );

        return new static($apiWrapper, $config);
    }

    /**
     * Gets the cluster hosts depending on the config.
     *
     * @return ClusterHosts
     */
    public static function getClusterHosts(RecommendConfig $config)
    {
        $cacheKey = sprintf('%s-clusterHosts-%s', __CLASS__, $config->getAppId());

        if ($hosts = $config->getHosts()) {
            // If a list of hosts was passed, we ignore the cache
            $clusterHosts = ClusterHosts::create($hosts);
        } elseif (false === ($clusterHosts = ClusterHosts::createFromCache($cacheKey))) {
            // We'll try to restore the ClusterHost from cache, if we cannot
            // we create a new instance and set the cache key
            $clusterHosts = ClusterHosts::createFromAppId($config->getAppId())
                ->setCacheKey($cacheKey)
            ;
        }

        return $clusterHosts;
    }

    /**
     * @return RecommendConfig
     */
    public function getClientConfig()
    {
        return $this->config;
    }

    /**
     * This method allow you to send requests to the Algolia REST API.
     *
     * @param string $path           Path of the endpoint, anything after \&quot;/1\&quot; must be specified. (required)
     * @param array  $parameters     Query parameters to apply to the current query. (optional)
     * @param array  $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|object
     */
    public function customDelete($path, $parameters = null, $requestOptions = [])
    {
        // verify the required parameter 'path' is set
        if (!isset($path)) {
            throw new \InvalidArgumentException(
                'Parameter `path` is required when calling `customDelete`.'
            );
        }

        $resourcePath = '/{path}';
        $queryParameters = [];
        $headers = [];
        $httpBody = null;

        if (null !== $parameters) {
            $queryParameters = $parameters;
        }

        // path params
        if (null !== $path) {
            $resourcePath = str_replace(
                '{path}',
                $path,
                $resourcePath
            );
        }

        return $this->sendRequest('DELETE', $resourcePath, $headers, $queryParameters, $httpBody, $requestOptions);
    }

    /**
     * This method allow you to send requests to the Algolia REST API.
     *
     * @param string $path           Path of the endpoint, anything after \&quot;/1\&quot; must be specified. (required)
     * @param array  $parameters     Query parameters to apply to the current query. (optional)
     * @param array  $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|object
     */
    public function customGet($path, $parameters = null, $requestOptions = [])
    {
        // verify the required parameter 'path' is set
        if (!isset($path)) {
            throw new \InvalidArgumentException(
                'Parameter `path` is required when calling `customGet`.'
            );
        }

        $resourcePath = '/{path}';
        $queryParameters = [];
        $headers = [];
        $httpBody = null;

        if (null !== $parameters) {
            $queryParameters = $parameters;
        }

        // path params
        if (null !== $path) {
            $resourcePath = str_replace(
                '{path}',
                $path,
                $resourcePath
            );
        }

        return $this->sendRequest('GET', $resourcePath, $headers, $queryParameters, $httpBody, $requestOptions);
    }

    /**
     * This method allow you to send requests to the Algolia REST API.
     *
     * @param string $path           Path of the endpoint, anything after \&quot;/1\&quot; must be specified. (required)
     * @param array  $parameters     Query parameters to apply to the current query. (optional)
     * @param array  $body           Parameters to send with the custom request. (optional)
     * @param array  $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|object
     */
    public function customPost($path, $parameters = null, $body = null, $requestOptions = [])
    {
        // verify the required parameter 'path' is set
        if (!isset($path)) {
            throw new \InvalidArgumentException(
                'Parameter `path` is required when calling `customPost`.'
            );
        }

        $resourcePath = '/{path}';
        $queryParameters = [];
        $headers = [];
        $httpBody = isset($body) ? $body : [];

        if (null !== $parameters) {
            $queryParameters = $parameters;
        }

        // path params
        if (null !== $path) {
            $resourcePath = str_replace(
                '{path}',
                $path,
                $resourcePath
            );
        }

        return $this->sendRequest('POST', $resourcePath, $headers, $queryParameters, $httpBody, $requestOptions);
    }

    /**
     * This method allow you to send requests to the Algolia REST API.
     *
     * @param string $path           Path of the endpoint, anything after \&quot;/1\&quot; must be specified. (required)
     * @param array  $parameters     Query parameters to apply to the current query. (optional)
     * @param array  $body           Parameters to send with the custom request. (optional)
     * @param array  $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|object
     */
    public function customPut($path, $parameters = null, $body = null, $requestOptions = [])
    {
        // verify the required parameter 'path' is set
        if (!isset($path)) {
            throw new \InvalidArgumentException(
                'Parameter `path` is required when calling `customPut`.'
            );
        }

        $resourcePath = '/{path}';
        $queryParameters = [];
        $headers = [];
        $httpBody = isset($body) ? $body : [];

        if (null !== $parameters) {
            $queryParameters = $parameters;
        }

        // path params
        if (null !== $path) {
            $resourcePath = str_replace(
                '{path}',
                $path,
                $resourcePath
            );
        }

        return $this->sendRequest('PUT', $resourcePath, $headers, $queryParameters, $httpBody, $requestOptions);
    }

    /**
     * Deletes a Recommend rule from a recommendation scenario.
     *
     * Required API Key ACLs:
     *  - editSettings
     *
     * @param string $indexName      Name of the index on which to perform the operation. (required)
     * @param array  $model          [Recommend model](https://www.algolia.com/doc/guides/algolia-recommend/overview/#recommend-models). (required)
     * @param string $objectID       Unique record identifier. (required)
     * @param array  $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return \Algolia\AlgoliaSearch\Model\Recommend\DeletedAtResponse|array<string, mixed>
     */
    public function deleteRecommendRule($indexName, $model, $objectID, $requestOptions = [])
    {
        // verify the required parameter 'indexName' is set
        if (!isset($indexName)) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `deleteRecommendRule`.'
            );
        }
        // verify the required parameter 'model' is set
        if (!isset($model)) {
            throw new \InvalidArgumentException(
                'Parameter `model` is required when calling `deleteRecommendRule`.'
            );
        }
        // verify the required parameter 'objectID' is set
        if (!isset($objectID)) {
            throw new \InvalidArgumentException(
                'Parameter `objectID` is required when calling `deleteRecommendRule`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/{model}/recommend/rules/{objectID}';
        $queryParameters = [];
        $headers = [];
        $httpBody = null;

        // path params
        if (null !== $indexName) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        // path params
        if (null !== $model) {
            $resourcePath = str_replace(
                '{model}',
                ObjectSerializer::toPathValue($model),
                $resourcePath
            );
        }

        // path params
        if (null !== $objectID) {
            $resourcePath = str_replace(
                '{objectID}',
                ObjectSerializer::toPathValue($objectID),
                $resourcePath
            );
        }

        return $this->sendRequest('DELETE', $resourcePath, $headers, $queryParameters, $httpBody, $requestOptions);
    }

    /**
     * Retrieves a Recommend rule that you previously created in the Algolia dashboard.
     *
     * Required API Key ACLs:
     *  - settings
     *
     * @param string $indexName      Name of the index on which to perform the operation. (required)
     * @param array  $model          [Recommend model](https://www.algolia.com/doc/guides/algolia-recommend/overview/#recommend-models). (required)
     * @param string $objectID       Unique record identifier. (required)
     * @param array  $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return \Algolia\AlgoliaSearch\Model\Recommend\RecommendRule|array<string, mixed>
     */
    public function getRecommendRule($indexName, $model, $objectID, $requestOptions = [])
    {
        // verify the required parameter 'indexName' is set
        if (!isset($indexName)) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `getRecommendRule`.'
            );
        }
        // verify the required parameter 'model' is set
        if (!isset($model)) {
            throw new \InvalidArgumentException(
                'Parameter `model` is required when calling `getRecommendRule`.'
            );
        }
        // verify the required parameter 'objectID' is set
        if (!isset($objectID)) {
            throw new \InvalidArgumentException(
                'Parameter `objectID` is required when calling `getRecommendRule`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/{model}/recommend/rules/{objectID}';
        $queryParameters = [];
        $headers = [];
        $httpBody = null;

        // path params
        if (null !== $indexName) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        // path params
        if (null !== $model) {
            $resourcePath = str_replace(
                '{model}',
                ObjectSerializer::toPathValue($model),
                $resourcePath
            );
        }

        // path params
        if (null !== $objectID) {
            $resourcePath = str_replace(
                '{objectID}',
                ObjectSerializer::toPathValue($objectID),
                $resourcePath
            );
        }

        return $this->sendRequest('GET', $resourcePath, $headers, $queryParameters, $httpBody, $requestOptions);
    }

    /**
     * Checks the status of a given task.  Deleting a Recommend rule is asynchronous. When you delete a rule, a task is created on a queue and completed depending on the load on the server. The API response includes a task ID that you can use to check the status.
     *
     * Required API Key ACLs:
     *  - editSettings
     *
     * @param string $indexName      Name of the index on which to perform the operation. (required)
     * @param array  $model          [Recommend model](https://www.algolia.com/doc/guides/algolia-recommend/overview/#recommend-models). (required)
     * @param int    $taskID         Unique task identifier. (required)
     * @param array  $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return \Algolia\AlgoliaSearch\Model\Recommend\GetRecommendTaskResponse|array<string, mixed>
     */
    public function getRecommendStatus($indexName, $model, $taskID, $requestOptions = [])
    {
        // verify the required parameter 'indexName' is set
        if (!isset($indexName)) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `getRecommendStatus`.'
            );
        }
        // verify the required parameter 'model' is set
        if (!isset($model)) {
            throw new \InvalidArgumentException(
                'Parameter `model` is required when calling `getRecommendStatus`.'
            );
        }
        // verify the required parameter 'taskID' is set
        if (!isset($taskID)) {
            throw new \InvalidArgumentException(
                'Parameter `taskID` is required when calling `getRecommendStatus`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/{model}/task/{taskID}';
        $queryParameters = [];
        $headers = [];
        $httpBody = null;

        // path params
        if (null !== $indexName) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        // path params
        if (null !== $model) {
            $resourcePath = str_replace(
                '{model}',
                ObjectSerializer::toPathValue($model),
                $resourcePath
            );
        }

        // path params
        if (null !== $taskID) {
            $resourcePath = str_replace(
                '{taskID}',
                ObjectSerializer::toPathValue($taskID),
                $resourcePath
            );
        }

        return $this->sendRequest('GET', $resourcePath, $headers, $queryParameters, $httpBody, $requestOptions);
    }

    /**
     * Retrieves recommendations from selected AI models.
     *
     * Required API Key ACLs:
     *  - search
     *
     * @param array $getRecommendationsParams getRecommendationsParams (required)
     *                                        - $getRecommendationsParams['requests'] => (array) Recommendation request with parameters depending on the requested model. (required)
     *
     * @see GetRecommendationsParams
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return \Algolia\AlgoliaSearch\Model\Recommend\GetRecommendationsResponse|array<string, mixed>
     */
    public function getRecommendations($getRecommendationsParams, $requestOptions = [])
    {
        // verify the required parameter 'getRecommendationsParams' is set
        if (!isset($getRecommendationsParams)) {
            throw new \InvalidArgumentException(
                'Parameter `getRecommendationsParams` is required when calling `getRecommendations`.'
            );
        }

        $resourcePath = '/1/indexes/*/recommendations';
        $queryParameters = [];
        $headers = [];
        $httpBody = $getRecommendationsParams;

        return $this->sendRequest('POST', $resourcePath, $headers, $queryParameters, $httpBody, $requestOptions, true);
    }

    /**
     * Searches for Recommend rules.  Use an empty query to list all rules for this recommendation scenario.
     *
     * Required API Key ACLs:
     *  - settings
     *
     * @param string $indexName                  Name of the index on which to perform the operation. (required)
     * @param array  $model                      [Recommend model](https://www.algolia.com/doc/guides/algolia-recommend/overview/#recommend-models). (required)
     * @param array  $searchRecommendRulesParams searchRecommendRulesParams (optional)
     *                                           - $searchRecommendRulesParams['query'] => (string) Search query.
     *                                           - $searchRecommendRulesParams['context'] => (string) Only search for rules with matching context.
     *                                           - $searchRecommendRulesParams['page'] => (int) Requested page of the API response.
     *                                           - $searchRecommendRulesParams['hitsPerPage'] => (int) Maximum number of hits per page.
     *                                           - $searchRecommendRulesParams['enabled'] => (bool) Whether to only show rules where the value of their `enabled` property matches this parameter. If absent, show all rules, regardless of their `enabled` property.
     *                                           - $searchRecommendRulesParams['filters'] => (string) Filter expression. This only searches for rules matching the filter expression.
     *                                           - $searchRecommendRulesParams['facets'] => (array) Include facets and facet values in the response. Use `['*']` to include all facets.
     *                                           - $searchRecommendRulesParams['maxValuesPerFacet'] => (int) Maximum number of values to return for each facet.
     *
     * @see SearchRecommendRulesParams
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return \Algolia\AlgoliaSearch\Model\Recommend\SearchRecommendRulesResponse|array<string, mixed>
     */
    public function searchRecommendRules($indexName, $model, $searchRecommendRulesParams = null, $requestOptions = [])
    {
        // verify the required parameter 'indexName' is set
        if (!isset($indexName)) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `searchRecommendRules`.'
            );
        }
        // verify the required parameter 'model' is set
        if (!isset($model)) {
            throw new \InvalidArgumentException(
                'Parameter `model` is required when calling `searchRecommendRules`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/{model}/recommend/rules/search';
        $queryParameters = [];
        $headers = [];
        $httpBody = isset($searchRecommendRulesParams) ? $searchRecommendRulesParams : [];

        // path params
        if (null !== $indexName) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        // path params
        if (null !== $model) {
            $resourcePath = str_replace(
                '{model}',
                ObjectSerializer::toPathValue($model),
                $resourcePath
            );
        }

        return $this->sendRequest('POST', $resourcePath, $headers, $queryParameters, $httpBody, $requestOptions, true);
    }

    private function sendRequest($method, $resourcePath, $headers, $queryParameters, $httpBody, $requestOptions, $useReadTransporter = false)
    {
        if (!isset($requestOptions['headers'])) {
            $requestOptions['headers'] = [];
        }
        if (!isset($requestOptions['queryParameters'])) {
            $requestOptions['queryParameters'] = [];
        }

        $requestOptions['headers'] = array_merge($headers, $requestOptions['headers']);
        $requestOptions['queryParameters'] = array_merge($queryParameters, $requestOptions['queryParameters']);
        $query = Query::build($requestOptions['queryParameters']);

        return $this->api->sendRequest(
            $method,
            $resourcePath.($query ? "?{$query}" : ''),
            $httpBody,
            $requestOptions,
            $useReadTransporter
        );
    }
}
