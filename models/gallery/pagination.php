<?php

header("Content-Type: application/json");

if(isset($_GET['limit'])){
    require_once "../../config/konekcija.php";
    include "functions.php";

    $limit = $_GET['limit'];
    $images = getAllImages($limit);
    $numOfImages = getPaginationCount();

    echo json_encode([
        "images" => $images,
        "numOfImages" => $numOfImages
    ]);
}
else{
    http_response_code(400);
}