<?php
// Archivos de modelos y configuracion necesarios
require_once 'config.php';
require_once 'db_connect.php';
require_once 'modelos/repuesto.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de Repuestos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Estilos para algunos elementos del home de repuestos -->
  <style>
.sidebar {
  background-color: #f8f9fa;
  padding: 20px;
}
.sidebar ul {
  list-style: none;
  padding: 0;
}
.sidebar li {
  margin-bottom: 10px;
}
.sidebar li a {
  color: #333;
  text-decoration: none;
}
</style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="sidebar">
        <h2>Opciones</h2>
        <ul>
          <li><a href="home.php">Volver al inicio</a></li>
          <li><a href="crear_repuesto.php">Agregar Nuevo repuesto</a></li>
          <button type="button" onclick="window.open('reportes/reporte_repuestos.php')" class="btn btn-primary">Generar Reporte</button>
        </ul>
      </div>
    </div>
    <div class="col-md-8">
      <h1>Repuestos Registrados</h1>
      <table class="table">
        <thead>
          <tr>
            <th>id_repuesto</th>
            <th>descripcion</th>
            <th>marca</th>
            <th>modelo</th>
            <th>tipo</th>
            <th>Año</th>
            <th>clasificacion</th>
            <th>id_vehiculo</th>
            <th>Imagen</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Conectarse a la base de datos
          $conn = mysqli_connect("localhost", "root", "", "inventario");

          // Consulta SQL para obtener los datos de los clientes
          $sql = "SELECT id_repuesto, descripcion, marca, modelo, tipo, anio, clasificacion, id_vehiculo, imagen FROM repuestos";

          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_array($result)) {
              // Se muestran los datos obtenidos en una tabla con sus respectivos botones 
          ?>

            <tr>
              <td><?php echo $row["id_repuesto"]; ?></td>
              <td><?php echo $row["descripcion"]; ?></td>
              <td><?php echo $row["marca"]; ?></td>
              <td><?php echo $row["modelo"]; ?></td>
              <td><?php echo $row["tipo"]; ?></td>
              <td><?php echo $row["anio"]; ?></td>
              <td><?php echo $row["clasificacion"]; ?></td>
              <td><?php echo $row["id_vehiculo"]; ?></td>
              <td><img src="../frontend/src/assets/repuestos<?php echo $row["imagen"];?>" onerror=this. src= "../frontend/src/assets/noimage.png" width="50" heigth ="70"></td>
              <td>
                <div class="btn-group">
                <a href="eliminar_repuesto.php?id_repuesto=<?php echo $row["id_repuesto"]; ?>" class="btn btn-danger">Eliminar</a>
                <a href="actualizar_repuesto.php?id_repuesto=<?php echo $row["id_repuesto"]; ?>" class="btn btn-primary ml-2">Actualizar</a>

                </div>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>



  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
