<?php

require_once 'vendor/autoload.php';
include('conexionbd.php');

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();

for ($i = 0; $i < 1000; $i++) {

    // company
    echo $faker->company;
    $compania = $faker->company;

    // date
    $fecha = $faker->dateTimeBetween();
    $nuevo = (array) $fecha;
    $x = 0;
    foreach ($nuevo as $posicion => $date) {
        if ($x == 0) {
            $fes = explode(" ", $date);
        }
        $x++;
    }
    echo $fes[0].",";
    $lafecha = $fes[0];

    //qty
    echo $faker->numberBetween(0, 10000).",";
    $numero = $faker->numberBetween(0, 10000);

    //llamar a la funcion para insertar los datos en la base de datos
    insertarDatos($lafecha, $compania, $numero);
}

function insertarDatos($fecha, $compania, $num){
    require('conexionbd.php');
    $stmt = $conn->prepare("INSERT INTO orders (date, company, qty) VALUES (:date, :company, :qty)");
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':company', $company);
    $stmt->bindParam(':qty', $qty);
    $date= $fecha;
    $company = $compania;
    $qty= $num;
    $stmt->execute();
}

  
?>