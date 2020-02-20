<section class="page-section about-heading">
    <div class="container">
    <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="img/home.jpg" alt="">
    <div class="about-heading-content">
        <div class="row">
        <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="bg-faded1 rounded p-5">
            <h2 class="section-heading mb-4">
                <span class="section-heading-upper">Kafeterija Java</span>
                <span class="section-heading-lower">Mesto gde jutro počinje</span>
            </h2>
            <p>Pre nego što dođe do vašeg stola, naša kafa prolazi dugačak put. Od plantaže u najudaljenijim krajevima sveta, preko ruku farmera i berača plodova, do prženja i najfinijeg mlevenja u našim mlinovima, a ipak, svaka šoljica znači tek jedan novi početak uživanja u danu pred nama.<br/><br/>Iako veoma mlad brend, za manje od tri godine dokazanim kvalitetom i konstantnim inovacijama postali smo jedan od najbrže rastućih lanaca kafeterija u Srbiji, koji u svom asortimanu za sada nudi više od 15 jedinstvenih vrsta kafa sa svih strana sveta, među kojima su i veoma retki ukusi, ekskluzivni u ovom delu Evrope.<br/><br/>Gosti Kafeterije Java se svakog jutra mogu razbuditi uz ukuse Indija ili Brazil espresa, poboljšati produktivnost uz ukuse Kolumbije, Kenije ili Etiopije, uživati u specijalno pripremljenim blendovima ili završiti dan uz bezkofeinske napitke.<br/><br/></p>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>

<?php
if(isset($_SESSION['korisnik'])) :
?>

<section class="page-section cta">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<div class="container">
    <div class="row">
      <div class="col-xl-9 mx-auto">
        <div class="cta-inner text-center rounded">
          <h2 class="section-heading mb-5">
            <span class="section-heading-upper"></span>
            <span class="section-heading-lower">Anketa</span>
          </h2>
          <form method="post" id="anketa_forma">
                    <h3>Koju kafu najviše volite da pijete?</h3>
                    <br />
                    <div class="radio">
                    <label><h4><input type="radio" name="anketa_opcija" class="anketa_opcija" value="Domaca"/>Domaća</h4></label>
                    </div>
                    <div class="radio">
                    <label><h4><input type="radio" name="anketa_opcija" class="anketa_opcija" value="Nescaffe"/>Nescaffe</h4></label>
                    </div>
                    <div class="radio">
                    <label><h4><input type="radio" name="anketa_opcija" class="anketa_opcija" value="Espresso"/>Espresso</h4></label>
                    </div>
                    <div class="radio">
                    <label><h4><input type="radio" name="anketa_opcija" class="anketa_opcija" value="Cappuccino"/>Cappuccino</h4></label>
                    </div>
                    <div class="radio">
                    <label><h4><input type="radio" name="anketa_opcija" class="anketa_opcija" value="Macchiato"/>Macchiato</h4></label>
                    </div>
                    <br />
                    <input type="submit" name="anketa_dugme" id="anketa_dugme" class="btn btn-primary" value="Glasaj"/>
                </form>
                <br />
            </div>
            <div class="col-md-6">
                <br />
                <br />
                <br />
                <h4>Anketa rezultati:</h4><br />
                <div id="anketa_rezultat" class="anketa_rezultat"></div>
            </div>              
        </div>
      </div>
    </div>
</div>
</section>

<?php endif; ?>