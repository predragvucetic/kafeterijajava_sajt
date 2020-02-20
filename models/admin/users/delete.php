<?php

header("Content-Type: application/json");

if(isset($_GET['id'])){
    require_once "../../../config/konekcija.php";

    $id = $_GET['id'];

    try{
        $query = "DELETE FROM korisnik WHERE idKorisnik = ?";
        $result = $konekcija->prepare($query);
        $result->bindValue(1, $id);
        $result->execute();

        http_response_code(204);
    }
    catch(PDOException $ex){
        require_once BASE_URL . "models/files/functions.php";
        catchError($ex->getMessage());
        http_response_code(500);
    }
}
else{
    http_response_code(400);
}