<?php
// Archivos de modelos y configuracion necesarios
require_once 'config.php';
require_once 'db_connect.php';
require_once 'modelos/usuario.php';

class usuariocontroller {
    // Metodo para crear un nuevo usuario
    public function crearUsuario($idusuario, $contrasena, $nombre, $direccion, $telefono, $correo_electronico) {
        // Crear una instancia del modelo Usuario
        $usuario = new Usuario();

        // Asignar los valores de los parametros al modelo
        
        $usuario->idusuario = $idusuario;
        $usuario->constrasena = $contrasena;
        $usuario->nombre = $nombre;
        $usuario->direccion = $direccion;
        $usuario->telefono = $telefono;
        $usuario->correo_electronico = $correo_electronico;

        // Guardar el usuario en la base de datos
        $usuario->guardar();

        return true;
    }

    // Metodo para obtener un usuario por su ID
    public function obtenerUsuarios($idusuario) {
        // Crear una instancia del modelo Usuario
        $usuario = new Usuario();

        // Obtener el usuario por su ID
        $usuario = $usuario->obtenerPorId($idusuario);

        return $usuario;
    }

    // Metodo para actualizar un usuario existente
    public function actualizarUsuario($idusuario, $contrasena, $nombre, $direccion, $telefono, $correo_electronico) {
        // Crear una instancia del modelo Usuario
        $usuario = new Usuario();

        // Obtener el usuario por su ID
        $usuario->obtenerPorId($idusuario);

        // Actualizar los valores del usuario
        $usuario->idusuario = $idusuario;
        $usuario->contrasena = $contrasena;
        $usuario->nombre = $nombre;
        $usuario->direccion = $direccion;
        $usuario->telefono = $telefono;
        $usuario->correo_electronico = $correo_electronico;

        // Guardar los cambios en la base de datos
        $usuario->actualizarUsuario($idusuario, $contrasena, $nombre, $direccion, $telefono, $correo_electronico);

        return true;
    }

    // Metodo para eliminar un usuario por su ID
    public function eliminarUsuario($idusuario) {
        // Crear una instancia del modelo Usuario
        $usuario = new Usuario();

        // Obtener el usuario por su ID
        $usuario->obtenerPorId($idusuario);

        // Eliminar el usuario de la base de datos
        $usuario->eliminar($idusuario);

        return true;
    }

    public function verificarCredenciales($idusuario, $contrasena) {
        // Conexion a la base de datos
        $dsn = 'mysql:host=localhost;dbname=inventario';
        $username = 'root';
        $password = '';
    
        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Mensaje de error
            echo 'Error en la conexion: ' . $e->getMessage();
            exit;
        }
    
        // Sentencia SQL
        $sql = "SELECT COUNT(*) FROM usuarios WHERE idusuario = :idusuario AND contrasena = :contrasena";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idusuario', $idusuario);
        $stmt->bindParam(':contrasena', $contrasena);
    
        // Ejecucion del query
        $stmt->execute();
    
        // Obtenemos el resultado
        $resultado = $stmt->fetchColumn();
    
        // Cerrar conexion a la base de datos
        $pdo = null;
    
        // Retornamos las credenciales
        return $resultado > 0;
    }
    
    
}



?>
