<?php

function dohvatiSvePostove(){
    global $konekcija;

    try{
        $query = "SELECT * FROM post p INNER JOIN slika s ON p.idSlika = s.idSlika";
        $result = $konekcija->prepare($query);
        $result->execute();
        $postovi = $result->fetchAll();
    }
    catch(PDOException $ex){
        require_once BASE_URL . "models/files/functions.php";
        catchError($ex->getMessage());
        http_response_code(500);
    }
    
    return $postovi;
}

function dohvatiKorisnike(){
    global $konekcija;

    try{
        $query = "SELECT * FROM korisnik";
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

function insert($putanjaOriginalnaSlika, $putanjaNovaSlika){
    global $konekcija;

    $alt = "Coffee";
    
    try{
        $query = "INSERT INTO slika VALUES ('', ?, ?, ?)";
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