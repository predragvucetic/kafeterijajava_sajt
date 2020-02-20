<?php

if(isset($_POST['savePhoto'])){
    
    require_once "../../../config/konekcija.php";
    require_once "functions.php";

    // FAJL

    // $fajl = $_FILES['slika'];
    // var_dump($fajl);

    $fajl_naziv = $_FILES['photo']['name'];
    $fajl_tmpLokacija = $_FILES['photo']['tmp_name'];
    $fajl_tip = $_FILES['photo']['type'];
    $fajl_velicina = $_FILES['photo']['size'];

    // VALIDACIJA

    // 3 000 000 ~ 3MB
    $greske = [];

    $dozvoljeni_tipovi = ['image/jpg', 'image/jpeg', 'image/png'];

    if(!in_array($fajl_tip, $dozvoljeni_tipovi)){
        array_push($greske, "Pogresan tip fajla. - Profil slika");
    }
    if($fajl_velicina > 3000000){
        array_push($greske, "Maksimalna velicina fajla je 3MB. - Profil slika");
    }

    
    if(count($greske) == 0){
        // var_dump(getimagesize($fajl_tmpLokacija));

        // $dimenzije = getimagesize($fajl_tmpLokacija);
        // $sirina = $dimenzije[0];
        // $visina = $dimenzije[1];

        list($sirina, $visina) = getimagesize($fajl_tmpLokacija);

        // KREIRANJE PRAZNE SLIKE
        
        // $slika = imagecreatetruecolor(50, 50);
        // imagejpeg($slika, '../../assets/images/users/prazna_slika.jpg');
        
        // KREIRANJE SLIKE OD FAJLA
        
        $postojecaSlika = null;
        switch($fajl_tip){
            case 'image/jpeg':
                $postojecaSlika = imagecreatefromjpeg($fajl_tmpLokacija);
                break;
            case 'image/png':
                $postojecaSlika = imagecreatefrompng($fajl_tmpLokacija);
                break;
        }

        // PRIMER 1 - definisanje nove velicine slike
        // $novaSirina = 200;
        // $novaVisina = 200;

        // PRIMER 2 - procentualno smanjenje - za 50% manje sirina i visina
        // $novaSirina = $sirina * 0.5;
        // $novaVisina = $visina * 0.5;
        
        // PRIMER 3 - srazmerno smanjenje - sirina: 200px, visina: ?
        $novaSirina = 260;
        $novaVisina = 280; // novaVisina : visina = novaSirina : sirina

        // kreiranje prazne slike
        $novaSlika = imagecreatetruecolor($novaSirina, $novaVisina);
        
        // RESIZE

        // po referenci: u $novaSlika ce se nalaziti smanjena upload-ovana slika
        imagecopyresampled($novaSlika, $postojecaSlika, 0, 0, 0, 0, $novaSirina, $novaVisina, $sirina, $visina);

        // PROMENA IZGLEDA NOVE SLIKE - FILTER
        //imagefilter($novaSlika, IMG_FILTER_GRAYSCALE);

        // UPLOAD NOVE SLIKE
        $naziv = time().$fajl_naziv;
        $putanjaNovaSlika = 'img/posts/new_'.$naziv;

        switch($fajl_tip){
            case 'image/jpeg':
                imagejpeg($novaSlika, '../../../'.$putanjaNovaSlika, 75);
                break;
            case 'image/png':
                imagepng($novaSlika, '../../../'.$putanjaNovaSlika);
                break;
        }

        $putanjaOriginalnaSlika = 'img/posts/'.$naziv;

        if(move_uploaded_file($fajl_tmpLokacija, '../../../'.$putanjaOriginalnaSlika)){
            echo "Slika je upload-ovana na server!";

            try {
                $isInserted = insert($putanjaOriginalnaSlika, $putanjaNovaSlika);

                if($isInserted){
                    echo "Putanja do slike je upisana u bazu!";
                    header("Location: ../../../admin.php?page=posts");
                }
                
            } catch(PDOException $ex){
                require_once BASE_URL . "models/files/functions.php";
                catchError($ex->getMessage());
                http_response_code(500);
            }
        }

        // brisanje iz memorije
        imagedestroy($postojecaSlika);
        imagedestroy($novaSlika);

    } else {
        var_dump($greske);
    }

}