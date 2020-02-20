<?php

function getAllPosts(){
    global $konekcija;

    try{
        $query = "SELECT * FROM post p INNER JOIN slika s ON p.idSlika = s.idSlika";
        $result = $konekcija->prepare($query);
        $result->execute();
        $posts = $result->fetchAll();
    }
    catch(PDOException $ex){
        require_once "models/files/functions.php";
        catchError($ex->getMessage());
        http_response_code(500);
    }

    return $posts;
}