<?php
// Incluir los archivos necesarios
require_once 'config.php';
require_once 'db_connect.php';
require_once 'modelos/mecanico.php';

// Obtener el id del mecanico a eliminar desde la URL
$idmecanico = $_GET['idmecanico'];

// Crear una instancia del controlador de mecanicos
$mecanicocontroller = new Mecanico();

// Llamar al metodo eliminarMecanico() del controlador para eliminar el mecanico
$mecanicocontroller->eliminarMecanico($idmecanico);

// Redireccionar a la pagina principal de mecanicos
header("Location: home_mecanicos.php");
exit();
?>
