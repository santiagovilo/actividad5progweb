<?php

class Repuesto {
    public $id_repuesto;
    public $descripcion;
    public $marca;
    public $modelo;
    public $tipo;
    public $anio;
    public $clasificacion;
    public $id_vehiculo;
    public $imagen;

    public function guardar() {
        // Conexion a la base de datos
        $conexion = new mysqli("localhost", "root", "", "inventario");

        // Verificar la conexion
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Preparar la consulta SQL
        $sql = "INSERT INTO repuestos (id_repuesto, descripcion, marca, modelo, tipo, anio, clasificacion, id_vehiculo, imagen ) VALUES ('$this->id_repuesto', '$this->descripcion', '$this->marca', '$this->modelo', '$this->tipo', '$this->anio', '$this->clasificacion', '$this->id_vehiculo', '$this->imagen')";

        // Ejecutar la consulta
        if ($conexion->query($sql) === TRUE) {
            echo "Repuesto creado exitosamente";
        } else {
            echo "Error al crear el repuesto: " . $conexion->error;
        }

        // Cerrar la conexion
        $conexion->close();
    
    }

    public function obtenerPorId($id_repuesto) {
        // Conexion a la base de datos
        $conexion = new mysqli("localhost", "root", "", "inventario");
    
        // Verificar la conexion
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
    
        // Preparar la consulta SQL
        $sql = "SELECT * FROM repuestos WHERE id_repuesto = $id_repuesto";
    
        // Ejecutar la consulta
        $resultado = $conexion->query($sql);
    
        // Verificar si se encontraron resultados
        if ($resultado->num_rows > 0) {
            // Obtener los datos del repuesto
            $repuesto = $resultado->fetch_assoc();
    
            // Asignar los valores a las propiedades del objeto
            $this->id_repuesto = $repuesto['id_repuesto'];
            $this->descripcion = $repuesto['descripcion'];
            $this->marca = $repuesto['marca'];
            $this->modelo = $repuesto['modelo'];
            $this->tipo = $repuesto['tipo'];
            $this->anio = $repuesto['anio'];
            $this->clasificacion = $repuesto['clasificacion'];
            $this->id_vehiculo = $repuesto['id_vehiculo'];
            $this->imagen = $repuesto['imagen'];
        }
    
        // Cerrar la conexion
        $conexion->close();
    }

    public function actualizarRepuesto($id_repuesto, $descripcion, $marca, $modelo, $tipo, $anio, $clasificacion, $id_vehiculo, $imagen) {
        // Conexion a la base de datos
        $conexion = new mysqli("localhost", "root", "", "inventario");
    
        $sql = "UPDATE repuestos SET descripcion='$descripcion', marca='$marca', modelo='$modelo', tipo='$tipo', anio='$anio', clasificacion='$clasificacion', id_vehiculo='$id_vehiculo', imagen='$imagen' WHERE id_repuesto=$id_repuesto";
    
        // Ejecutar la consulta
        if ($conexion->query($sql) === TRUE) {
            echo "Repuesto actualizado exitosamente";
        } else {
            echo "Error al actualizar el repuesto: " . $conexion->error;
        }
    
        // Cerrar la conexion
        $conexion->close();
    }

   
    public function eliminarRepuesto($id_repuesto) {
        // Conexion a la base de datos
    
        $conexion = new mysqli("localhost", "root", "", "inventario");
    
        // Verificar la conexion
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
    
        // Preparar la consulta SQL
        $sql = "DELETE FROM repuestos WHERE id_repuesto = $id_repuesto";
    
        // Ejecutar la consulta
        if ($conexion->query($sql) === TRUE) {
            echo "Repuesto eliminado exitosamente";
        } else {
            echo "Error al eliminar repuesto: " . $conexion->error;
        }
    
        // Cerrar la conexion
        $conexion->close();
    }
    
}


?>