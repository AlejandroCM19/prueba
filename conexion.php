<?php
class Conexion {
    // Variables para la conexión
    public $ip = ""; // La IP pública obtenida se almacenará aquí
    public $usuario = "alex";
    public $contraseña = "123";
    public $base_de_datos = "seguridad";
    public $conexion = null; // Inicializamos la conexión como nula
    public $sentencia = "";

    // Constructor para abrir la conexión automáticamente al instanciar
    public function __construct() {
        // Obtener la IP pública
        $this->obtenerIPPublica();
        // Abrir la conexión
        $this->abrirConexion();
    }

    // Método para abrir la conexión
    protected function abrirConexion(){
        // Utiliza la variable de la dirección IP pública
        $this->conexion = new mysqli($this->ip, $this->usuario, $this->contraseña, $this->base_de_datos);

        // Verifica si hay errores de conexión
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    // Método para obtener la dirección IP pública
    protected function obtenerIPPublica() {
        // Crea un socket
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

        if ($socket === false) {
            // Manejo de error si la creación del socket falla
            echo "Error al crear el socket: " . socket_strerror(socket_last_error());
        } else {
            // Conecta el socket al servicio DNS de Google en el puerto 23
            $result = socket_connect($socket, 'dns.google', 23);

            if ($result === false) {
                // Manejo de error si la conexión falla
                echo "Error al conectar el socket: " . socket_strerror(socket_last_error($socket));
            } else {
                // Obtiene la dirección IP del socket
                socket_getsockname($socket, $this->ip);
            }

            // Cierra el socket
            socket_close($socket);
        }
    }

    // Destructor para cerrar la conexión automáticamente al destruir la instancia
    public function __destruct() {
        $this->cerrarConexion();
    }

    // Método para cerrar la conexión
    protected function cerrarConexion(){
        if ($this->conexion !== null) {
            $this->conexion->close();
            $this->conexion = null; // Marca la conexión como cerrada
        }
    }

    // Ejecutar una sentencia
    public function ejecutarSentencia(){
        return $this->conexion->query($this->sentencia);
    }

    // Obtener resultados de una sentencia
    public function obtenerSentencia(){
        return $this->conexion->query($this->sentencia);
    }
}
?>
