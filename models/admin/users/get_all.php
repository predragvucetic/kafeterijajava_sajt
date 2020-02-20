<?php

header("Content-Type: application/json");

require_once "../../../config/konekcija.php";

try{
    $query = "SELECT * FROM korisnik k INNER JOIN uloga u ON k.idUloga = u.idUloga";
    $result = $konekcija->prepare($query);
    $result->execute();
    $users = $result->fetchAll();

    echo json_encode($users);
}
catch(PDOException $ex){
    require_once BASE_URL . "models/files/functions.php";
    catchError($ex->getMessage());
    http_response_code(500);
}