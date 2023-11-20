<?php
//Se incluyen los archivos necesarios de controlador, conexion a la base de datos y el controlador de mecanicos
require_once 'config.php';
require_once 'db_connect.php';
require_once 'controladores/mecanicocontroller.php';

$idmecanico = $_GET['idmecanico'];

// Se crea una instancia del controlador de mecanicos y se llama al metodo obtenerMecanicos() pasandole el ID
$mecanicocontroller = new mecanicocontroller();
$mecanico = $mecanicocontroller->obtenerMecanicos($idmecanico);
$conn = mysqli_connect("localhost", "root", "", "inventario");

// Consulta SQL para obtener los datos de los clientes
$sql = "SELECT * FROM mecanicos WHERE idmecanico = $idmecanico";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {?>
<!DOCTYPE html>
<html>
<head>
    <!-- Formulario precargado con los datos del mecanico utilizando echo para mostrarlos en los inputs -->
    <title>Actualizar Mecánico</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Actualizar Mecánico</h2>
        <form method="POST">
           
        <div class="form-group">
                <label>idmecanico</label>
                <input type="text" class="form-control" name="idmecanico" value="<?php echo $row["idmecanico"]; ?>">
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
// Al enviar el formulario, se capturan los nuevos datos y se llama al metodo de actualizacion del controlador
if ($_POST) {
    $idmecanico = $_POST['idmecanico'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo_electronico = $_POST['correo_electronico'];

    $mecanicocontroller->actualizarMecanico($idmecanico, $nombre, $direccion, $telefono, $correo_electronico);
    header('Location: home_mecanicos.php');
}


?>
