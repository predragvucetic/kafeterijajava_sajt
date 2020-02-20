<?php

function getAll(){
    global $konekcija;

    try{
        $query = "SELECT * FROM meni";
        $result = $konekcija->prepare($query);
        $result->execute();
        $navigation = $result->fetchAll();
    }
    catch(PDOException $ex){
        require_once "models/files/functions.php";
        catchError($ex->getMessage());
        http_response_code(500);
    }

    return $navigation;
}