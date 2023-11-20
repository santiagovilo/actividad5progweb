<?php

class Vehiculo {
    public $id_vehiculo;
    public $descripcion;
    public $marca;
    public $modelo;
    public $color;
    public $tipo;
    public $anio;
    public $clasificacion;
    public $id_repuesto;
    public $imagen;

    public function guardar() {
        // Conexion a la base de datos
        $conexion = new mysqli("localhost", "root", "", "inventario");

        // Verificar la conexion
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Preparar la consulta SQL
        $sql = "INSERT INTO vehiculos (id_vehiculo, descripcion, marca, modelo, color, tipo, anio, clasificacion, id_repuesto, imagen ) VALUES ('$this->id_vehiculo', '$this->descripcion', '$this->marca', '$this->modelo', '$this->color', '$this->tipo', '$this->anio', '$this->clasificacion', '$this->id_repuesto', '$this->imagen')";

        // Ejecutar la consulta
        if ($conexion->query($sql) === TRUE) {
            echo "Vehiculo creado exitosamente";
        } else {
            echo "Error al crear el vehiculo: " . $conexion->error;
        }

        // Cerrar la conexion
        $conexion->close();
    }

    public function obtenerPorId($id_vehiculo) {
        // Conexion a la base de datos
        $conexion = new mysqli("localhost", "root", "", "inventario");
    
        // Verificar la conexion
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
    
        // Preparar la consulta SQL
        $sql = "SELECT * FROM vehiculos WHERE id_vehiculo = $id_vehiculo";
    
        // Ejecutar la consulta
        $resultado = $conexion->query($sql);
    
        // Verificar si se encontraron resultados
        if ($resultado->num_rows > 0) {
            // Obtener los datos del repuesto
            $vehiculo = $resultado->fetch_assoc();
    
            // Asignar los valores a las propiedades del objeto
            $this->id_vehiculo = $vehiculo['id_vehiculo'];
            $this->descripcion = $vehiculo['descripcion'];
            $this->marca = $vehiculo['marca'];
            $this->modelo = $vehiculo['modelo'];
            $this->color = $vehiculo['color'];
            $this->tipo = $vehiculo['tipo'];
            $this->anio = $vehiculo['anio'];
            $this->clasificacion = $vehiculo['clasificacion'];
            $this->id_repuesto = $vehiculo['id_repuesto'];
            $this->imagen = $vehiculo['imagen'];
        }
    
        // Cerrar la conexion
        $conexion->close();
    }

    

    public function obtenerTodos() {
        // Conexion a la base de datos
        $conexion = new mysqli("localhost", "root", "", "inventario");
    
        // Verificar la conexion
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
    
        // Preparar la consulta SQL
        $sql = "SELECT * FROM vehiculos";
    
        // Ejecutar la consulta
        if ($conexion->query($sql) === TRUE) {
            echo "";
        } else {
            echo "" . $conexion->error;
        }
    
        // Cerrar la conexion
        $conexion->close();
    
    }

    public function actualizarVehiculo($id_vehiculo, $descripcion, $marca, $modelo, $color, $tipo, $anio, $clasificacion, $id_repuesto, $imagen) {
        // Conexion a la base de datos
        $conexion = new mysqli("localhost", "root", "", "inventario");
    
        $sql = "UPDATE vehiculos SET descripcion='$descripcion', marca='$marca', modelo='$modelo', color='$color', tipo='$tipo', anio='$anio', clasificacion='$clasificacion', id_repuesto='$id_repuesto', imagen='$imagen' WHERE id_vehiculo=$id_vehiculo";
    
        // Ejecutar la consulta
        if ($conexion->query($sql) === TRUE) {
            echo "Vehiculo actualizado exitosamente";
        } else {
            echo "Error al actualizar el vehiculo: " . $conexion->error;
        }
    
        // Cerrar la conexion
        $conexion->close();
    }

    public function eliminarVehiculo($id_vehiculo) {
        // Conexion a la base de datos
    
        $conexion = new mysqli("localhost", "root", "", "inventario");
    
        // Verificar la conexion
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
    
        // Preparar la consulta SQL
        $sql = "DELETE FROM vehiculos WHERE id_vehiculo = $id_vehiculo";
    
        // Ejecutar la consultae
        if ($conexion->query($sql) === TRUE) {
            echo "Vehiculo eliminado exitosamente";
        } else {
            echo "Error al eliminar vehiculo: " . $conexion->error;
        }
    
        // Cerrar la conexion
        $conexion->close();
    }
    
}


?>