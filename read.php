<?php

function read() {

    $dbhost = "localhost";
    $dbname = "pulpo";
    $dbusername = "patezno";
    $dbpassword = "";

    try {

        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);
        $sql = "SELECT * FROM diario";
        $sth = $conn->prepare($sql);
        $rows = $sth->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_GROUP);
        echo json_encode(array('content' => $rows));

    } catch (PDOException $e) {
        echo 'No ha funcionado';
        echo $e->getMessage();
    }

}

read();

?>