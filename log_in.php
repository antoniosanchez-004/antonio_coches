<?php
    function inicia_sesion(){
        session_start();
    }

    function cierra_sesion(){
        inicia_sesion();
        session_destroy();
    }

    function log_in($user){
        inicia_sesion();
        $_SESSION['user']=$user;
    }

    function log_out(){
        //unset($_SESSION);
        cierra_sesion();
        
    }

    function esta_logueado($user){
       if ($_SESSION['user']==$user){
        echo "El usuario ".$user." esta logueado";
       }else{
        echo "El usuario ".$user." no esta logueado";
       }
    }
?>