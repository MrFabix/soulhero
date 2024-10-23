<?php
// File: hello_algolia.php
require_once realpath(__DIR__ . "/../vendor/autoload.php");

use Algolia\AlgoliaSearch\Api\SearchClient;
$appID = "LPHEU823HM";
// API key with addObject and search ACL
$apiKey = "7b93b11d8122b28f2d1d74a06547bb5c";
$indexName = "dev_WEAPON";

$client = SearchClient::create($appID, $apiKey);
//
//// Create a new record
//$record = [
//    "objectID" => "object-1",
//    "name" => "test record",
//];
//
//// Add the record to an index
//$saveResp = $client->saveObject($indexName, $record);
//
//// Wait until indexing is done
//$client->waitForTask($indexName, $saveResp['taskID']);
$query = $_POST['query'];
// Search for 'test'
$searchResponse = $client->search(
    ['requests' => [
        ['indexName' => $indexName, 'query' => $query]
    ]],
);

echo json_encode($searchResponse);