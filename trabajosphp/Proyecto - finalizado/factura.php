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


// Función para crear una factura
function crearFactura($pdo, $numero_factura, $id_producto, $cantidad, $valor) {
    try {
        $sql = "INSERT INTO factura (numero_factura, id_producto, cantidad, valor) 
                VALUES (:numero_factura, :id_producto, :cantidad, :valor)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':numero_factura', $numero_factura);
        $stmt->bindParam(':id_producto', $id_producto);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':valor', $valor);
        $stmt->execute();
        echo "Factura creada exitosamente.";
    } catch (PDOException $e) {
        echo "Error al crear factura: " . $e->getMessage();
    }
}

// Función para leer facturas
function leerFacturas($pdo) {
    try {
        $sql = "SELECT * FROM factura";
        $stmt = $pdo->query($sql);
        $facturas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($facturas) {
            foreach ($facturas as $factura) {
                echo "ID: " . $factura['id'] . "<br>";
                echo "Número Factura: " . $factura['numero_factura'] . "<br>";
                echo "ID Producto: " . $factura['id_producto'] . "<br>";
                echo "Cantidad: " . $factura['cantidad'] . "<br>";
                echo "Valor: " . $factura['valor'] . "<br><br>";
            }
        } else {
            echo "No hay facturas registradas.";
        }
    } catch (PDOException $e) {
        echo "Error al leer facturas: " . $e->getMessage();
    }
}

// Función para actualizar una factura
function actualizarFactura($pdo, $id, $numero_factura, $id_producto, $cantidad, $valor) {
    try {
        $sql = "UPDATE factura 
                SET numero_factura = :numero_factura, id_producto = :id_producto, cantidad = :cantidad, valor = :valor
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':numero_factura', $numero_factura);
        $stmt->bindParam(':id_producto', $id_producto);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':valor', $valor);
        if ($stmt->execute()) {
            echo "Factura actualizada exitosamente.";
        } else {
            echo "No se pudo actualizar la factura.";
        }
    } catch (PDOException $e) {
        echo "Error al actualizar factura: " . $e->getMessage();
    }
}

// Función para eliminar una factura
function eliminarFactura($pdo, $id) {
    try {
        $sql = "DELETE FROM factura WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            echo "Factura eliminada exitosamente.";
        } else {
            echo "No se pudo eliminar la factura.";
        }
    } catch (PDOException $e) {
        echo "Error al eliminar factura: " . $e->getMessage();
    }
}

// Manejo de datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST['accion'] ?? '';
    $id = $_POST['id'] ?? null;
    $numero_factura = $_POST['numero_factura'] ?? '';
    $id_producto = $_POST['id_producto'] ?? null;
    $cantidad = $_POST['cantidad'] ?? null;
    $valor = $_POST['valor'] ?? null;

    switch ($accion) {
        case 'create':
            if ($numero_factura && $id_producto && $cantidad && $valor) {
                crearFactura($pdo, $numero_factura, $id_producto, $cantidad, $valor);
            } else {
                echo "Error: todos los campos son obligatorios para crear una factura.";
            }
            break;

        case 'read':
            leerFacturas($pdo);
            break;

        case 'update':
            if ($id && $numero_factura && $id_producto && $cantidad && $valor) {
                actualizarFactura($pdo, $id, $numero_factura, $id_producto, $cantidad, $valor);
            } else {
                echo "Error: todos los campos son obligatorios para actualizar una factura.";
            }
            break;

        case 'delete':
            if ($id) {
                eliminarFactura($pdo, $id);
            } else {
                echo "Error: el ID es obligatorio para eliminar una factura.";
            }
            break;

        default:
            echo "Acción no reconocida.";
            break;
    }
}
?>