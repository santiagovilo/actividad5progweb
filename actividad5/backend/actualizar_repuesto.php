<?php
require_once 'config.php';
require_once 'db_connect.php';
require_once 'controladores/repuestocontroller.php';

$id_repuesto = $_GET['id_repuesto'];

$repuestocontroller = new repuestocontroller();
$repuesto = $repuestocontroller->obtenerRepuestos($id_repuesto);
$conn = mysqli_connect("localhost", "root", "", "inventario");

// Consulta SQL para obtener los datos de los repuestos
$sql = "SELECT * FROM repuestos WHERE id_repuesto = $id_repuesto";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {?>
<!DOCTYPE html>
<html>
<head>
    <title>Actualizar Repuesto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Actualizar Repuesto - Concesionario iCar Plus</h2>
        <form method="POST">
           
        <div class="form-group">
                <label>ID Repuesto:</label>
                <input type="text" class="form-control" name="id_repuesto" value="<?php echo $row["id_repuesto"]; ?> ">
            </div>
            <div class="form-group">
                <label>Descripcion</label>
                <input type="text" class="form-control" name="descripcion" value="<?php echo $row["descripcion"]; ?>" required pattern="[a-zA-Z0-9\s]+" maxlength="200">
    <small>La descripcion debe contener únicamente dígitos alfanumericos.</small>
            </div>
            <div class="form-group">
                <label>Marca</label>
                <input type="text" class="form-control" name="marca" value="<?php echo $row["marca"]; ?>" required pattern="[a-zA-Z\s]+" maxlength="45">
    <small>La marca debe contener únicamente dígitos alfabeticos.</small>
            </div>
            <div class="form-group">
                <label>Modelo</label>
                <input type="text" class="form-control" name="modelo" value="<?php echo $row["modelo"]; ?>" required pattern="[a-zA-Z0-9\s]+" maxlength="45">
    <small>El modelo debe contener únicamente dígitos alfanumericos.</small>
            </div>
            <div class="form-group">
                <label>Tipo</label>
                <input type="text" class="form-control" name="tipo" value="<?php echo $row["tipo"]; ?>" required pattern="[a-zA-Z0-9\s]+" maxlength="45">
    <small>El tipo debe contener únicamente dígitos alfanumericos.</small>
            </div>
            <div class="form-group">
                <label>Año</label>
                <input type="text" class="form-control" name="anio" value="<?php echo $row["anio"]; ?>" required pattern="[0-9]{4}">
    <small>El año debe contener únicamente dígitos numéricos.</small>
            </div>
            <div class="form-group">
                <label>Clasificacion</label>
                <input type="text" class="form-control" name="clasificacion" value="<?php echo $row["clasificacion"]; ?>" required pattern="[a-zA-Z0-9\s]+" maxlength="45">
    <small>La clasificacion debe contener únicamente dígitos alfanumericos.</small>
            </div>
            <div class="form-group">
                <label>ID vehiculo</label>
                <input type="text" class="form-control" name="id_vehiculo" value="<?php echo $row["id_vehiculo"]; ?>" required pattern="[0-9]{1,8}">
    <small>El ID del vehiculo debe contener únicamente dígitos numéricos.</small>
            </div>
            <div class="form-group">
                <label>Imagen</label>
                <input type="file" class="form-control-file" accept="image/*" name="imagen" value="<?php echo $row["imagen"]; ?>" required>
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
    $id_repuesto = $_POST['id_repuesto'];
    $descripcion = $_POST['descripcion'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $tipo = $_POST['tipo'];
    $anio = $_POST['anio'];
    $clasificacion = $_POST['clasificacion'];
    $id_vehiculo = $_POST['id_vehiculo'];
    $imagen = $_POST['imagen'];

    $repuestocontroller->actualizarRepuesto($id_repuesto, $descripcion, $marca, $modelo, $tipo, $anio, $clasificacion, $id_vehiculo, $imagen);
    header('Location: home_repuestos.php');
}


?>
