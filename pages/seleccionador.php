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

    // $object = new _screen('localhost','3030','.\\Data\\OMVSA.FDB','SYSDBA','masterkey');
    $object = new _screen('localhost','omvsa','root','','3306');
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

        case 'busqueda':
            $idArt = $_POST['cadena'];
            $contenido_tabla = $object->contenido_tabla($idArt);
            echo $contenido_tabla;
            break;

        case 'ubicar_id':
            $id = $_POST['id'];
            $valores = $object->mostrar_datos($id);
            $r=json_encode($valores);
            echo $r;
            break;
        }


