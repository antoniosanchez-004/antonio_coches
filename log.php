<?php
    $nombre_usuario = $_POST["usuario"];
    $contraseña= $_POST["contraseña"];

    include 'log_in.php';

    if ($nombre_usuario=='Antonio'){
        if ($contraseña==("a")){
            log_in($nombre_usuario);
            //echo esta_logueado($nombre_usuario);
            header ('Location:marcas.html');
        }else{
            echo "La contraseña no es valida";
        }
    }else{
        echo "El usuario ".$nombre_usuario." no esta logueado";
    }
?>