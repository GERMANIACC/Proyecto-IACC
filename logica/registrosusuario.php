<?php

    include"..conexion.php";
    if(!empty($_POST))
    {
        $alert='';
        if(empt($_POST['usuario'] || empty($_POST['clave']))
        {
            $alert='<p class="msg_error">Todos los campos son obligatorios.</p>'
        }else{
           
            $usuario= $_POST['usuario'];
            $clave  = $_POST['clave'];
            

            $query  = mysqli_query($conection,"SELECT * FROM roles WHERE usuario = '$usuario' OR clave = '$clave' ");
            $result = mysqli_fetch_array($query);

            if($result > 0){
                $alert='<p class="msg_error">El coreo o el usuario ya existe.</p>'
            }else{
                
                $query_insert = mysqli_query($conection,"INSERT INTO usuario(usuario,clave)
                                                         VALUES('$usuario','$clave')");
                if(query_insert){
                    $alert = '<p class="msg_save">Usuario creado correctamente.</p>'
                }else{
                    $alert='<p class="msg_error">Error al crear el usuario.</p>';
                }
            
            }

        
        }

    }
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>REGISTRO DE USUARIO</title>
      <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include "includes/header.php"; ?>
    <section id="container">

    <div class="form_register">
        ><h1>REGISTRO DE USUARIO</h1>
        <hr>
        <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

        <form action="" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre completo">
            <label for="correo">Correo electronico</label>
            <input type="email" name="correo" id="correo" placeholder="Correo electrónico">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" placeholder="Usuario">
            <label for="clave">Correo electronico</label>
            <input type="password" name="clave" id="clave" placeholder="Clave de acceso">
            <label for="rol">Tipo de usuario</label>

            <?php

                $query_rol = mysqli_query($conection,"SELECT * FROM rol");
                $result_rol = mysqli_num_rows($query_rol);

             ?>

            <select name="rol" id="rol">
                <?php
                    if($result_rol > 0)
                    {
                        while ($rol = mysqli_fetch_array($query_rol)) {
                ?>
                    <option value="<?php echo $rol["idrol"]; ?>"><?php echo $rol["rol"] ?></option>
                <?php

                        }
                    }
                ?>
            </select>
            <input type="submit" value="Crear usuario" class="btn_save">
        </form>
</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
</body>
</html>
