<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Document</title>
    </head>
 <body>
        <?php

/* practica php
con jhonier
*/

/*
$x = 5;
$y =6;    
echo ("el resultado de la suma es :".$y+$x."<br>");
// se utiliza para mostrar el valor del elemento si es entero,decimal,boleano,arreglo,etc.
var_dump((5)."<br>");
var_dump(true."<br>");
var_dump(5.0."<br>");
var_dump([5,6,4]);

 // CICLO FOR 
 for($i = 1;$i < $y;$i=+10){
    if($i == 4);
    echo ("hola mundo");
 }
 */

 // GLOBAL se utiliza para acceder a una variable dentro de una funcion

 $x = 4.8;
 $y = 9;
/*
 function suma(){
   global $x ,$y;
   echo $z = $x + $y;
 }

suma();
*/

// $GLOBALS se utliza para actulizar o cambiar variables globales fuera de la funcion
/*function matriz(){
    $GLOBALS['y'] = $GLOBALS["y"] + $GLOBALS["x"];
}
matriz();
echo $y;
*/

/*
// STATIC se utiliza para mantener la informacion de la variable.
function suma(){
    static $x = 0;
    echo $x ."<br>";
    $x++;
}

suma();
suma();
suma();
*/

// is_int : esta fucion nos dice si el valor es entero (true,false).
/* 
var_dump(is_int($x));
var_dump(is_int($y));
*/
/*
var_dump(is_float($x));
var_dump(is_float($y));
*/

?>
</body>
</html>