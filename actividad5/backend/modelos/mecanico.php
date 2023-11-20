<?php

class Mecanico {
    public $idmecanico;
    public $nombre;
    public $direccionm;
    public $telefono;
    public $correo_electronico;

    public function guardar() {
        // Conexion a la base de datos
        $conexion = new mysqli("localhost", "root", "", "inventario");

        // Verificar la conexion
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Preparar la consulta SQL
        $sql = "INSERT INTO mecanicos (idmecanico, nombre, direccion, telefono, correo_electronico) VALUES ('$this->idmecanico', '$this->nombre', '$this->direccion', '$this->telefono', '$this->correo_electronico')";

        // Ejecutar la consulta
        if ($conexion->query($sql) === TRUE) {
            echo "Mecanico creado exitosamente";
        } else {
            echo "Error al crear el mecanico: " . $conexion->error;
        }

        // Cerrar la conexion
        $conexion->close();
    
    }

    public function obtenerPorId($idmecanico) {
        // Conexion a la base de datos
        $conexion = new mysqli("localhost", "root", "", "inventario");
    
        // Verificar la conexion
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
    
        // Preparar la consulta SQL
        $sql = "SELECT * FROM mecanicos WHERE idmecanico = $idmecanico";
    
        // Ejecutar la consulta
        $resultado = $conexion->query($sql);
    
        // Verificar si se encontraron resultados
        if ($resultado->num_rows > 0) {
            // Obtener los datos del mecanico
            $mecanico = $resultado->fetch_assoc();
    
            // Asignar los valores a las propiedades del objeto
            $this->idmecanico = $mecanico['idmecanico'];
            $this->nombre = $mecanico['nombre'];
            $this->direccion = $mecanico['direccion'];
            $this->telefono = $mecanico['telefono'];
            $this->correo_electronico = $mecanico['correo_electronico'];
        }
    
        // Cerrar la conexion
        $conexion->close();
    }
    
    public function actualizarMecanico($idmecanico, $nombre, $direccion, $telefono, $correo_electronico) {
        // Conexion a la base de datos
        $conexion = new mysqli("localhost", "root", "", "inventario");
    
        $sql = "UPDATE mecanicos SET nombre='$nombre', direccion='$direccion', telefono='$telefono', correo_electronico='$correo_electronico' WHERE idmecanico=$idmecanico";
    
        // Ejecutar la consulta
        if ($conexion->query($sql) === TRUE) {
            echo "Mecánico actualizado exitosamente";
        } else {
            echo "Error al actualizar el mecánico: " . $conexion->error;
        }
    
        // Cerrar la conexion
        $conexion->close();
    }
    
    public function eliminarMecanico($idmecanico) {
        // Conexion a la base de datos
        $conexion = new mysqli("localhost", "root", "", "inventario");
      
        $sql = "DELETE FROM mecanicos WHERE idmecanico = $idmecanico";
      
   // Ejecutar la consulta
        if ($conexion->query($sql) === TRUE) {
            echo "mecanico eliminado exitosamente";
    } else {
    echo "Error al eliminar el mecanico: " . $conexion->error;
    }

    // Cerrar la conexion
    $conexion->close();
    
      }
      
}


?>