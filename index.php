<!DOCTYPE html>
<html>
<head>
    <title>Usuario</title>
    <script src="https://kit.fontawesome.com/34aaf69648.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/34aaf69648.js" crossorigin="anonymous"></script>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
            <header>
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Formulario</h1>
                    <a href="index.php" class="btn btn-primary"><i class="fas fa-home"></i></a>
                </div>
            </header>
		   <?php 
            if(isset($_POST["boton"])){
                require_once("sen.php");
                $obj = new usua();
                $obj->insertar();
                header("Location:index.php?a=s");
            }
            if(isset($_GET["a"])){
                echo "<marquee BEHAVIOR=slide SCROLLAMOUNT=15 align: middle>Datos Ingresados</marquee>";
            }
            if(isset($_GET["idE"])){
                require_once("sen.php");
                $obj = new usua();
                $obj->eliminar();
                echo "<marquee BEHAVIOR=slide SCROLLAMOUNT=15 align: middle>Datos Eliminados</marquee>";
            }
         ?>
	   <div class="container-fluid">
        <div class="row">

            <div class="col-lg-6">
                
                <div id="form-container">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido:</label>
                            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" required>
                        </div>
                        <button type="submit" name="boton" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
	    <?php 
        if(isset($_POST["botonM"])){
                require_once("sen.php");
                $obj = new usua();
                $obj->modificar();
            }
        if(isset($_GET["idM"])){
                require_once("sen.php");
                $obj = new usua();
                $fila = $obj->buscar();
                ?>
                <form action="" method="post">
                    <h1>Modificar</h1><hr>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $fila['nombre']; ?>">
                    </div>
                    <div class="form-group">
    				    <label for="nombre">Apellido:</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $fila['apellido']; ?>">
                    </div>
			    	<button type="submit" name="botonM" class="btn btn-primary">Guardar</button>
                <?php
            }
     ?>
      </div>
    <div class="col-lg-6">
        <h1>Usuarios</h1>
                <div class="seg">   
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th></th>
                            <?php 
                                require_once("sen.php");
                                $obj = new usua();
                                $res = $obj->consultar();
                                while($fila = $res->fetch_assoc()){
                                    $id = $fila["id"];
                                    echo "<tr>";
                                    echo "<td>".$fila["id"]."</td>";
                                    echo "<td>".$fila["nombre"]."</td>";
                                    echo "<td>".$fila["apellido"]."</td>";
                                    echo "<td><a href='index.php?idE=$id' >
                                        <i class='fa-solid fa-trash' style='color: red;' 'align:center'></i></a>";
                                    echo "</tr>";
                                }
                             ?>
                    </tr>
                </thead>
            <tbody>
        </tbody>
    </table>        
    </div>
    </center>
</body>
</html>