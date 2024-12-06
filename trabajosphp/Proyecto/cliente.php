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

// Funciones CRUD para "cliente"

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
        foreach ($clientes as $cliente) {
            echo "id: " . $cliente['id'] ."<br>";
            echo " Nombre: " . $cliente['nombre'] ."<br>";
            echo "apellido : " . $cliente['apellido'] ."<br>";
            echo "telefono: " . $cliente['telefono'] ."<br>";
            echo "fecha de nacimiento: " . $cliente['fecha_nacimiento'] ."<br>";
            echo "tipo de documento : " . $cliente['tipo_documento'] ."<br>";
        }
    } catch (PDOException $e) {
        echo "Error al leer clientes: " . $e->getMessage();
    }
}

function actualizarCliente($pdo, $id, $telefono) {
    try {
        $sql = "UPDATE cliente SET telefono = :telefono WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->execute();
        echo "Cliente actualizado exitosamente.";
    } catch (PDOException $e) {
        echo "Error al actualizar cliente: " . $e->getMessage();
    }
}

function eliminarCliente($pdo, $id) {
    try {
        $sql = "DELETE FROM cliente WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo "Cliente eliminado exitosamente.";
    } catch (PDOException $e) {
        echo "Error al eliminar cliente: " . $e->getMessage();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST['accion'] ?? '';
    $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ''));
    $apellido = htmlspecialchars(trim($_POST['apellido'] ?? ''));
    $tipo_documento = htmlspecialchars(trim($_POST['tipo_documento'] ?? ''));
    $telefono = htmlspecialchars(trim($_POST['telefono'] ?? ''));
    $numero_documento = htmlspecialchars(trim($_POST['numero_documento'] ?? ''));
    $fecha_nacimiento = htmlspecialchars(trim($_POST['fecha'] ?? ''));
       

    switch ($accion) {
        case 'create':
            if ($nombre && $apellido && $telefono) {
                crearCliente($pdo, $nombre, $apellido, $_POST['tipo_documento'], $_POST['numero_documento'], $telefono, $_POST['fecha_nacimiento']);
            } else {
                echo "Error: todos los campos son obligatorios para crear un cliente.";
            }
            break;

        case 'read':
            leerClientes($pdo, $nombre, $apellido, $tipo_documento, $numero_documento, $telefono, $fecha_nacimiento);
            break;

            case 'update':
                if ($id_cliente && ($nombre || $apellido || $telefono || $tipo_documento || $numero_documento || $fecha_nacimiento)) {
                    actualizarCliente($pdo, $nombre, $apellido, $tipo_documento, $numero_documento, $telefono, $fecha_nacimiento);
                } else {
                    echo "Error: todos los campos deben ser proporcionados para actualizar.";
                }
                break;

         case 'delete':
                if ($id_cliente) {
                eliminarCliente($pdo, $id_cliente);
                } else {
                 echo "Error: debe proporcionar el ID del cliente para eliminar.";
                }
                break;
default:
            echo "Error: acción no reconocida.";
            break;
    }

}
?> 