CREATE TABLE producto (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre_producto VARCHAR(155) NOT NULL,
    cantidad INT NOT NULL
);

CREATE TABLE cliente (
    id_cliente INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    tipo_documento ENUM('CC', 'TI', 'CE', 'RN') NOT NULL,
    numero_documento VARCHAR(12) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    fecha_nacimiento DATE NOT NULL
);

CREATE TABLE factura (
    id INT PRIMARY KEY AUTO_INCREMENT,
    numero_factura VARCHAR(30) NOT NULL,
    id_producto INT NOT NULL,
    cantidad INT NOT NULL,
    valor DECIMAL(10,2) NOT NULL
    
);
