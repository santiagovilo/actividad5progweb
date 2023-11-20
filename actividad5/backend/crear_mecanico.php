<?php
// Archivos de controladores y modelos necesarios
require_once 'controladores/mecanicocontroller.php';
require_once 'modelos/mecanico.php';

// Logica para crear un nuevo mecanico
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $idmecanico = $_POST['idmecanico'];
    
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo_electronico = $_POST['correo_electronico'];

    // Crear una instancia del controlador de mecanicos
    $mecanicocontroller = new mecanicocontroller();

    // Llamar a la funcion para crear un nuevo mecanico
    $mecanicocontroller->crearMecanico($idmecanico, $nombre, $direccion, $telefono, $correo_electronico);

    // Redireccionar a la pagina de exito 
    header('Location: home_mecanicos.php');
    exit();
}

?>

<!-- Formulario HTML para crear un nuevo mecanico -->
<!DOCTYPE html>
<html>
<head>
    <title>Agregar mecanico</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
<h1>Agregar mecanico - Concesionario iCar Plus</h1>
    <form method="POST" action="crear_mecanico.php">
    <div class="form-group">
            <label for="idmecanico">Cedula:</label>
            <input type="text" name="idmecanico" id="idmecanico" class="form-control" required pattern="[0-9]{1,9}">
    <small>La cedula debe contener únicamente dígitos numéricos.</small>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required pattern="[a-zA-Z\s]+" maxlength="90">
    <small>El nombre debe contener únicamente dígitos alfabeticos.</small>
        </div>

        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion" class="form-control" required pattern="[a-zA-Z\s]+" maxlength="200">
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

        <button type="submit" class="btn btn-primary">Agregar mecanico</button>
        <a href="home_mecanicos.php" class="btn btn-primary float-right">Volver</a>

    </form>
</div>
</body>
</html>
