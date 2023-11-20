<?php
// Aquí puedes incluir los archivos de controladores y modelos necesarios
require_once 'controladores/usuariocontroller.php';
require_once 'modelos/usuario.php';

// Logica para crear un nuevo usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $idusuario = $_POST['idusuario'];
    $contrasena = $_POST['contrasena'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo_electronico = $_POST['correo_electronico'];

    // Crear una instancia del controlador de usuarios
    $usuariocontroller = new usuariocontroller();

    // Llamar a la funcion para crear un nuevo usuario
    $usuariocontroller->crearUsuario($idusuario, $contrasena, $nombre, $direccion, $telefono, $correo_electronico);

    // Redireccionar a la pagina de exito 
    header('Location: home.php');
    exit();
}

?>

<!-- Formulario HTML para crear un nuevo usuario -->
<!DOCTYPE html>
<html>
<head>
    <title>Registrar Administrador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
<h1>Registrar Administrador/a - Concesionario iCar Plus</h1>
    <form method="POST" action="crear_usuario.php">
    <div class="form-group">
            <label for="idusuario">Cedula:</label>
            <input type="text" name="idusuario" id="idusuario" class="form-control" required pattern="[0-9]{1,9}">
    <small>La cedula debe contener únicamente dígitos numéricos.</small>
        </div>

    <div class="form-group">
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" class="form-control" required pattern="^[a-zA-Z0-9!@#$%^&*()-=_+]{12,30}$">
        <small>La contraseña debe contener minimo 12 caracteres y maximo 30 caracteres.</small>
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

        <button type="submit" class="btn btn-primary">Crear Administrador</button>
        <a href="home_usuarios.php" class="btn btn-primary float-right">Volver</a>

        
    </form>
</div>
</body>
</html>
