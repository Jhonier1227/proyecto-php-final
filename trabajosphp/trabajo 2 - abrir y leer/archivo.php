<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Archivo</title>
</head>
<body>
    <?php
// ABRIR Y LEER ACHIVOS

 // esto se utliza para mostrar el contenido que esta un archivo.
/*    
$mydocumento = fopen("jhonier.txt", "r")
or die ("no se puede abrir el archivo!");
*/


// El FILESIZE genera un WARNING si llega a ver un error en el archivo.
/*
echo fread($mydocumento,filesize("jhonier.txt"));
fclose($mydocumento);
*/


// fgets() se utiliza solo para mostrar la primera linea del archivo
/*
$mydocumento = fopen("jhonier.txt", "r")
or die ("no se puede abrir el archivo!");
echo fgets($mydocumento);
fclose($mydocumento);
*/


// el fgets() se utliza para mostrar solo la primera linea del archivo.
/*
$mydocumento = fopen("jhonier.txt", "r")
or die ("no se puede abrir el archivo!");

while(!feof($mydocumento)){
    echo fgets($mydocumento). "<br>";
}
fclose($mydocumento);
*/

//CREAR Y ESCRIBIR ARCHIVOS

// fopen() tambien se utliza para crear nuevos archivos
/*
$miNuevoArchivo = fopen("stiven.txt","w");
*/


// esta parte del codigo se utliza para agregarle y modificar contenido del archivo
// la funcion fwrite() contiene el nombre dek archivo a escribir y de segundo es el paramatrto de laas cadenas.
/*
$miNuevoArchivo = fopen("stiven.txt" , "w") or 
die ("no se puede abir el archivo");
$txt = "Jhonier Stiven\n";
fwrite($miNuevoArchivo,$txt);
$txt="Montaño Castillo\n";
fwrite($miNuevoArchivo,$txt);
fclose($miNuevoArchivo);
*/


?>
</body>
</html>