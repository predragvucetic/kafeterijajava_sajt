<?php

header("Content-Type: application/json");

if(isset($_POST['send'])){
    require_once "../../../config/konekcija.php";

    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $active = $_POST['active'];
    $role = $_POST['role'];

    try{
        $password = md5($password);

        $query = "INSERT INTO korisnik VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)";
        $result = $konekcija->prepare($query);
        $result->bindValue(1, $firstName);
        $result->bindValue(2, $lastName);
        $result->bindValue(3, $username);
        $result->bindValue(4, $email);
        $result->bindValue(5, $password);
        $result->bindValue(6, $active);
        $result->bindValue(7, $role);
        $result->execute();

        http_response_code(201);
        echo json_encode(["message" => "Success"]);
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