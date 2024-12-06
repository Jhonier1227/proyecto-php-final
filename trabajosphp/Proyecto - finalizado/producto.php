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


// Funciones CRUD
function crearProducto($pdo, $nombre_producto, $cantidad) {
    try {
        $sql = "INSERT INTO producto (nombre_producto, cantidad) VALUES (:nombre_producto, :cantidad)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre_producto', $nombre_producto);
        $stmt->bindParam(':cantidad', $cantidad);
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

        if ($productos) {
            echo "<table border='1' style='width:100%; text-align:center;'>";
            echo "<tr><th>ID</th><th>Nombre del Producto</th><th>Cantidad</th></tr>";
            foreach ($productos as $producto) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($producto['id']) . "</td>";
                echo "<td>" . htmlspecialchars($producto['nombre_producto']) . "</td>";
                echo "<td>" . htmlspecialchars($producto['cantidad']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No hay productos registrados.";
        }
    } catch (PDOException $e) {
        echo "Error al leer productos: " . $e->getMessage();
    }
}

function actualizarProducto($pdo, $id, $nombre_producto, $cantidad) {
    try {
        $sql = "UPDATE producto SET nombre_producto = :nombre_producto, cantidad = :cantidad WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre_producto', $nombre_producto);
        $stmt->bindParam(':cantidad', $cantidad);

        if ($stmt->execute()) {
            echo "Producto actualizado exitosamente.";
        } else {
            echo "Error al actualizar producto.";
        }
    } catch (PDOException $e) {
        echo "Error al actualizar producto: " . $e->getMessage();
    }
}

function eliminarProducto($pdo, $id) {
    try {
        $sql = "DELETE FROM producto WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "Producto eliminado exitosamente.";
        } else {
            echo "Error al eliminar producto.";
        }
    } catch (PDOException $e) {
        echo "Error al eliminar producto: " . $e->getMessage();
    }
}

// Manejo de datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST['accion'] ?? '';
    $id = htmlspecialchars(trim($_POST['id'] ?? ''));
    $nombre_producto = htmlspecialchars(trim($_POST['nombre_producto'] ?? ''));
    $cantidad = htmlspecialchars(trim($_POST['cantidad'] ?? ''));

    switch ($accion) {
        case 'create':
            if ($nombre_producto && $cantidad) {
                crearProducto($pdo, $nombre_producto, $cantidad);
            } else {
                echo "Error: todos los campos son obligatorios para crear un producto.";
            }
            break;

        case 'read':
            leerProductos($pdo);
            break;

        case 'update':
            if ($id && ($nombre_producto || $cantidad)) {
                actualizarProducto($pdo, $id, $nombre_producto, $cantidad);
            } else {
                echo "Error: el ID y al menos un dato adicional son obligatorios para actualizar.";
            }
            break;

        case 'delete':
            if ($id) {
                eliminarProducto($pdo, $id);
            } else {
                echo "Error: el ID es obligatorio para eliminar un producto.";
            }
            break;

        default:
            echo "Error: acción no reconocida.";
            break;
    }
}
?>