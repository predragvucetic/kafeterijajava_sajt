<?php

    require_once "config.php";
    
    try {
        $konekcija = new PDO("mysql:host=" . SERVER . ";dbname=" . DATABASE . ";charset=utf8;", USERNAME, PASSWORD);

        $konekcija->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $konekcija->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }

?>