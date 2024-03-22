<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    include "pantallas.php";
        
    // $servidor 	= '127.0.0.1';
    // $bd 		= 'happiness';
    // $usuario 	= 'root';
    // $clave 		= '';
    // $puerto 	= '3307';
    
    // $object = new _screen($servidor, $bd, $usuario, $clave, $puerto);

    $object = new _screen('127.0.0.1','3030','D:\OMVSA\OMVSA.FDB','SYSDBA','masterkey');

    if(isset($_POST['accion']) && !empty($_POST['accion'])){
        $accion = $_POST['accion'];
    }else{
        $accion = '';
    }


    switch ($accion) {
        case 'consulta_tabla':
            $pantalla = $object->consulta_tabla();
            echo $pantalla;
            break;
        }