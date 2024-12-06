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


// Funciones CRUD para "factura"
function crearFactura($pdo, $numero_factura, $id_cliente, $id_producto, $cantidad, $valor) {
    try {
        $sql = "INSERT INTO factura (numero_factura, id_cliente, id_producto, cantidad, valor) 
                VALUES (:numero_factura, :id_cliente, :id_producto, :cantidad, :valor)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':numero_factura', $numero_factura);
        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->bindParam(':id_producto', $id_producto);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':valor', $valor);
        $stmt->execute();
        echo "Factura creada exitosamente.";
    } catch (PDOException $e) {
        echo "Error al crear factura: " . $e->getMessage();
    }
}

function leerFacturas($pdo) {
    try {
        $sql = "SELECT * FROM factura";
        $stmt = $pdo->query($sql);
        $facturas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($facturas as $factura) {
            echo "Factura N°: " . $factura['numero_factura'] . " - Cliente ID: " . $factura['id_cliente'] . "<br>";
        }
    } catch (PDOException $e) {
        echo "Error al leer facturas: " . $e->getMessage();
    }
}

function eliminarFactura($pdo, $id) {
    try {
        $sql = "DELETE FROM factura WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo "Factura eliminada exitosamente.";
    } catch (PDOException $e) {
        echo "Error al eliminar factura: " . $e->getMessage();
    }
}




?>