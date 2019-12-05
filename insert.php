<?php
    
$dbhost = "localhost";
$dbname = "pulpo";
$dbusername = "patezno";
$dbpassword = "";

try {
        
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);
    $jsondata = file_get_contents('diario.json');
    $sql = 'INSERT INTO diario(diario) VALUES (:diario);';
    $stmt = $conn->prepare($sql);

    $stmt->execute([':diario' => $jsondata]);
    $conn = null;
    echo 'Ha funcionado';
} catch (PDOException $e) {
    echo 'No ha funcionado';
    echo $e->getMessage();
}

?>
