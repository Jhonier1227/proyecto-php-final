<?php
$nombre ="";
$apellido ="";
$nacimiento ="";
$correo ="";
$documento ="";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = test_input($_POST["nombre"]);
    $apellido = test_input($_POST["apellido"]);
    $nacimiento = test_input($_POST["nacimiento"]);
    $correo = test_input($_POST["correo"]);
    $documento = test_input($_POST["documento"]);
}

function test_input($dato){
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}

echo "<h2> La informacion es </h2>";
echo $nombre;
echo "<br>";
echo $apellido;
echo "<br>";
echo $nacimiento;
echo "<br>";
echo $correo;
echo "<br>";
echo $documento;


?>



























?>


