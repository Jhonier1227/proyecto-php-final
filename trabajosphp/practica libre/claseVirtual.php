
<?php
/*

6/NOVIEMBRE/2024

PHP AVANZADO:

// FECHA EN TIEMPO REAL  
echo "hoy es  " . date(" y/m/d")."<br>";

// DIA DE LA SEMANA 
echo "hoy es  " . date("l")."<br>";

// AÑO EN CUATRO DIGITOS 
echo "2014  " . date("- Y")."<br>";

// TIEMPO
echo "la hora es  " . date(" h:i:s")."<br>";

// TIEMPO LOCAL
date_default_timezone_set("America/New_York");
echo "el tiempo es ". date("h:i:sa");
*/


/*

13/NOVIEMBRE/2O24

PROGRAMACION ORIENTADA A OBJETOS

*/

/*
// primero se crea la clase la cual es una plantilla ara crear objetos.
class fruta{

    // propiedades
    //estas son propiedades bublicas la cual puede ser accsible y modificada desde otras clases.
    public $nombre;
    public $color;
  
    //metodos
    // este metodo recibe que recibe un parametro ($nombre) y le asigna la propiedad (nombre);
    function set_nombre($nombre){
         $this->nombre = $nombre;
    }
    // este metodo retorna el valor de la propiedad(name) del objeto. 
    function get_nombre(){
       return $this->nombre;
 
    }
}
// aqui esta creando dos nuevos objetos basado en la clase (fruta)
$manzana = new fruta();
$banana = new fruta();
// aqui le esta asignando la funcion(set_nombre) para que reciba los parametros.
$manzana -> set_nombre('manzana');
$banana ->set_nombre('banana');

// aqui llama la funcion (get_nombre) para que retorne y muestre el valor.
echo $manzana ->get_nombre();
echo"<br>";
echo $banana->get_nombre();
*/

// MySQL Base de datos

/*
$servername ="localhost";
$username = " root";
$password = "";

// creacion de la conexion 
$conn = new mysqli($servername,$username,$password);

if ($conn->conect_error){
     die("connection failed : ". $conn->conect_error);
}
echo "la conexion a sido exitosa"
*/


?>
