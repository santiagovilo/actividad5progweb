<?php
// Archivos de modelos y configuracion necesarios
require_once 'config.php';
require_once 'db_connect.php';
require_once 'modelos/cliente.php';

class clientecontroller {
    // Método para crear un nuevo cliente
    public function crearCliente($idcliente, $nombre, $direccion, $telefono, $correo_electronico) {
        // Crear una instancia del modelo cliente
        $cliente = new Cliente();

        // Asignar los valores de los parametros al modelo
        $cliente->idcliente = $idcliente;
        $cliente->nombre = $nombre;
        $cliente->direccion = $direccion;
        $cliente->telefono = $telefono;
        $cliente->correo_electronico = $correo_electronico;
        // Guardar el cliente en la base de datos
        $cliente->guardar();

        return true;
    }

    // Método para obtener todos los clientes
    public function obtenerClientes($idcliente) {
        // Crear una instancia del modelo Mecanico
        $cliente = new Cliente();

        // Obtener todos los clientes
        $cliente = $cliente->obtenerPorId($idcliente);

        return $cliente;
    }

    // Método para actualizar un cliente existente

    public function actualizarCliente($idcliente, $nombre, $direccion, $telefono, $correo_electronico) {
        // Crear una instancia del modelo cliente
        $cliente = new Cliente();

        // Obtener el cliente por su ID
        $cliente->obtenerPorId($idcliente);

        // Actualizar los valores del cliente
        $cliente->idcliente = $idcliente;
        $cliente->nombre = $nombre;
        $cliente->direccion = $direccion;
        $cliente->telefono = $telefono;
        $cliente->correo_electronico = $correo_electronico;

        // Guardar los cambios en la base de datos
        $cliente->actualizarCliente($idcliente, $nombre, $direccion, $telefono, $correo_electronico);

        return true;
    }


    // Método para eliminar un cliente por su ID
    public function eliminarCliente($idcliente) {
        // Crear una instancia del modelo Cliente
        $cliente = new Cliente();
    
        // Obtener el cliente por su ID
        $cliente->obtenerPorId($idcliente);

        // Eliminar el cliente de la base de datos
        $cliente->eliminar($idcliente);
        
        return true;
    }
    
}

?>