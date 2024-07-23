<?php
 require_once 'constante.php';
 class _datos {
#region firebird

#endregion
public $host;
public $user;
public $pwd;
public $db;
public $puerto;
public function __construct($host, $db, $user, $pwd, $puerto){
    $this->host = $host;
    $this->user = $user;
    $this->pwd = $pwd;
    $this->db = $db;
    $this->puerto = $puerto;
}


public function ejecutar_MARIADB($opc, $cad, $db){
    // $opc (1/0)-> Consulta / Transaccion
    // $cad -> Consulta de Transact SQL
    // $bdname -> Base de datos
    
    // Utilizacion de la topologia de conectividad PDO

    // Resultados
    // ----------
    // 100 - Sin resultado operacion correcta
    // 201 - No data

    if($db == ''){
        $dsn = "mysql:host=".$this->host.";dbname=".$this->db.";port=".$this->puerto;
    }else{
        $dsn = "mysql:host=".$this->host.";dbname=".$db.";port=".$this->puerto;
    };

    try {
        $cnx = new \PDO($dsn, $this->user, $this->pwd);
    }catch(\PDOException $e){
        echo 'Error: '. $e->getmessage();
    }

    $resultado = $cnx->prepare($cad);
    $resultado->execute();
    if ($opc == 0){
        $arreglo = array("resultado"=>"100","consulta"=>"Transaccion ok",array());
    }else{
        $numRow = $resultado->rowCount();
        if($numRow != 0){
            $arreglo = array("resultado"=>"200","consulta"=>"ConDatos",$resultado->fetchAll(\PDO::FETCH_ASSOC));
        }else{
            $arreglo = array("resultado"=>"201","consulta"=>"SinDatos",array()); 
        }
    }
    $resultado = null;
    if ($arreglo['resultado']=="200"){
        $arreglo=$arreglo[0];
    }
    return $arreglo;
}

public function ejecutar($opc, $cad, $db){
    // Este ejecutar esta diseñado para FIREBIRD OJO OJO OJO OJO OJO OJO OJO OJOO OJO OJO
    // $opc (1/0)-> Consulta / Transaccion
    // $cad -> Consulta de Transact SQL
    // $bdname -> Base de datos
    
    // Utilizacion de la topologia de conectividad PDO

    // Resultados
    // ----------
    // 100 - Sin resultado operacion correcta
    // 201 - No data

    if($db == ''){
        $dsn = "firebird:host=".$this->host.";dbname=".$this->db.";port=".$this->puerto.";charset=utf8";
    }else{
        $dsn = "firebird:host=".$this->host.";dbname=".$db.";port=".$this->puerto.";charset=utf8";
    };

    try {
        $cnx = new \PDO($dsn, $this->user, $this->pwd);
        $cnx->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }catch(\PDOException $e){
        echo 'Error: '. $e->getmessage();
    }

    $resultado = $cnx->prepare($cad);
    $resultado->execute();
    if ($opc == 0){
        $arreglo = array("resultado"=>"100","consulta"=>"Transaccion ok",array());
    }else{
        $datos = $resultado->fetchAll(\PDO::FETCH_ASSOC);
        $numRow = count($datos);
        if($numRow != 0){
            $arreglo = array("resultado"=>"200","consulta"=>"ConDatos",$datos);
        }else{
            $arreglo = array("resultado"=>"201","consulta"=>"SinDatos",array()); 
        }
    }
    $resultado = null;
    $cnx = null;
    if ($arreglo['resultado']=="200"){
        $arreglo=$arreglo[0];
    }
    return $arreglo;
}


    public function contenido_tabla($p_filtro){
    if ($p_filtro == '') {
        $p_filtro = 'null';
    }
    //$sentencia = <<<sentencia
                //     SELECT first 100 a.articulo_id, 
                //         (SELECT clave_articulo FROM GET_CLAVE_ART(a.articulo_id, TRUE)) as clave,
                //         a.nombre as articulo, 
                //         b.nombre as linea, 
                //         Coalesce((SELECT VALOR_DESPLEGADO FROM LISTAS_ATRIBUTOS WHERE LISTA_ATRIB_ID=c.marca), '') as marca
                //     FROM articulos a
                //     INNER JOIN lineas_articulos b ON a.LINEA_ARTICULO_ID = b.LINEA_ARTICULO_ID
                //     INNER JOIN libres_articulos c ON a.articulo_id = c.articulo_id
                //     WHERE upper(a.nombre) CONTAINING '{$p_filtro}'
                // sentencia;

    $sentencia = <<<sentencia
                        Select first 100 a.articulo_id,(SELECT clave_articulo as clave FROM GET_CLAVE_ART(a.articulo_id, TRUE)),
                        a.nombre as articulo, b.nombre as linea, c.medida,
                        Coalesce((Select VALOR_DESPLEGADO from LISTAS_ATRIBUTOS where LISTA_ATRIB_ID=c.marca),'') as marca,
                        Coalesce((Select VALOR_DESPLEGADO from LISTAS_ATRIBUTOS where LISTA_ATRIB_ID=c.tipo_de_piso),'') as piso,
                        (SELECT FIRST 1 PRECIO_TOTAL FROM RAB_PRECIO_ARTICULO Where articulo_id=a.articulo_id Order by FECHA_ULTIMA_LISTA desc),
                        (SELECT EXISTENCIA as ex_torreon FROM EXIVAL_ART(a.articulo_id, 19, 'now', 'S')),
                        (SELECT EXISTENCIA as ex_gomez FROM EXIVAL_ART(a.articulo_id, 54285, 'now', 'S')),
                        d.imagen
                        From articulos a
                            Inner join lineas_articulos b on a.LINEA_ARTICULO_ID=b.LINEA_ARTICULO_ID
                            Inner join libres_articulos c on a.articulo_id=c.articulo_id
                            Left JOIN Imagenes_articulos d on a.ARTICULO_ID=d.ARTICULO_ID
                        WHERE upper(a.nombre) CONTAINING '{$p_filtro}'
                sentencia;
    
    $resultado = $this->ejecutar(1,$sentencia,'');
    $tabla_resultado = '';
    for ($i = 0; $i < count($resultado); $i++) {
        if(array_key_exists('ARTICULO_ID',$resultado[$i])){
            $articulo   = trim($resultado[$i]['ARTICULO']);
            $linea      = trim($resultado[$i]['LINEA']);
            $marca      = trim($resultado[$i]['MARCA']);
            $piso      = trim($resultado[$i]['PISO']);

            $tabla_resultado .= <<<tabla
                                  <tr data-id={$resultado[$i]['ARTICULO_ID']}>
                                    <td class="text-center">{$resultado[$i]['ARTICULO_ID']}</td>
                                    <td class="text-center">{$articulo}</td>
                                    <td class="text-center">{$linea}</td>
                                    <td class="text-center">{$piso}</td>
                                    <td class="text-center">{$marca}</td>
                                    <td><button class="btn btn-danger btn-sm btn-eliminar" id="boton_zoom"><i class="zmdi zmdi-image large-icon"></i></button></td><\td>
                                  </tr>
                                  tabla;
        }else{
            $tabla_resultado = 'No Existe Datos';
            exit;
        }
    }                          
    return $tabla_resultado;
    }

    public function mostrar_datos($p_id){
        $sentencia = "execute procedure sp_campos_datos({$p_id})";
        $resultado = $this->ejecutar(1,$sentencia,'');
        return $resultado;
    }

    public function retrive_datos_modal($p_id){
        $sentencia = <<<sentencia
                            Select a.articulo_id,(SELECT clave_articulo as clave FROM GET_CLAVE_ART(a.articulo_id, TRUE)),
                                a.nombre as articulo, b.nombre as linea, c.medida,
                                Coalesce((Select VALOR_DESPLEGADO from LISTAS_ATRIBUTOS where LISTA_ATRIB_ID=c.marca),'') as marca,
                                Coalesce((Select VALOR_DESPLEGADO from LISTAS_ATRIBUTOS where LISTA_ATRIB_ID=c.tipo_de_piso),'') as piso,
                                (SELECT FIRST 1 PRECIO_TOTAL FROM RAB_PRECIO_ARTICULO Where articulo_id=a.articulo_id Order by FECHA_ULTIMA_LISTA desc),
                                (SELECT EXISTENCIA as ex_torreon FROM EXIVAL_ART(a.articulo_id, 19, 'now', 'S')),
                                (SELECT EXISTENCIA as ex_gomez FROM EXIVAL_ART(a.articulo_id, 54285, 'now', 'S')),
                                d.imagen
                            From articulos a
                                Inner join lineas_articulos b on a.LINEA_ARTICULO_ID=b.LINEA_ARTICULO_ID
                                Inner join libres_articulos c on a.articulo_id=c.articulo_id
                                Left JOIN Imagenes_articulos d on a.ARTICULO_ID=d.ARTICULO_ID
                            Where a.articulo_id = {$p_id}
                        sentencia;
        $resultado = $this->ejecutar(1,$sentencia,'');
        return $resultado;
    }
}

