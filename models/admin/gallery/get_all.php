<?php

header("Content-Type: application/json");

require_once "../../../config/konekcija.php";

try{
    $query = "SELECT * FROM galerija";
    $result = $konekcija->prepare($query);
    $result->execute();
    $photos = $result->fetchAll();

    echo json_encode($photos);
}
catch(PDOException $ex){
    require_once BASE_URL . "models/files/functions.php";
    catchError($ex->getMessage());
    http_response_code(500);
}