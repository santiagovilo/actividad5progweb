<?php
// Archivos de configuracion y conexion a la base de datos
require_once 'config.php';
require_once 'db_connect.php';

// Archivos de controladores y modelos necesarios
require_once 'controladores/usuariocontroller.php';

// Verificar si se envio el formulario de inicio de sesion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $idusuario = $_POST['idusuario'];
    $contrasena = $_POST['contrasena'];

    // Crear una instancia del controlador de usuarios
    $usuariocontroller = new usuariocontroller();

    // Verificar las credenciales del usuario
    if ($usuariocontroller -> verificarCredenciales($idusuario, $contrasena)) {
        // Iniciar sesion y redirigir al home
        session_start();
        $_SESSION['idusuario'] = $idusuario;
        header('Location: home.php');
        exit();
    } else {
        // Mostrar un mensaje de error si las credenciales son incorrectas
        $mensajeError = 'Usuario o contraseña incorrectos';
    }
}
?>

<!DOCTYPE html>
<!-- Formulario de inicio de sesion -->
<html>
<head>
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Iniciar Sesión - Concesionario iCar Plus</h1>

        <?php if (isset($mensajeError)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $mensajeError; ?>
            </div>
        <?php endif; ?>

        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="idusuario">Usuario:</label>
                <input type="text" class="form-control" id="idusuario" name="idusuario" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
