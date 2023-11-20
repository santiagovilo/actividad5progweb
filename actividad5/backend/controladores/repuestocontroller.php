<?php
// Archivos de modelos y configuracion necesarios
require_once 'config.php';
require_once 'db_connect.php';
require_once 'modelos/repuesto.php';

class repuestocontroller {
    // Metodo para crear un nuevo repuesto
    public function crearRepuesto($id_repuesto, $descripcion, $marca, $modelo, $tipo, $anio, $clasificacion, $id_vehiculo, $imagen) {
        // Crear una instancia del modelo Repuesto
        $repuesto = new Repuesto();

        // Asignar los valores de los parametros al modelo
        $repuesto->id_repuesto = $id_repuesto;
        $repuesto->descripcion = $descripcion;
        $repuesto->marca = $marca;
        $repuesto->modelo = $modelo;
        $repuesto->tipo = $tipo;
        $repuesto->anio = $anio;
        $repuesto->clasificacion = $clasificacion;
        $repuesto->id_vehiculo = $id_vehiculo;
        $repuesto->imagen = $imagen;

        // Guardar el repuesto en la base de datos
        $repuesto->guardar();

        return true;
    }

    // Metodo para obtener todos los repuestos
    public function obtenerRepuestos($id_repuesto) {
        // Crear una instancia del modelo Repuesto
        $repuesto = new Repuesto();

        // Obtener el repuesto
        $repuesto = $repuesto->obtenerPorId($id_repuesto);

        return $repuesto;
    }

    // Metodo para actualizar un repuesto existente
    public function actualizarRepuesto($id_repuesto, $descripcion, $marca, $modelo, $tipo, $anio, $clasificacion, $id_vehiculo, $imagen) {
        // Crear una instancia del modelo Repuesto
        $repuesto = new Repuesto();

        // Obtener el repuesto por su ID
        $repuesto->obtenerPorId($id_repuesto);

        // Actualizar los valores del repuesto
        $repuesto->id_repuesto = $id_repuesto;
        $repuesto->descripcion = $descripcion;
        $repuesto->marca = $marca;
        $repuesto->modelo = $modelo;
        $repuesto->tipo = $tipo;
        $repuesto->anio = $anio;
        $repuesto->clasificacion = $clasificacion;
        $repuesto->id_vehiculo = $id_vehiculo;
        $repuesto->imagen = $imagen;

        // Guardar los cambios en la base de datos
        $repuesto->actualizarRepuesto($id_repuesto, $descripcion, $marca, $modelo, $tipo, $anio, $clasificacion, $id_vehiculo, $imagen);

        return true;
    }

    // Metodo paraa eliminar un repuesto por su ID
    public function eliminarRepuesto($id_repuesto) {
        // Crear una instancia del modelo Repuesto
        $repuesto = new Repuesto();

        // Obtener el repuesto por su ID
        $repuesto->obtenerPorId($id_repuesto);

        // Eliminar el repuesto de la base de datos
        $repuesto->eliminar($id_repuesto);

        return true;
    }
}
?>