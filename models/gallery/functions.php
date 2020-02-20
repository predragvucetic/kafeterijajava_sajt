<?php

//require_once "config/konekcija.php";

define("GALLERY_LIMIT", 6);

function getAllImages($limit = 0){
    
    global $konekcija;

    try{
        $query = "SELECT * FROM galerija LIMIT :limit, :offset";
        $result = $konekcija->prepare($query);

        $limit = ((int) $limit) * GALLERY_LIMIT;
        $offset = GALLERY_LIMIT;

        $result->bindParam(":limit", $limit, PDO::PARAM_INT);
        $result->bindParam(":offset", $offset, PDO::PARAM_INT);
        $result->execute();
        $images = $result->fetchAll();
    }
    catch(PDOException $ex){
        require_once BASE_URL . "models/files/functions.php";
        catchError($ex->getMessage());
        http_response_code(500);
    }

    return $images;
}

function getNumOfImages(){

    global $konekcija;

    try{
        $query = "SELECT COUNT(*) AS numOfImages FROM galerija";
        $result = $konekcija->prepare($query);
        $result->execute();
        $image = $result->fetch();
    }
    catch(PDOException $ex){
        require_once BASE_URL . "models/files/functions.php";
        catchError($ex->getMessage());
        http_response_code(500);
    }

    return $image;
}

function getPaginationCount(){
    $result = getNumOfImages();
    $numOfImages = $result->numOfImages;

    return ceil($numOfImages / GALLERY_LIMIT);
}