<?php
    require "constante.php";
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
    //$object = new _screen('localhost','omvsa','root','','3306');
    $object = new _screen(_SERVER,_DB,_USER,_PASSWORD,_PORT);
    if(isset($_POST['accion']) && !empty($_POST['accion'])){
        $accion = $_POST['accion'];
    }else{
        $accion = '';
    }


    switch ($accion) {
        case 'consulta_tabla':
            $id = 0;
            $pantalla = $object->consulta_tabla();
            echo $pantalla;
            break;

        case 'busqueda':
            $idArt = $_POST['cadena'];
            $contenido_tabla = $object->contenido_tabla($idArt);
            echo $contenido_tabla;
            break;

        case 'ubicar_id':
            header('Content-Type: application/json');
            $id = $_POST['idArticulo'];
            $valores = $object->mostrar_datos($id);
            $r=json_encode($valores);
            echo $r;
            break;

        case 'producto_modal':
            $id = $_POST['idArticulo'];
            $modal = $object->formulario_consulta_modal($id);
            echo $modal;
            break;
    
        }



