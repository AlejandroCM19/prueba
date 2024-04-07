<?php 
require_once "conexion.php";

class usua extends Conexion {
    public function insertar(){
        $nom = $_POST['nombre'];
        $apel = $_POST['apellido'];
        $this->abrirConexion();
        $stmt = $this->conexion->prepare("INSERT INTO usuarios VALUES (null, ?, ?)");
        $stmt->bind_param("ss", $nom, $apel);
        $stmt->execute();
        $this->cerrarConexion();
    }

    public function consultar(){
        $this->abrirConexion();
        $this->sentencia = "SELECT * FROM usuarios";
        $result = $this->obtenerSentencia();
        $this->cerrarConexion();
        return $result;
    }

    public function eliminar(){
        $id = $_GET["idE"];
        $this->abrirConexion();
        $stmt = $this->conexion->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $this->cerrarConexion();
    }

    public function buscar(){
        $id = $_GET["idM"];
        $this->abrirConexion();
        $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $this->cerrarConexion();
        $usuarios = $resultado->fetch_assoc();
        return $usuarios;
    }
}
?>
