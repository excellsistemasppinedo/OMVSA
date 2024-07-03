<?php
    require_once 'pages\constante.php';

    $dsn = "firebird:host="._SERVER.";dbname="._DB.";port="._PORT.";charset=utf8";

    try {
        $cnx = new PDO($dsn, _USER, _PASSWORD);
        $cnx->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }catch(\PDOException $e){
        echo 'Error: '. $e->getmessage();
        exit;
    }

    $sql = "select * from articulos";
    $query = $cnx->query($sql);
    foreach ($query as $row){
        echo $row['NOMBRE'] . "<br>";
    }
