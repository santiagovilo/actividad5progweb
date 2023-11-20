<?php
// Archivos de modelos y configuracion necesarios
require_once 'config.php';
require_once 'db_connect.php';
require_once 'modelos/cliente.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de Clientes</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Estilos para algunos elementos del home de clientes -->
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
          <li><a href="crear_cliente.php">Agregar Nuevo Cliente</a></li>
          <button type="button" onclick="window.open('reportes/reporte_clientes.php')" class="btn btn-primary">Generar Reporte</button>
          </ul>
        </div>
      </div>
      <div class="col-md-8">
        <h1>Clientes Registrados</h1>
        <table class="table">
          <thead>
            <tr>
              <th>Cedula</th>
              <th>Nombre</th>
              <th>Direccion</th>
              <th>Telefono</th>
              <th>Correo electronico</th>
            </tr>
          </thead>
          <tbody>

<?php
// Conectarse a la base de datos
$conn = mysqli_connect("localhost", "root", "", "inventario");

// Consulta SQL para obtener los datos de los clientes
$sql = "SELECT idcliente, nombre, direccion, telefono, correo_electronico FROM clientes";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)) {
  // Se muestran los datos obtenidos en una tabla con sus respectivos botones 
?>

        <tr>
          <td><?php echo $row["idcliente"]; ?></td>
          <td><?php echo $row["nombre"]; ?></td>
          <td><?php echo $row["direccion"]; ?></td>
          <td><?php echo $row["telefono"]; ?></td>
          <td><?php echo $row["correo_electronico"]; ?></td>

          <td>
          <div class="btn-group">
         
          <a href="eliminar_cliente.php?idcliente=<?php echo $row["idcliente"]; ?>" class="btn btn-danger">Eliminar</a>
          <a href="actualizar_cliente.php?idcliente=<?php echo $row["idcliente"]; ?>" class="btn btn-primary ml-2">Actualizar</a>
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
