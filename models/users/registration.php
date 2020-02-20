<?php

    require_once "config/konekcija.php";

    if(isset($_POST['registracija'])){

        $errors = [];

        $ime = trim($_POST['ime']);
        $reIme = "/^[A-Z][a-z]{2,50}$/";
        if(!preg_match($reIme, $ime)){
            $errors[] = "Ime nije u ispravnom formatu!";
        }

        $prezime = trim($_POST['prezime']);
        $rePrezime = "/^[A-Z][a-z]{2,80}$/";
        if(!preg_match($rePrezime, $prezime)){
            $errors[] = "Prezime nije u ispravnom formatu!";
        }

        $korisnickoIme = trim($_POST['korisnickoIme']);
        $reKorisnickoIme = "/^[\w]{5,100}$/";
        if(!preg_match($reKorisnickoIme, $korisnickoIme)){
            $errors[] = "Korisničko ime nije u ispravnom formatu!";
        }

        $email = trim($_POST['email']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = "Email nije u ispravnom formatu!";
        }

        $lozinka = trim($_POST['lozinka']);
        $reLozinka = "/^[\S]{5,}$/";
        if(!preg_match($reLozinka, $lozinka)){
            $errors[] = "Lozinka nije u ispravnom formatu!";
        }
        
        $aktivan = 1;

        $uloga = 2;
        
        if(count($errors) > 0){
            echo "<h4 style='color:#fff;'>Greske: </h4>";
            echo "<ol style='color:#fff;'>";
            foreach($errors as $error){
                echo "<li>" . $error . "</li>";
                require_once "models/files/functions.php";
				catchError($error);
            }
            echo "</ol>";
        }
        else {
            
            $lozinka = md5($lozinka);

            $pripremaUpit = $konekcija->prepare("INSERT INTO korisnik VALUES ('', :ime, :prezime, :korisnickoIme, :email, :lozinka, :aktivan, :uloga)");

            $pripremaUpit->bindParam(":ime", $ime);
            $pripremaUpit->bindParam(":prezime", $prezime);
            $pripremaUpit->bindParam(":korisnickoIme", $korisnickoIme);
            $pripremaUpit->bindParam(":email", $email);
            $pripremaUpit->bindParam(":lozinka", $lozinka);
            $pripremaUpit->bindParam(":aktivan", $aktivan);
            $pripremaUpit->bindParam(":uloga", $uloga);

            try {
                
                $rezultat = $pripremaUpit->execute();
                
                if($rezultat){
                    ?>
                    <h5 style="color:white;">Korisnik je unet u bazu</h5>
                    <?php 
                } else {
                    ?>
                    <h5 style="color:white;">Greska pri unosu korisnika</h5>
                    <?php
                }
            }
            catch(PDOException $ex){
                require_once "models/files/functions.php";
                catchError($ex->getMessage());
                http_response_code(500);
            }

        }
    }
    ?>