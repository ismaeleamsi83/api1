<?php

$dsn = 'mysql:dbname=icb0006_uf4_pr01;host=localhost';
$usuario = 'root';
$password = '';

try {
    $conn = new PDO($dsn, $usuario, $password);
    echo '<br>Conexion establecida';
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}
  



?>