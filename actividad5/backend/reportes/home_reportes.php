<!DOCTYPE html>
<html>
<head>
<title>Home - Reportes</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-light bg-light">
  <span class="navbar-brand mb-0 h1">Reportes - Concesionaria Icar Plus</span>
<a href="../home.php" class="btn btn-primary float-right">
  Volver al Home
</a>
</nav>

<div class="container">

  <div class="row">

    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Reporte Clientes</h5>
          <p class="card-text">Clientes registrados</p>
          <button type="button" onclick="window.open('reporte_clientes.php')" class="btn btn-primary">Generar Reporte</button>
        </div>
      </div>
    </div>

    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Reporte Mecanicos</h5> 
          <p class="card-text">Mecanicos registrados</p>
          <button type="button" onclick="window.open('reporte_mecanicos.php')" class="btn btn-primary">Generar Reporte</button>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Reporte Repuestos</h5> 
          <p class="card-text">Respuestos registrados</p>
          <button type="button" onclick="window.open('reporte_repuestos.php')" class="btn btn-primary">Generar Reporte</button>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Reporte Vehiculos</h5> 
          <p class="card-text">Vehiculos registrados</p>
          <button type="button" onclick="window.open('reporte_vehiculos.php')" class="btn btn-primary">Generar Reporte</button>
        </div>
      </div>
    </div>
    

  </div>

</div>

</body>
</html>
