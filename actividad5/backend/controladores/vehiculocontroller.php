<?php
// Archivos de modelos y configuracion necesarios
require_once 'config.php';
require_once 'db_connect.php';
require_once 'modelos/vehiculo.php';

class vehiculocontroller {
    // Metodo para crear un nuevo vehículo
    public function crearVehiculo($id_vehiculo, $descripcion, $marca, $modelo, $color, $tipo, $anio, $clasificacion, $id_repuesto, $imagen) {
        // Crear una instancia del modelo vehiculo
        $vehiculo = new Vehiculo();

        // Asignar los valores de los parametros al modelo
        $vehiculo->id_vehiculo = $id_vehiculo;
        $vehiculo->descripcion = $descripcion;
        $vehiculo->marca = $marca;
        $vehiculo->modelo = $modelo;
        $vehiculo->color = $color;
        $vehiculo->tipo = $tipo;
        $vehiculo->anio = $anio;
        $vehiculo->clasificacion = $clasificacion;
        $vehiculo->id_repuesto = $id_repuesto;
        $vehiculo->imagen = $imagen;

        // Guardar el vehiculo en la base de datos
        $vehiculo->guardar();

        return true;
    }

    // Metodo para obtener todos los vehiculos
    public function obtenerVehiculos($id_vehiculo) {
        // Crear una instancia del modelo Vehiculo
        $vehiculo = new Vehiculo();

        // Obtener todos los vehiculos
        $vehiculo = $vehiculo->obtenerPorId($id_vehiculo);

        return true;
    }

    // Metodo para actualizar un vehiculo existente
    public function actualizarVehiculo($id_vehiculo, $descripcion, $marca, $modelo, $color, $tipo, $anio, $clasificacion, $id_repuesto, $imagen) {
        // Crear una instancia del modelo Vehiculo
        $vehiculo = new Vehiculo();

        // Obtener el vehiculo por su ID
        $vehiculo->obtenerPorId($id_vehiculo);

        // Actualizar los valores del vehiculo
        $vehiculo->id_vehiculo = $id_vehiculo;
        $vehiculo->descripcion = $descripcion;
        $vehiculo->marca = $marca;
        $vehiculo->modelo = $modelo;
        $vehiculo->color = $color;
        $vehiculo->tipo = $tipo;
        $vehiculo->anio = $anio;
        $vehiculo->clasificacion = $clasificacion;
        $vehiculo->id_repuesto = $id_repuesto;
        $vehiculo->imagen = $imagen;

        // Guardar los cambios en la base de datos
        $vehiculo->actualizarVehiculo($id_vehiculo, $descripcion, $marca, $modelo, $color, $tipo, $anio, $clasificacion, $id_repuesto, $imagen);

        return true;
    }

    // Metodo para eliminar un vehiculo por su ID
    public function eliminarVehiculo($id_vehiculo) {
        // Crear una instancia del modelo Vehiculo
        $vehiculo = new Vehiculo();

        // Obtener el vehículo por su ID
        $vehiculo->obtenerPorId($id_vehiculo);

        // Eliminar el vehiculo de la base de datos
        $vehiculo->eliminar($id_vehiculo);

        return true;
    }
}

?>