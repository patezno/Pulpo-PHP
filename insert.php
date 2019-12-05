<?php
    
$dbhost = "localhost";
$dbname = "pulpo";
$dbusername = "patezno";
$dbpassword = "";

try {
        
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);
    $jsondata = file_get_contents('diario.json');
    $diario = json_decode($jsondata, true);

    $i = 1;
    foreach ($diario as $row) {

        $id = $i;
        $pulpo = $row['pulpo'];
        $eventos = $row['eventos'];

        $sql = 'INSERT INTO diario(id, pulpo) VALUES (:id, :pulpo);';
        $stmt = $conn->prepare($sql);

        $stmt->execute([':id' => $id,
                        ':pulpo' => $pulpo]);

        foreach ($eventos as $evento) {

            $idEvent = null;
            
            $sql = 'INSERT INTO evento(id, evento, diario_id) VALUES (:idEvent, :evento, :id);';
            $stmt = $conn-> prepare($sql);

            $stmt-> execute([':id' => $idEvent,
                            ':evento' => $evento
                            ':id' => $id]);
        }
        $i++;
    }
    $conn = null;
    echo 'Ha funcionado';
} catch (PDOException $e) {
    echo 'No ha funcionado';
    echo $e->getMessage();
}

?>
