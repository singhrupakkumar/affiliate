<?php
require dirname(__DIR__) . '/vendor/autoload.php';

$api_key = "008d0d656cc5e9dd96fd4abd6ad9b9bb6d4ce0d8deb5d2d386cd35bb8932f77a6486a4b9d70acfba1035e8d42a55d83ca3c906a3ee48cff8a9c9e047d6379b649f/32b010b5a0fda4bac0b51e128ac15ae031534fbbe0bd2d7470c4116b815c3ba7e0dfe1aab82f8c476eae5f00e522a97728fc94d59f577f86327476c30c129fe9";

$client = new CROSCON\CommissionJunction\Client($api_key);

try {
    var_export($client->supportLookup('languages'));
} catch (\CROSCON\CommissionJunction\Exception $e) {
    echo "!! ERROR: {$e->getMessage()}";
}

echo "\n";