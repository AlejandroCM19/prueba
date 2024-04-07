<?php 
require_once("conexion.php");

class usua extends Conexion {
    public function insertar(){
        $nom = $_POST['nombre'];
        $apel = $_POST['apellido'];
        $this->abrirConexion(); // Abre la conexión antes de preparar la consulta
        $stmt = $this->conexion->prepare("INSERT INTO usuarios VALUES (null, ?, ?)");
        $stmt->bind_param("ss", $nom, $apel);
        $stmt->execute();
        $this->cerrarConexion(); // Cierra la conexión después de ejecutar la consulta
    }

    public function consultar(){
        $this->abrirConexion(); // Abre la conexión antes de preparar la consulta
        $this->sentencia = "SELECT * FROM usuarios";
        $result = $this->obtenerSentencia();
        $this->cerrarConexion(); // Cierra la conexión después de obtener los resultados
        return $result;
    }

    public function eliminar(){
        $id = $_GET["idE"];
        $this->abrirConexion(); // Abre la conexión antes de preparar la consulta
        $stmt = $this->conexion->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $this->cerrarConexion(); // Cierra la conexión después de ejecutar la consulta
    }

    public function buscar(){
        $id = $_GET["idM"];
        $this->abrirConexion(); // Abre la conexión antes de preparar la consulta
        $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $this->cerrarConexion(); // Cierra la conexión después de obtener los resultados

        $usuarios = $resultado->fetch_assoc();
        return $usuarios;
    }
}
?>
