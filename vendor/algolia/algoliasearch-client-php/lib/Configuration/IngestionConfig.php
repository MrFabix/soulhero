<?php

// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

namespace Algolia\AlgoliaSearch\Configuration;

use Algolia\AlgoliaSearch\Exceptions\AlgoliaException;

class IngestionConfig extends ConfigWithRegion
{
    protected $clientName = 'Ingestion';

    public static function create($appId, $apiKey, $region = null)
    {
        $allowedRegions = ['eu', 'us'];

        if (
            null === $region
            || (null !== $region && !in_array($region, $allowedRegions, true))
        ) {
            throw new AlgoliaException(
                '`region` is required and must be one of the following: '.
                    implode(', ', $allowedRegions)
            );
        }

        return parent::create($appId, $apiKey, $region);
    }
}
