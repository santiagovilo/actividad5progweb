<?php
// Incluir los archivos de controlador y modelo de clientes

require_once 'modelos/cliente.php';
require_once 'config.php';
require_once 'db_connect.php';

// Obtener el idcliente enviado desde el formulario
$idcliente = $_GET['idcliente'];

// Crear una instancia del controlador de clientes
$clientecontroller = new Cliente();

// Llamar a la funcion para eliminar un cliente
$clientecontroller->eliminarCliente($idcliente);

// Verificar el resultado y redireccionar 
header("Location: home_clientes.php");
exit();
?>
