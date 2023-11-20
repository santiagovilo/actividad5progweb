<?php
// Archivos de controladores y modelos necesarios
require_once 'controladores/repuestocontroller.php';
require_once 'modelos/repuesto.php';

// Logica para crear un nuevo repuesto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $id_repuesto = $_POST['id_repuesto'];
    $descripcion = $_POST['descripcion'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $tipo = $_POST['tipo'];
    $anio = $_POST['anio'];
    $clasificacion = $_POST['clasificacion'];
    $id_vehiculo = $_POST['id_vehiculo'];

    if(isset($_POST['imagen']) && !empty($_POST['imagen'])){
        $imagen = $_POST['imagen']; 
    }else{
        $imagen = '';
    }

    // Crear una instancia del controlador de repuestos
    $repuestocontroller = new repuestocontroller();

    // Llamar a la funcion para crear un nuevo repuesto
    $repuestocontroller->crearRepuesto($id_repuesto, $descripcion, $marca, $modelo, $tipo, $anio, $clasificacion, $id_vehiculo, $imagen);

    // Redireccionar a la pagina de éxito 
    header('Location: home_repuestos.php');
    exit();
}

?>

<!-- Formulario HTML para crear un nuevo repuesto -->
<!DOCTYPE html>
<html>
<head>
    <title>Agregar repuesto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
<h1>Agregar repuesto - Concesionario iCar Plus</h1>
    <form method="POST" action="crear_repuesto.php">
        <div class="form-group">
            <label for="id_repuesto">ID Repuesto:</label>
            <input type="text" name="id_repuesto" id="id_repuesto" class="form-control" required pattern="[0-9]{1,8}">
    <small>El ID debe contener únicamente dígitos numéricos.</small>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" required pattern="[a-zA-Z0-9\s]+" maxlength="200">
    <small>La descripcion debe contener únicamente dígitos alfanumericos.</small>
        </div>

        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" name="marca" id="marca" class="form-control"  required pattern="[a-zA-Z\s]+" maxlength="45">
    <small>La marca debe contener únicamente dígitos alfabeticos.</small>
        </div>

        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" id="modelo" class="form-control" required pattern="[a-zA-Z0-9\s]+" maxlength="45">
    <small>El modelo debe contener únicamente dígitos alfanumericos.</small>
        </div>

        <div class="form-group">
            <label for="tipo">Tipo:</label>
            <input type="text" name="tipo" id="tipo" class="form-control" required pattern="[a-zA-Z0-9\s]+" maxlength="45">
    <small>El tipo debe contener únicamente dígitos alfanumericos.</small>
        </div>

        <div class="form-group">
            <label for="anio">Año:</label>
            <input type="text" name="anio" id="anio" class="form-control" required pattern="[0-9]{4}">
    <small>El año debe contener únicamente dígitos numéricos.</small>
        </div>

        <div class="form-group">
            <label for="clasificacion">Clasificación:</label>
            <input type="text" name="clasificacion" id="clasificacion" class="form-control" required pattern="[a-zA-Z0-9\s]+" maxlength="45">
    <small>La clasificacion debe contener únicamente dígitos alfanumericos.</small>
        </div>

        <div class="form-group">
            <label for="id_vehiculo">ID Vehículo:</label>
            <input type="text" name="id_vehiculo" id="id_vehiculo" class="form-control" required pattern="[0-9]{1,8}">
    <small>El ID del vehiculo debe contener únicamente dígitos numéricos.</small>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen" class="form-control-file" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar repuesto</button>
        <a href="home_repuestos.php" class="btn btn-primary float-right">Volver</a>

    </form>
</div>
</body>
</html>
