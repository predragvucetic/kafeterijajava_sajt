<?php

header("Content-Type: application/json");

if(isset($_GET['id'])){
    require_once "../../../config/konekcija.php";

    $id = $_GET['id'];

    try{
        $query = "SELECT * FROM post p INNER JOIN slika s ON p.idSlika = s.idSlika INNER JOIN korisnik k ON p.idKorisnik = k.idKorisnik WHERE p.idPost = ?";
        $result = $konekcija->prepare($query);
        $result->bindValue(1, $id);
        $result->execute();
        $product = $result->fetch();

        echo json_encode($product);
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