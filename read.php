<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Configuration
$dbhost = 'localhost';
$dbport = '27017';

$conn = new MongoDB\Driver\Manager("mongodb://$dbhost:$dbport");

$dbname = 'pulpo';
$collection = 'diario';

// DB connection
$conn = $conn->getConnection();

$filter = [];
$option = [];
$read = new MongoDB\Driver\Query($filter, $option);

// fetch records
$records = $conn->executeQuery("$dbname.$collection", $read);

echo json_encode(iterator_to_array($records));

?>