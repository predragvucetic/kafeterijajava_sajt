<?php

header("Content-Type: application/json");

require_once "../../../config/konekcija.php";

try{
    $query = "SELECT * FROM post p INNER JOIN slika s ON p.idSlika = s.idSlika";
    $result = $konekcija->prepare($query);
    $result->execute();
    $products = $result->fetchAll();

    echo json_encode($products);
}
catch(PDOException $ex){
    require_once BASE_URL . "models/files/functions.php";
    catchError($ex->getMessage());
    http_response_code(500);
}