<?php

header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');

$dbhost = "localhost";
$dbname = "pulpo";
$dbusername = "patezno";
$dbpassword = "";

try {

    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);
    $statement = $conn->prepare("SELECT * FROM diario");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);
    header('Content-Type: application/json');
    $conn = null;
    echo $json;

} catch (PDOException $e) {
    echo 'No ha funcionado';
    echo $e->getMessage();
}

?>