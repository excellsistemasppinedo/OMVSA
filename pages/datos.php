<?php
 class _datos {
#region firebird
    //     public $host;
    //     public $puerto;
    //     public $ruta;
    //     public $user;
    //     public $clave;

    //     public function __construct($host, $puerto, $ruta, $user, $clave){
    //         $this->host = $host;
    //         $this->puerto = $puerto;
    //         $this->ruta = $ruta;
    //         $this->user = $user;
    //         $this->clave = $clave;
    //     }

    //     public function ejecutar($opc,$consulta){
    //         $dsn="firebird:dbname=".$this->host."/".$this->puerto.":".$this->ruta;
    //         try {
    //             $cnx = new PDO($dsn, $this->user, $this->clave);               
    //         }catch(PDOException $e){
    //             echo 'Error: '. $e->getmessage();
    //             return;
    //         };


    //         $resultado = $cnx->prepare($consulta);
    //         $resultado->execute();
    //         if ($opc == 0){
    //             $arreglo = array("resultado"=>"100","consulta"=>"Transaccion ok",array());
    //         }else{
    //             $numRow = $resultado->rowCount();
    //             if($numRow != 0){
    //                 $arreglo = array("resultado"=>"200","consulta"=>"ConDatos",$resultado->fetchAll(\PDO::FETCH_ASSOC));
    //             }else{
    //                 $arreglo = array("resultado"=>"201","consulta"=>"SinDatos",array()); 
    //             }
    //         }
    //         $resultado = null;
    //         if ($arreglo['resultado']=="200"){
    //             $arreglo=$arreglo[0];
    //         }
    //         return $arreglo;
    // }
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

    public function ejecutar($opc, $cad, $db){
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

    public function contenido_tabla($p_filtro){
    $sentencia = "call sp_articulos ('{$p_filtro}')";
    $resultado = $this->ejecutar(1,$sentencia,'');
    $tabla_resultado = '';
    for ($i = 0; $i < count($resultado); $i++) {
        if(array_key_exists('articulo_id',$resultado[$i])){
            $tabla_resultado .= <<<tabla
                                  <tr data-id={$resultado[$i]['articulo_id']}>
                                    <td class="text-center">{$resultado[$i]['articulo_id']}</td>
                                    <td class="text-center">{$resultado[$i]['nombre']}</td>
                                    <td class="text-center">{$resultado[$i]['ultima_compra']}</td>
                                    <td class="text-center">{$resultado[$i]['unidad_venta']}</td>
                                    <td><button class="btn btn-danger btn-sm btn-eliminar" id="boton_zoom"><i class="zmdi zmdi-zoom-in"></i></button></td><\td>
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
        $sentencia = "call sp_campos_datos({$p_id})";
        $resultado = $this->ejecutar(1,$sentencia,'');
        return $resultado;
    }
}