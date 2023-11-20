<?php
require_once 'config.php';
require_once 'db_connect.php';
require_once 'controladores/usuariocontroller.php';

$idusuario = $_GET['idusuario'];

$usuariocontroller = new usuariocontroller();
$usuario = $usuariocontroller->obtenerUsuarios($idusuario);
$conn = mysqli_connect("localhost", "root", "", "inventario");

// Consulta SQL para obtener los datos de los clientes
$sql = "SELECT * FROM usuarios WHERE idusuario = $idusuario";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {?>
<!DOCTYPE html>
<html>
<head>
    <title>Actualizar Administrador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Actualizar Administrador</h2>
        <form method="POST">
           
        <div class="form-group">
                <label>Cedula</label>
                <input type="text" class="form-control" name="idusuario" value="<?php echo $row["idusuario"]; ?>">
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" class="form-control" name="contrasena" value="<?php echo $row["contrasena"]; ?>">
            </div>
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $row["nombre"]; ?>">
            </div>
            <div class="form-group">
                <label>Dirección</label>
                <input type="text" class="form-control" name="direccion" value="<?php echo $row["direccion"]; ?>">
            </div>
            <div class="form-group">
                <label>Teléfono</label>
                <input type="text" class="form-control" name="telefono" value="<?php echo $row["telefono"]; ?>">
            </div>
            <div class="form-group">
                <label>Correo Electrónico</label>
                <input type="text" class="form-control" name="correo_electronico" value="<?php echo $row["correo_electronico"]; ?>">
            </div>
            
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
    
<?php   
}
?>

<?php
if ($_POST) {
    $idusuario = $_POST['idusuario'];
    $contrasena = $_POST['contrasena'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo_electronico = $_POST['correo_electronico'];

    $usuariocontroller->actualizarUsuario($idusuario, $contrasena, $nombre, $direccion, $telefono, $correo_electronico);
    header('Location: home_usuarios.php');
}


?>
