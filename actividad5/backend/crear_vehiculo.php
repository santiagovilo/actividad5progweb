<?php
// Archivos de controladores y modelos necesarios
require_once 'controladores/vehiculocontroller.php';
require_once 'modelos/vehiculo.php';

// Logica para crear un nuevo vehiculo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $id_vehiculo = $_POST['id_vehiculo'];
    $descripcion = $_POST['descripcion'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];
    $tipo = $_POST['tipo'];
    $anio = $_POST['anio'];
    $clasificacion = $_POST['clasificacion'];
    $id_repuesto = $_POST['id_repuesto'];
    $imagen = $_POST['imagen'];

    // Crear una instancia del controlador de vehiculos
    $vehiculocontroller = new vehiculocontroller();

    // Llamar a la funcion para crear un nuevo vehiculo
    $vehiculocontroller->crearVehiculo($id_vehiculo, $descripcion, $marca, $modelo, $color, $tipo, $anio, $clasificacion, $id_repuesto,  $imagen);

    // Redireccionar a la pagina de exito 
    header('Location: home_vehiculos.php');
    exit();
}

?>

<!-- Formulario HTML para crear un nuevo vehiculo -->
<!DOCTYPE html>
<html>
<head>
    <title>Agregar vehículo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
<h1>Agregar vehículo - Concesionario iCar Plus</h1>
    <form method="POST" action="crear_vehiculo.php">

<div class="form-group">
    <label for="id_vehiculo">ID Vehículo:</label>
    <input type="text" name="id_vehiculo" id="id_vehiculo" class="form-control" required pattern="[0-9]{1,8}">
    <small>El ID debe contener únicamente dígitos numéricos.</small>
</div>

<div class="form-group">
    <label for="descripcion">Descripción:</label>
    <input type="text" name="descripcion" id="descripcion" class="form-control" required pattern="[a-zA-Z0-9\s]+" maxlength="200">
    <small>La descripcion debe contener únicamente dígitos alfanumericos.</small>
</div>

<div class="form-group">
    <label for="marca">Marca:</label>
    <input type="text" name="marca" id="marca" class="form-control" required pattern="[a-zA-Z\s]+" maxlength="45">
    <small>La marca debe contener únicamente dígitos alfabeticos.</small>
</div>

<div class="form-group">
    <label for="modelo">Modelo:</label>
    <input type="text" name="modelo" id="modelo" class="form-control" required pattern="[a-zA-Z0-9\s]+" maxlength="45">
    <small>El modelo debe contener únicamente dígitos alfanumericos.</small>
</div>

<div class="form-group">
    <label for="color">Color:</label>
    <input type="text" name="color" id="color" class="form-control" required pattern="[a-zA-Z\s]+" maxlength="45">
    <small>El color debe contener únicamente dígitos alfabeticos.</small>
</div>

<div class="form-group">
    <label for="tipo">Tipo:</label>
    <select name="tipo" id="tipo" class="form-control" required multiple>        
        <option value="Berlina">Berlina</option>
        <option value="Hatchback ">Hatchback</option>
        <option value="SUV">SUV</option>
        <option value="Vehiculos Comerciales ">Vehiculos Comerciales </option>
        <option value="Van">Van</option>
        <option value="Pick Up">Pick Up</option>
        <option value="Camiones">Camiones</option>
    </select>
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
    <label for="id_repuesto">ID Repuesto:</label>
    <input type="text" name="id_repuesto" id="id_repuesto" class="form-control" required pattern="[0-9]{1,8}">
    <small>El ID del repuesto debe contener únicamente dígitos numéricos.</small>
</div>

<div class="form-group">
    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen" id="imagen" class="form-control-file" accept="image/*" required>
</div>

        <button type="submit" class="btn btn-primary">Agregar vehículo</button>
        <a href="home_vehiculos.php" class="btn btn-primary float-right">Volver</a>

    </form>
</div>
</body>
</html>
