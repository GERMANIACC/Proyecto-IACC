<?php

include ("conexion.php");

if (!isset($_post['cliente']) && !empty($_post['cliente']) &&
    !isset($_post['apellido']) && !empty($_post['apellido']) &&
    !isset($_post['email']) && !empty($_post['email'])) {

        $conexion=mysqli_connect($host,$usuario,$clave,$bd);
        $result = mysqli_query($conexion,("INSERT INTO clientes (cliente,apellido,email) VALUES ('$_post[cliente]','$_post[apellido]','$_post[email]') "));
        
        echo "INGRESO CORRECTO CLIENTE";
}

?>
