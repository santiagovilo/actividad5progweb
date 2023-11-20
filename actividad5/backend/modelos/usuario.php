<?php

class Usuario {
    public $idusuario;
    public $contrasena;
    public $nombre;
    public $direccion;
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
        $sql = "INSERT INTO usuarios (idusuario, contrasena, nombre, direccion, telefono, correo_electronico) VALUES ('$this->idusuario', '$this->contrasena', '$this->nombre', '$this->direccion', '$this->telefono', '$this->correo_electronico')";

        // Ejecutar la consulta
        if ($conexion->query($sql) === TRUE) {
            echo "Usuario creado exitosamente";
        } else {
            echo "Error al crear el usuario: " . $conexion->error;
        }

        // Cerrar la conexion
        $conexion->close();
    }

    public function obtenerPorId($idusuario) {
        $conexion = new mysqli("localhost", "root", "", "inventario");
    
        // Verificar la conexion
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
    
        // Preparar la consulta SQL
        $sql = "SELECT * FROM usuarios WHERE idusuario = $idusuario";
    
        // Ejecutar la consulta
        $resultado = $conexion->query($sql);
    
        // Verificar si se encontraron resultados
        if ($resultado->num_rows > 0) {
            // Obtener los datos del mecánico
            $usuario = $resultado->fetch_assoc();
    
            // Asignar los valores a las propiedades del objeto
            $this->idusuario = $usuario['idusuario'];
            $this->contrasena = $usuario['contrasena'];
            $this->nombre = $usuario['nombre'];
            $this->direccion = $usuario['direccion'];
            $this->telefono = $usuario['telefono'];
            $this->correo_electronico = $usuario['correo_electronico'];
        }
    
        // Cerrar la conexion
        $conexion->close();
        
    }

    public function actualizarUsuario($idusuario, $contrasena, $nombre, $direccion, $telefono, $correo_electronico) {
        // Conexion a la base de datos
        $conexion = new mysqli("localhost", "root", "", "inventario");
    
        $sql = "UPDATE usuarios SET contrasena='$contrasena', nombre='$nombre', direccion='$direccion', telefono='$telefono', correo_electronico='$correo_electronico' WHERE idusuario=$idusuario";
    
        // Ejecutar la consulta
        if ($conexion->query($sql) === TRUE) {
            echo "Usuario actualizado exitosamente";
        } else {
            echo "Error al actualizar el usuario: " . $conexion->error;
        }
    
        // Cerrar la conexión
        $conexion->close();
    }

    
    // Metodo para verificaar las credenciales del usuario
    public function verificarCredenciales($usuario, $contrasena) {
       
        // Retorna true si las credenciales son correctas, o false si no lo son
        return false;
    }
}


?>