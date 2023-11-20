<?php
// Incluir los archivos necesarios
require_once 'config.php';
require_once 'db_connect.php';
require_once 'modelos/repuesto.php';

// Obtener el id del repuesto a eliminar desde la URL
$id_repuesto = $_GET['id_repuesto'];

// Crear una instancia del controlador de repuestos
$repuestocontroller = new Repuesto();

// Llamar al metodo eliminarRepuesto() deel controlador para eliminar el repuesto
$repuestocontroller->eliminarRepuesto($id_repuesto);

// Redireccionar a la pagina principal de repuestos
header("Location: home_repuestos.php");
exit();
?>
