<?php
// Incluir los archivos necesarios
require_once 'config.php';
require_once 'db_connect.php';
require_once 'modelos/vehiculo.php';

// Obtener el id del vehiculo a eliminar desde la URL
$id_vehiculo = $_GET['id_vehiculo'];

// Crear una instancia del controlador de vehiculos
$vehiculocontroller = new Vehiculo();

// Llamar al método eliminarVehiculo() del controlador para eliminar el vehiculo
$vehiculocontroller->eliminarVehiculo($id_vehiculo);

// Redireccionar a la pagina principal de vehiculos
header("Location: home_vehiculos.php");
exit();
?>
