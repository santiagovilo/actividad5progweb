<?php
// Archivos de controladores y modelos necesarios
require_once 'controladores/clientecontroller.php';
require_once 'modelos/cliente.php';

// Logica para crear un nuevo usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $idcliente = $_POST['idcliente'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo_electronico = $_POST['correo_electronico'];

    // Crear una instancia del controlador de usuarios
    $clientecontroller = new clientecontroller();

    // Llamar a la funcion para crear un nuevo usuario
    $clientecontroller->crearCliente($idcliente, $nombre, $direccion, $telefono, $correo_electronico);

    // Redireccionar a la pagina de exito 
    header('Location: home_clientes.php');
    exit();
}

?>

<!-- Formulario HTML para crear un nuevo usuario -->
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
<h1>Agregar cliente - Concesionario iCar Plus</h1>
    <form method="POST" action="crear_cliente.php">
    <div class="form-group">
            <label for="idcliente">Cedula:</label>
            <input type="text" name="idcliente" id="idcliente" class="form-control"  required pattern="[0-9]{1,9}">
    <small>La cedula debe contener únicamente dígitos numéricos.</small>
        </div>


        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control"  required pattern="[a-zA-Z\s]+" maxlength="90">
    <small>El nombre debe contener únicamente dígitos alfabeticos.</small>
        </div>

        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion" class="form-control"  required pattern="[a-zA-Z\s]+" maxlength="200">
    <small>La dirrecion debe contener únicamente dígitos alfabeticos.</small>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="tel" name="telefono" id="telefono" class="form-control" required pattern="[0-9]{1,18}">
    <small>El telefono debe contener únicamente dígitos numéricos.</small>
        </div>

        <div class="form-group">
            <label for="correo_electronico">Correo Electrónico:</label>
            <input type="email" name="correo_electronico" id="correo_electronico" class="form-control" required maxlength="90">
        <small>Por favor usuario/a ingrese un correo electrónico válido.</small>
        </div>

        <button type="submit" class="btn btn-primary">Agregar cliente</button>
        <a href="home_clientes.php" class="btn btn-primary float-right">Volver</a>
    </form>
</div>
</body>
</html>
