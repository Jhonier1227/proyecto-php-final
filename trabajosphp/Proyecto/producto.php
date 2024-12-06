<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CrudProyecto";

Try{
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "conexion exitosa, con PDO oRIENTADA A OBJETOS, extensiones de php <br> :";
}
catch(PDOException $e){
    echo "conexion fallida , con PDO <br>". $e->getMessage();
}
// Crear la base de datos



// Funciones CRUD para "producto"
function crearProducto($pdo, $nombre_producto) {
    try {
        $sql = "INSERT INTO producto (nombre_producto) VALUES (:nombre_producto)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre_producto', $nombre_producto);
        $stmt->execute();
        echo "Producto creado exitosamente.";
    } catch (PDOException $e) {
        echo "Error al crear producto: " . $e->getMessage();
    }
}

function leerProductos($pdo) {
    try {
        $sql = "SELECT * FROM producto";
        $stmt = $pdo->query($sql);
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($productos as $producto) {
            echo "ID: " . $producto['id'] . " - Nombre: " . $producto['nombre_producto'] . "<br>";
        }
    } catch (PDOException $e) {
        echo "Error al leer productos: " . $e->getMessage();
    }
}

function actualizarProducto($pdo, $id, $nombre_producto) {
    try {
        $sql = "UPDATE producto SET nombre_producto = :nombre_producto WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre_producto', $nombre_producto);
        $stmt->execute();
        echo "Producto actualizado exitosamente.";
    } catch (PDOException $e) {
        echo "Error al actualizar producto: " . $e->getMessage();
    }
}

function eliminarProducto($pdo, $id) {
    try {
        $sql = "DELETE FROM producto WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo "Producto eliminado exitosamente.";
    } catch (PDOException $e) {
        echo "Error al eliminar producto: " . $e->getMessage();
    }
}

?>