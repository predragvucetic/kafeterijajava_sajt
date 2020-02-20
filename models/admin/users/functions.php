<?php

function dohvatiKorisnike(){
    global $konekcija;

    try{
        $query = "SELECT * FROM korisnik k INNER JOIN uloga u ON k.idUloga = u.idUloga";
        $result = $konekcija->prepare($query);
        $result->execute();
        $korisnici = $result->fetchAll();
    }
    catch(PDOException $ex){
        require_once BASE_URL . "models/files/functions.php";
        catchError($ex->getMessage());
        http_response_code(500);
    }

    return $korisnici;
}

function dohvatiUloge(){
    global $konekcija;

    try{
        $query = "SELECT * FROM uloga";
        $result = $konekcija->prepare($query);
        $result->execute();
        $uloge = $result->fetchAll();
    }
    catch(PDOException $ex){
        require_once BASE_URL . "models/files/functions.php";
        catchError($ex->getMessage());
        http_response_code(500);
    }

    return $uloge;
}