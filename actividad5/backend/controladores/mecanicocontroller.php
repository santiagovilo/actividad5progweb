<?php
// Archivos de modelos y configuracion necesarios
require_once 'config.php';
require_once 'db_connect.php';
require_once 'modelos/mecanico.php';

class mecanicocontroller {
    // Metodo para crear un nuevo mecanico
    public function crearMecanico($idmecanico, $nombre, $direccion, $telefono, $correo_electronico) {
        // Crear una instancia del modelo Mecanico
        $mecanico = new Mecanico();

        // Asignar los valores de los parametros al modelo
        $mecanico->idmecanico = $idmecanico;
     
        $mecanico->nombre = $nombre;
        $mecanico->direccion = $direccion;
        $mecanico->telefono = $telefono;
        $mecanico->correo_electronico = $correo_electronico;
        // Guardar al mecanico en la base de datos
        $mecanico->guardar();

        return true;
    }

    // Método para obtener todos los mecanicos
    public function obtenerMecanicos($idmecanico) {
        // Crear una instancia del modelo mecanico
        $mecanico = new Mecanico();

        // Obtener todos los mecanicos
        $mecanico = $mecanico->obtenerPorId($idmecanico);

        return $mecanico;
    }

    // Metodo para actualizar un mecanico existente
    public function actualizarMecanico($idmecanico, $nombre, $direccion, $telefono, $correo_electronico) {
        // Crear una instancia del modelo mecanico
        $mecanico = new Mecanico();

        // Obtener el mecanico por su ID
        $mecanico->obtenerPorId($idmecanico);

        // Actualizar los valores del mecanico
        $mecanico->idmecanico = $idmecanico;
        $mecanico->nombre = $nombre;
        $mecanico->direccion = $direccion;
        $mecanico->telefono = $telefono;
        $mecanico->correo_electronico = $correo_electronico;

        // Guardar los cambios en la base de datos
        $mecanico->actualizarMecanico($idmecanico, $nombre, $direccion, $telefono, $correo_electronico);

        return true;
    }

    // Método para eliminar un mecanico por su ID
    public function eliminarMecanico($idmecanico) {
        // Crear una instancia del modelo Mecanico
        $mecanico = new Mecanico();

        // Obtener el mecanico por su ID
        $mecanico->obtenerPorId($idmecanico);

        // Eliminar el mecanico de la base de datos
        $mecanico->eliminar($idmecanico);

        return true;
    }
}

?>