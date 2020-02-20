<?php

function dohvatiSlike(){
    global $konekcija;

    try{
        $query = "SELECT * FROM galerija";
        $result = $konekcija->prepare($query);
        $result->execute();
        $galerija = $result->fetchAll();
    }
    catch(PDOException $ex){
        require_once BASE_URL . "models/files/functions.php";
        catchError($ex->getMessage());
        http_response_code(500);
    }

    return $galerija;
} 

function insert($putanjaOriginalnaSlika, $putanjaNovaSlika){
    global $konekcija;

    $alt = "Coffee";

    try{
        $query = "INSERT INTO galerija VALUES ('', ?, ?, ?)";
        $insert = $konekcija->prepare($query);
        $isInserted = $insert->execute([$alt, $putanjaOriginalnaSlika, $putanjaNovaSlika]);
    }
    catch(PDOException $ex){
        require_once BASE_URL . "models/files/functions.php";
        catchError($ex->getMessage());
        http_response_code(500);
    }
    return $isInserted;
}