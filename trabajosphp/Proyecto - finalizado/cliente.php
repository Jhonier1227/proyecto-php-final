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


function crearCliente($pdo, $nombre, $apellido, $tipo_documento, $numero_documento, $telefono, $fecha_nacimiento) {
    try {
        $sql = "INSERT INTO cliente (nombre, apellido, tipo_documento, numero_documento, telefono, fecha_nacimiento) 
                VALUES (:nombre, :apellido, :tipo_documento, :numero_documento, :telefono, :fecha_nacimiento)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':tipo_documento', $tipo_documento);
        $stmt->bindParam(':numero_documento', $numero_documento);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->execute();
        echo "Cliente creado exitosamente.";
    } catch (PDOException $e) {
        echo "Error al crear cliente: " . $e->getMessage();
    }
}

function leerClientes($pdo) {
    try {
        $sql = "SELECT * FROM cliente";
        $stmt = $pdo->query($sql);
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($clientes) {
            foreach ($clientes as $cliente) {
                echo "ID Cliente: " . $cliente['id_cliente'] . "<br>";
                echo "Nombre: " . $cliente['nombre'] . "<br>";
                echo "Apellido: " . $cliente['apellido'] . "<br>";
                echo "Tipo de Documento: " . $cliente['tipo_documento'] . "<br>";
                echo "Número de Documento: " . $cliente['numero_documento'] . "<br>";
                echo "Teléfono: " . $cliente['telefono'] . "<br>";
                echo "Fecha de Nacimiento: " . $cliente['fecha_nacimiento'] . "<br><br>";
            }
        } else {
            echo "No se encontraron clientes.";
        }
    } catch (PDOException $e) {
        echo "Error al leer clientes: " . $e->getMessage();
    }
}

function actualizarCliente($pdo, $id_cliente, $nombre, $apellido, $tipo_documento, $numero_documento, $telefono, $fecha_nacimiento) {
    try {
        $sql = "UPDATE cliente SET nombre = :nombre, apellido = :apellido, tipo_documento = :tipo_documento, 
                numero_documento = :numero_documento, telefono = :telefono, fecha_nacimiento = :fecha_nacimiento 
                WHERE id_cliente = :id_cliente";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':tipo_documento', $tipo_documento);
        $stmt->bindParam(':numero_documento', $numero_documento);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        if ($stmt->execute()) {
            echo "Cliente actualizado exitosamente.";
        } else {
            echo "Error al actualizar cliente.";
        }
    } catch (PDOException $e) {
        echo "Error al actualizar cliente: " . $e->getMessage();
    }
}

function eliminarCliente($pdo, $id_cliente) {
    try {
        $sql = "DELETE FROM cliente WHERE id_cliente = :id_cliente";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_cliente', $id_cliente);
        if ($stmt->execute()) {
            echo "Cliente eliminado exitosamente.";
        } else {
            echo "Error al eliminar cliente.";
        }
    } catch (PDOException $e) {
        echo "Error al eliminar cliente: " . $e->getMessage();
    }
}

// Manejo de datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST['accion'] ?? '';
    $id_cliente = htmlspecialchars(trim($_POST['id_cliente'] ?? ''));
    $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ''));
    $apellido = htmlspecialchars(trim($_POST['apellido'] ?? ''));
    $tipo_documento = htmlspecialchars(trim($_POST['tipo_documento'] ?? ''));
    $numero_documento = htmlspecialchars(trim($_POST['numero_documento'] ?? ''));
    $telefono = htmlspecialchars(trim($_POST['telefono'] ?? ''));
    $fecha_nacimiento = htmlspecialchars(trim($_POST['fecha_nacimiento'] ?? ''));

    switch ($accion) {
        case 'create':
            if ($nombre && $apellido && $tipo_documento && $numero_documento && $telefono && $fecha_nacimiento) {
                crearCliente($pdo, $nombre, $apellido, $tipo_documento, $numero_documento, $telefono, $fecha_nacimiento);
            } else {
                echo "Error: todos los campos son obligatorios para crear un cliente.";
            }
            break;

        case 'read':
            leerClientes($pdo);
            break;

        case 'update':
            if ($id_cliente && $nombre && $apellido && $tipo_documento && $numero_documento && $telefono && $fecha_nacimiento) {
                actualizarCliente($pdo, $id_cliente, $nombre, $apellido, $tipo_documento, $numero_documento, $telefono, $fecha_nacimiento);
            } else {
                echo "Error: todos los campos son obligatorios para actualizar un cliente.";
            }
            break;

        case 'delete':
            if ($id_cliente) {
                eliminarCliente($pdo, $id_cliente);
            } else {
                echo "Error: el ID del cliente es obligatorio para eliminar.";
            }
            break;

        default:
            echo "Error: acción no reconocida.";
            break;
    }
}
?>