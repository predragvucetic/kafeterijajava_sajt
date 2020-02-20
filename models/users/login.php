<?php
session_start();

	if(isset($_POST['login'])){
		$korisnickoIme = trim($_POST['korisnickoIme']);
		$lozinka = trim($_POST['lozinka']);

        $errors = [];
        
        $reKorisnickoIme = "/^[\w]{5,100}$/";
        if(!preg_match($reKorisnickoIme, $korisnickoIme)){
            $errors[] = "Korisničko ime nije u ispravnom formatu!";
        }

        $reLozinka = "/^[\S]{5,}$/";
        if(!preg_match($reLozinka, $lozinka)){
            $errors[] = "Lozinka nije u ispravnom formatu!";
        }

		if(count($errors) > 0){
			echo "Greske:";
			echo "<ul>";
			foreach($errors as $error){
				echo "<li>" . $error . "</li>";
				require_once "models/files/functions.php";
				catchError($error);
			}
			echo "</ul>";
			
		}
		else {
			require_once "../../config/konekcija.php";
			$lozinka = md5($lozinka);

			$upit = "SELECT * FROM korisnik k INNER JOIN uloga u ON k.idUloga = u.idUloga WHERE aktivan = 1 AND korisnickoIme = :kor_ime AND lozinka = :lozinka";
			//$upit = "SELECT k.idKorisnik, k.ime, k.prezime, k.korisnickoIme, k.email, u.naziv FROM korisnik k INNER JOIN uloga u ON k.idUloga = u.idUloga WHERE aktivan = 1 AND korisnickoIme = :kor_ime AND lozinka = :lozinka";

			    $stmt = $konekcija->prepare($upit);
			    $stmt->bindParam(":kor_ime", $korisnickoIme);
			    $stmt->bindParam(":lozinka", $lozinka);

				try{
					$stmt->execute();
					$user = $stmt->fetch();

					if($user) {
						$_SESSION['korisnik'] = $user;
						if($_SESSION['korisnik']->naziv == 'administrator'){
						header("Location: ../../admin.php");
						}
						else {
							header("Location: ../../index.php?page=login");
						}	        
					}
					else {
						$_SESSION['greske'] = "Pogrešno korisničko ime ili password!";
						require_once "models/files/functions.php";
						catchError($_SESSION['greske']);
						header("Location: ../../index.php?page=login");
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