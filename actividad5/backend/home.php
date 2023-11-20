<?php
// Archivos de configuracion y conexion a la base de datos
require_once 'config.php';
require_once 'db_connect.php';

// Archivos de controladores y modelos necesarios
require_once 'controladores/vehiculocontroller.php';
require_once 'controladores/repuestocontroller.php';
require_once 'controladores/usuariocontroller.php';
require_once 'controladores/mecanicocontroller.php';


// definicion de las rutas y manejar las solicitudes
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Manejo de las solicitudes GET para mostrar informacion o formularios
   
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'vehiculos') {
            // Mostrar la lista de vehiculos
            $vehiculocontroller = new vehiculocontroller();
            $vehiculocontroller->index();
        } elseif ($_GET['action'] === 'repuestos') {
            // Mostrar la lista de repuestos
            $repuestocontroller = new repuestocontroller();
            $repuestocontroller->index();
        } elseif ($_GET['action'] === 'usuarios') {
            // Mostrar la lista de usuarios
            $usuariocontroller = new usuariocontroller();
            $usuariocontroller->index();
        } elseif ($_GET['action'] === 'mecanicos') {
            // Mostrar la lista de mecanicos
            $mecanicocontroller = new mecanicocontroller();
            $mecanicocontroller->index();
        } else {
            // Mostrar 
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Manejo de las solicitudes POST para procesar formularios o realizar acciones
    
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'crear_vehiculo') {
            // Crear un nuevo vehiculo
            $vehiculocontroller = new vehiculocontroller();
            $vehiculocontroller->create($_POST);
        } elseif ($_POST['action'] === 'crear_repuesto') {
            // Crear un nuevo repuesto
            $repuestocontroller = new repuestocontroller();
            $repuestocontroller->create($_POST);
        } elseif ($_POST['action'] === 'crear_cliente') {
            // Crear un nuevo cliente
            $usuariocontroller = new usuariocontroller();
            $usuariocontroller->create($_POST);
        } elseif ($_POST['action'] === 'crear_mecanico') {
            // Crear un nuevo mecanico
            $mecanicocontroller = new mecanicocontroller();
            $mecanicocontroller->create($_POST);
        } else {
            // Mostrar
        }
    }
}

// Se establece configuariciones basicas del html
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iCar Plus</title>
    <!-- Archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <!-- Estilos para algunos elementos del home -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .container {
            margin-top: 20px;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .table {
            margin-top: 20px;
        }
        
        .center {
            text-align: center;
        }
        
        /* Estilos personalizados */
        .navbar {
            background-color: #007bff;
        }
        
        .navbar-brand {
            color: #fff;
            font-weight: bold;
        }
        
        .navbar-nav .nav-link {
            color: #fff;
        }
        
        h2.center {
            color: #007bff;
        }
        
        table.table {
            background-color: #fff;
        }
        
        table.table th {
            background-color: #007bff;
            color: #fff;
        }
        
        table.table td {
            background-color: #f8f9fa;
        }
    </style>
</head>
<!-- Barra de navegacion -->
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="logo">
            <img src="../frontend/src/assets/logo.png" alt="Logo de la empresa">
            <a class="navbar-brand" href="#">iCar Plus</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="home_vehiculos.php">Vehículos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="home_repuestos.php">Repuestos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="home_clientes.php">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="home_mecanicos.php">Mecánicos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="home_usuarios.php">Administradores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reportes/home_reportes.php">Reportes</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Mensaje de bienvenido y se muestra los datos de la tabla vehiculos -->
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2 class="center">Bienvenido usuario/a al software de Gestión de Inventario</h2>
                <h3>Vehículos Registrados</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>id_vehiculo</th>
                            <th>descripcion</th>
                            <th>marca</th>
                            <th>modelo</th>
                            <th>color</th>
                            <th>tipo</th>
                            <th>Año</th>
                            <th>clasificacion</th>
                            <th>id_repuesto</th>
                            <th>Imagen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Conectarse a la base de datos
                        $conn = mysqli_connect("localhost", "root", "", "inventario");

                        // Consulta SQL para obtener los datos de los vehiculos
                        $sql = "SELECT id_vehiculo, descripcion, marca, modelo, color, tipo, anio, clasificacion, id_repuesto, imagen FROM vehiculos";

                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($result)) {
                        ?>

                            <tr>
                                <td><?php echo $row["id_vehiculo"]; ?></td>
                                <td><?php echo $row["descripcion"]; ?></td>
                                <td><?php echo $row["marca"]; ?></td>
                                <td><?php echo $row["modelo"]; ?></td>
                                <td><?php echo $row["color"]; ?></td>
                                <td><?php echo $row["tipo"]; ?></td>
                                <td><?php echo $row["anio"]; ?></td>
                                <td><?php echo $row["clasificacion"]; ?></td>
                                <td><?php echo $row["id_repuesto"]; ?></td>
                                <td><?php echo $row["imagen"]; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Archivos JS de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
