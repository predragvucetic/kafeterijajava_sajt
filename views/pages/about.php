<section class="page-section about-heading">
    <div class="container">
    <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="img/about.jpg" alt="">
    <div class="about-heading-content">
        <div class="row">
        <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="bg-faded1 rounded p-5">
            <h2 class="section-heading mb-4">
                <span class="section-heading-upper">Inovativnost i inventivnost</span>
                <span class="section-heading-lower">Tajna našeg usleha</span>
            </h2>
            <p>Osim prve jutarnje, naši svakodnevni rituali su i praćenje onog najboljeg što pasionirani inovatori iz sveta kafe mogu da ponude kako bi se održao kvalitet proizvoda, a usluga podigla na nivo novog uživanja u tradicionalnom napitku.<br/><br/>Tako, osim što gotovo pred očima gostiju pržimo kafu za svaki od naših objekata u Srbiji, svakom posetiocu pružamo mogućnost da uz pomoć novih metoda i sam učestvuje u procesu ne samo ispijanja, već i specifičnog načina pripreme kafe.<br/><br/>Osim toga što idemo u korak sa onim najboljim što svet kafe može da ponudi, kada je reč o kreativnosti uvek smo korak ispred. Svaki od naših objekata posebno je uređen i u potpunosti podređen uživanju u omiljenoj vrsti kafe, uz osećaj da sedite u sopstvenoj dnevnoj sobi.<br/><br/>Tako se naš odnos sa gostima, ma gde otvorili vrata, ne razlikuje mnogo od komšijskog – onog iskrenog, pravog i potpuno spontanog.<br/><br/></p>
            <h2 class="section-heading mb-4">
                <span class="section-heading-upper">Pravilno prženje kafe</span>
                <span class="section-heading-lower">Ključ najboljeg ukusa</span>
            </h2>
            <p>Ono što našu ponudu čini posebnom je i činjenica da se proces prženja, a zatim i mlevenja odvija neposredno pred konzumaciju, a količine su uvek dozirane, pa tako kafe koje su putovale čak iz Indije, Kenije, Kolumbije ili Brazila uvek imaju svež i prepoznatljiv ukus.</p>    
            </div>
        </div>
        </div>
    </div>
    </div>
</section>

<div id="gallery">

<?php

include "models/gallery/functions.php";

$limit = isset($_GET['limit']) ? $_GET['limit'] : 0;
$images = getAllImages($limit);

foreach($images as $image) :

?>

    <div class="galerija">
        <a href="<?php echo $image->putanja ?>" data-lightbox="mojagalerija" alt="<?php echo $image->alt ?>">
        <img src="<?php echo $image->putanja ?>" width="400px" height="300px"/></a>
    </div>

<?php endforeach; ?>
</div>
<div>
    <div class="pagination">
        <?php

            $numOfImages = getPaginationCount();
            for($i = 0; $i < $numOfImages; $i++) :
        
        ?>

        <a href="#" class="gallery-pagination" data-limit="<?= $i ?>"><?= $i+1 ?></a>

        <?php endfor; ?>
        
    </div>
</div>