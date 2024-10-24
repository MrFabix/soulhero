<?php
// File: hello_algolia.php
require_once realpath(__DIR__ . "/../vendor/autoload.php");

use Algolia\AlgoliaSearch\Api\SearchClient;
$appID = "LPHEU823HM";
// API key with addObject and search ACL
$apiKey = "7b93b11d8122b28f2d1d74a06547bb5c";

//piu index
$indexName = array("dev_CLASS", "dev_WEAPON");
$query = isset($_POST['query']) ? $_POST['query'] : null;




$client = SearchClient::create($appID, $apiKey);


$strategy="stopIfEnoughMatches";
// Search for 'test'
$searchResponse = $client->search(
    ['requests' => [
        ['indexName' => 'dev_CLASS',
            'query' =>  $query,
        ],
        ['indexName' => 'dev_WEAPON',
            'query' =>  $query,
            ],

    ],

    ],

);

echo json_encode($searchResponse);