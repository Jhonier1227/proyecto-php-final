<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
     
    

    // Aquí puedes hacer algo con los datos, como guardarlos en una base de datos
    echo "Datos recibidos:<br>";
    echo "Nombre: " . htmlspecialchars($nombre) . "<br>";
    echo "Apellido: " . htmlspecialchars($apellido) . "<br>";
    echo "Teléfono: " . htmlspecialchars($telefono) . "<br>";
    
    
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jhonyer";

// 
try {
 // Esta línea está creando una nueva instancia de la clase (PDO).
  $pdo = new PDO("mysql:host=$servername;dbname=", $username, $password);

  // establecer el modo de error de PDO en excepción.
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // MUESTRA QUE LA CONEXION FUE EXITOSA.
  echo "Conexion Exitosa, con PDO Orientada a Objetos, extencion de PHP </br> :";
} catch(PDOException $e) {  // SI LA CONEXION NO LLEGRA A HACER EXITOSA MUESTRA ESTE MENSAJE.
  echo "Conexion Fallida, con PDO Orientada a Objetos, extencion de PHP </br> " . $e->getMessage();
}


?>
