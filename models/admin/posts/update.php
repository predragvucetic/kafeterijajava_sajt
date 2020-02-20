<?php

header("Content-Type: application/json");

if(isset($_POST['send'])){
    require_once "../../../config/konekcija.php";

    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $date = $_POST['date'];
    $photo = $_FILES['photo'];
    $user = $_POST['user'];

    //if($photo['size'] != 0){
        
    //}

    try{
        $query = "UPDATE post SET naziv = ?, sadrzaj = ?, datumObjave = ?, idSlika = ?, idKorisnik = ? WHERE idPost = ?";
        $result = $konekcija->prepare($query);
        $result->bindValue(1, $title);
        $result->bindValue(2, $description);
        $result->bindValue(3, $date);
        $result->bindValue(4, $photo);
        $result->bindValue(6, $user);
        $result->bindValue(7, $id);
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