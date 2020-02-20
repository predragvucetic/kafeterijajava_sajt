<?php

    include "config/konekcija.php";

    $upit = "SELECT * FROM autor a INNER JOIN slika s ON a.idSlika = s.idSlika";

    $rezultat = $konekcija->query($upit)->fetch();

?>

    <section class="page-section clearfix">
        <div class="container">
            <div class="intro">
            <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="<?php echo $rezultat->putanja ?>" alt="<?php echo $rezultat->alt ?>">
            <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                <h2 class="section-heading mb-4">
                <span class="section-heading-upper"><?php echo $rezultat->naziv ?></span>
                <span class="section-heading-lower"><?php echo $rezultat->ime . " " . $rezultat->prezime ?></span>
                </h2>
                <p class="mb-3"><?php echo $rezultat->sadrzaj ?></p>
            </div>
            </div>
        </div>
        </section>
