<?php

class Cliente {
    public $idcliente;
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
        $sql = "INSERT INTO clientes (idcliente, nombre, direccion, telefono, correo_electronico) VALUES ('$this->idcliente', '$this->nombre', '$this->direccion', '$this->telefono', '$this->correo_electronico')";

        // Ejecutar la consulta
        if ($conexion->query($sql) === TRUE) {
            echo "cliente creado exitosamente";
        } else {
            echo "Error al crear el cliente: " . $conexion->error;
        }

        // Cerrar la conexion
        $conexion->close();
    
    }

    public function obtenerPorId($idcliente) {
        $conexion = new mysqli("localhost", "root", "", "inventario");
    
        // Verificar la conexion
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
    
        // Preparar la consulta SQL
        $sql = "SELECT * FROM clientes WHERE idcliente = $idcliente";
    
        // Ejecutar la consulta
        $resultado = $conexion->query($sql);
    
        // Verificar si se encontraron resultados
        if ($resultado->num_rows > 0) {
            // Obtener los datos del mecánico
            $cliente = $resultado->fetch_assoc();
    
            // Asignar los valores a las propiedades del objeto
            $this->idcliente = $cliente['idcliente'];
            $this->nombre = $cliente['nombre'];
            $this->direccion = $cliente['direccion'];
            $this->telefono = $cliente['telefono'];
            $this->correo_electronico = $cliente['correo_electronico'];
        }
    
        // Cerrar la conexion
        $conexion->close();
    }

    
    public function actualizarCliente($idcliente, $nombre, $direccion, $telefono, $correo_electronico) {
        // Conexion a la base de datos
        $conexion = new mysqli("localhost", "root", "", "inventario");
    
        $sql = "UPDATE clientes SET nombre='$nombre', direccion='$direccion', telefono='$telefono', correo_electronico='$correo_electronico' WHERE idcliente=$idcliente";
    
        // Ejecutar la consulta
        if ($conexion->query($sql) === TRUE) {
            echo "Cliente actualizado exitosamente";
        } else {
            echo "Error al actualizar el cliente: " . $conexion->error;
        }
    
        // Cerrar la conexión
        $conexion->close();
    }

    public function eliminarCliente($idcliente) {
        // Conexion a la base de datos
    
        $conexion = new mysqli("localhost", "root", "", "inventario");
    
        // Verificar la conexion
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
    
        // Preparar la consulta SQL
        $sql = "DELETE FROM clientes WHERE idcliente = $idcliente";
    
        // Ejecutar la consulta
        if ($conexion->query($sql) === TRUE) {
            echo "Cliente eliminado exitosamente";
        } else {
            echo "Error al eliminar cliente: " . $conexion->error;
        }
    
        // Cerrar la conexion
        $conexion->close();
    }
    

   
}


?>