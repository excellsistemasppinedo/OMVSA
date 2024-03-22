<?php
    class _datos {
        public $host;
        public $puerto;
        public $ruta;
        public $user;
        public $clave;

        public function __construct($host, $puerto, $ruta, $user, $clave){
            $this->host = $host;
            $this->puerto = $puerto;
            $this->ruta = $ruta;
            $this->user = $user;
            $this->clave = $clave;
        }

        public function ejecutar($opc,$consulta){
            $dsn="firebird:dbname=".$this->host."/".$this->puerto.":".$this->ruta;
            try {
                $cnx = new PDO($dsn, $this->user, $this->clave);               
            }catch(PDOException $e){
                echo 'Error: '. $e->getmessage();
                return;
            };


            $resultado = $cnx->prepare($consulta);
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

}