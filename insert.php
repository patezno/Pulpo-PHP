<?php

function insert() {
    
    $dbhost = "localhost";
    $dbname = "pulpo";
    $dbusername = "patezno";
    $dbpassword = "";

    try {
        
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);
        $jsondata = file_get_contents('diario.json');
        $diario = json_decode($jsondata, true);

        foreach ($diario as $row) {

            $id = null;
            $eventos = serialize($row['eventos']);
            $pulpo = $row['pulpo'];

            $sql = 'INSERT INTO diario(id, eventos, pulpo) VALUES (:id, :eventos, :pulpo);';
            $stmt = $conn->prepare($sql);

            $stmt->execute([':id' => $id,
                            ':eventos' => $eventos,
                            ':pulpo' => $pulpo]);
        }
        $conn = null;
        echo 'Ha funcionado';
    } catch (PDOException $e) {
        echo 'No ha funcionado';
        echo $e->getMessage();
    }
}

insert();

?>
