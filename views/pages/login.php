<?php

    //if(isset($_SESSION['korisnik']) && ($_SESSION['korisnik']->naziv === "administrator")) :
        //var_dump($_SESSION['korisnik']);
    //include "views/admin/users/table.php";
    
    //endif;

?>

<section class="page-section clearfix">
      <div class="container">
        <div class="intro">
          <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="img/intro.jpg" alt="">
          <div class="intro-text left-0 text-center bg-faded p-5 rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper">Logovanje</span>
            </h2>
            <div class="logovanje">
                
                <?php
                    if(isset($_SESSION['korisnik']) && ($_SESSION['korisnik']->naziv == "administrator")) :
                ?>
                    <h4>Dobro došao: <?php echo $_SESSION['korisnik']->ime; echo " " . $_SESSION['korisnik']->prezime; ?>
                <?php
                    elseif(isset($_SESSION['korisnik']) && ($_SESSION['korisnik']->naziv == "korisnik")) :
                ?>
                <h4>Dobro došao: <?php echo $_SESSION['korisnik']->ime; echo " " . $_SESSION['korisnik']->prezime;  ?>

                <?php else : ?>

                <form action="models/users/login.php" method="POST" class="list-unstyled list-hours mb-5 text-left mx-auto">
                    <table>
                        <tr class="list-unstyled-item list-hours-item d-flex">
                            <td>Korisničko ime:</td>
                            <td class="ml-auto"><input type="text" name="korisnickoIme" id="korisnickoIme"></td>
                        </tr>
                        <tr class="list-unstyled-item list-hours-item d-flex">
                            <td>Lozinka:</td>
                            <td class="ml-auto"><input type="password" name="lozinka" id="lozinka"></td>
                        </tr>
                        <tr class="list-unstyled-item list-hours-item d-flex">
                            <td><input type="submit" name="login" id="login" value="Uloguj se"></td>
                        </tr>
                    </table>
                </form>

                <tr class="list-unstyled-item list-hours-item d-flex">
                    <p>Nemate nalog? </br>Možete ga napraviti <a href="index.php?page=registration">ovde.</a></p>
                </tr>

                <?php endif; ?>
                <?php if(isset($_SESSION['greske'])) :
                //var_dump($_SESSION['greske']);
                unset($_SESSION['greske']);
                ?>
                <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
</section>