<?php

		include "../config/konekcija.php";

		if(isset($_POST["anketa_opcija"]))
		{
 				$upit = "INSERT INTO anketa (odgovor) VALUES (:odgovor)";
 				$podaci = array(':odgovor'  => $_POST["anketa_opcija"]);
 				$statement = $konekcija->prepare($upit);
 				$statement->execute($podaci);
		}

?>