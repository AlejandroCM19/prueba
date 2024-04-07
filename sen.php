<?php 
	require_once("conexion.php");
	class usua extends Conexion{
		public function insertar(){
        $nom= $_POST['nombre']; 
        $apel= $_POST['apellido'];
			$this->sentencia="INSERT INTO usuarios VALUES (null, '$nom','$apel')";
			echo $this->sentencia;
			$this->ejecutarSentencia();
		}
		public function consultar(){
			$this->sentencia = "SELECT * FROM usuarios";
			return $this->obtenerSentencia();
		}
		public function eliminar(){
			$id = $_GET["idE"];
			$this->sentencia = "DELETE FROM usuarios WHERE id = $id";
			$this->ejecutarSentencia();
		}
		public function buscar(){
			$id = $_GET["idM"];
			$this->sentencia = "SELECT * FROM usuarios WHERE id=$id";
			$resultado = $this->obtenerSentencia();
			$usuarios = $resultado->fetch_assoc();
			return $usuarios;
		}
		public function modificar(){
	        $nom= $_POST['nombre']; 
        	$apel= $_POST['apellido'];
	        $this->sentencia = "UPDATE usuarios SET nombre = '$nom', apellido = '$apel' WHERE id=".$_GET['idM'];
			$this->ejecutarSentencia();
		}
	}
 ?>