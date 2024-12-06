<?php

// PRIMER EJEMPLO
/*
$servername = "localhost";
$username ="root";
$password ="";

// creacion de la conexion

$conn = new mysqli($servername,$username,$password);

// revisar la conexion
if($conn ->connect_error){
    die("conexion fallida : ".$conn->connect_error);
}
echo"conexion correcta, con MySQL Orientado a objetos <br>";
*/

// SEGUNDO EJEMPLO 
/*
$servername = "locahost";
$usarname = "root";
$password = "";

// creacion de la conexion
$conn = new mysqli_connect($servername,$username,$password);

// revision de la conexion

// error por resolver.
 if(¡ $conn){
        die("conexion Fallida : ".mysqli_connect_error());
    }
    echo "conexion exitosa , con MYSQL orientado a Procedimientos <br>";
*/
/*
$servername = "locahost";
$usarname = "root";
$password = "";

Try{
    $conn = new PDO("mysql:host=$servername", $username,$password);

    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "conexion exitosa, con PDO oRIENTADA A OBJETOS, extensiones de php <br> :";
}
catch(PDOException $e){
    echo "conexion fallida , con PDO <br>". $e->getMessage();
}
*/

// CREAR TABLA MY SQL DESDE PHP.

/*

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jhonyer";

 try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // sql to create table
  $sql = "CREATE TABLE MyGuests (
  Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Firstname VARCHAR(30) NOT NULL,
  Lastname VARCHAR(30) NOT NULL,
  Email VARCHAR(50),
  Reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";  // use exec() because no results are returned
  $conn->exec($sql);
  Echo "Table MyGuests created Exitosamente";
} 
 catch(PDOException $e) {
  Echo $sql . "<br>" . $e->getMessage();
  } $conn = null;

*/

$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE DATABASE tps2_123";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Database created successfully<br>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

  
?>

