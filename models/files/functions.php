<?php

function catchError($error){
    global $konekcija;

    $file = fopen(BASE_URL . "data/errors.txt", "a");

    if($file){
        $date = date("d.m.Y H:i:s");
        $data = $error . "\t" . $date . "\n";
        fwrite($file, $data);
        fclose($file); 
    }
}