<?php

    include '../config/konekcija.php';

    $odgovor = array("Domaća", "Nescaffe", "Espresso", "Cappuccino", "Macchiato");

    $anketa_redovi = dohvati_redove($konekcija);

    $ispis = '';
    if($anketa_redovi > 0)
    {
    foreach($odgovor as $odg)
    {
    $upit = "SELECT * FROM anketa WHERE odgovor = '".$odg."'";
    $statement = $konekcija->prepare($upit);
    $statement->execute();
    $rezultat = $statement->rowCount();

    $procenat_glasanja = round(($rezultat/$anketa_redovi)*100);
    $progress_bar_class = '';
    if($procenat_glasanja >= 40)
    {
    $progress_bar_class = 'progress-bar-success';
    }
    else if($procenat_glasanja >= 25 && $procenat_glasanja < 40)
    {
    $progress_bar_class = 'progress-bar-info';
    }
    else if($procenat_glasanja >= 10 && $procenat_glasanja < 25)
    {
    $progress_bar_class = 'progress-bar-warning';
    }
    else
    {
    $progress_bar_class = 'progress-bar-danger';
    }
    $ispis .= '
    <div class="row">
        <div class="col-md-2" align="right">
        <label>'.$odg.'</label>
        </div>
        <div class="col-md-10">
        <div class="progress">
        <div class="progress-bar '.$progress_bar_class.'" role="progressbar" aria-valuenow="'.$procenat_glasanja.'" 
        aria-valuemin="0" aria-valuemax="100" style="width:<br/>'.$procenat_glasanja.'%">'.$procenat_glasanja.' %
        </div>
        </div>
        </div>
    </div>
    ';
    }
    }

    echo $ispis;

    function dohvati_redove($konekcija)
    {
    $upit = "SELECT * FROM anketa";
    $statement = $konekcija->prepare($upit);
    $statement->execute();
    return $statement->rowCount();
    }

?>