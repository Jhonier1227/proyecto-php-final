<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tps2_123";

Try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);

    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "conexion exitosa, con PDO oRIENTADA A OBJETOS, extensiones de php <br> :";
}
catch(PDOException $e){
    echo "conexion fallida , con PDO <br>". $e->getMessage();
}






?>