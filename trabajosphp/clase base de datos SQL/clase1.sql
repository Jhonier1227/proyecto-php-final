 
-- 1.DDL (DATA DEFINITION LANGUAGE).
/*
-Se utiliza para definir y administrar la estructura de la base de datos
como tablas,indices y vistas.
 */ 
 -- CREATE: Crea nuevo objetos en la base de datos.
 CREATE TABLE empleados(
    id INT PRIMARY KEY,
    nombre VARCHAR(30),
    salario DECIMAL(10,2)
 );

 -- ALTER: Modifica la esructura de un objeto existente.
 ALTER TABLE empleados
 ADD fecha_nacimiento DATE;

 --DROP: Sirve para borrar un objeto

