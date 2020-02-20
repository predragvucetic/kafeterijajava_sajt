<?php

    include "models/users/registration.php";

?>

<section class="page-section cta">
  <div class="container">
    <div class="row">
      <div class="col-xl-9 mx-auto">
        <div class="cta-inner text-center rounded">
          <h2 class="section-heading mb-5">
            <span class="section-heading-upper">Forma za</span>
            <span class="section-heading-lower">Registraciju</span>
          </h2>
            <form action="<?php echo $_SERVER['PHP_SELF'] . '?page=registration' ?>" method="POST" class="list-unstyled list-hours mb-5 text-left mx-auto" onSubmit="return provera();">
              <table>
                  <tr class="list-unstyled-item list-hours-item d-flex">
                      <td>Ime:</td>
                      <td class="ml-auto"><input type="text" name="ime" id="ime"></td>
                  </tr>
                  <tr class="list-unstyled-item list-hours-item d-flex">
                      <td>Prezime:</td>
                      <td class="ml-auto"><input type="text" name="prezime" id="prezime"></td>
                  </tr>
                  <tr class="list-unstyled-item list-hours-item d-flex">
                      <td>Korisničko ime:</td>
                      <td class="ml-auto"><input type="text" name="korisnickoIme" id="korisnickoIme"></td>
                  </tr>
                  <tr class="list-unstyled-item list-hours-item d-flex">
                      <td>Email:</td>
                      <td class="ml-auto"><input type="text" name="email" id="email"><td>
                  </tr>
                  <tr class="list-unstyled-item list-hours-item d-flex">
                      <td>Lozinka:</td>
                      <td class="ml-auto"><input type="password" name="lozinka" id="lozinka"></td>
                  </tr>
                  <tr class="list-unstyled-item list-hours-item d-flex">
                      <td><input type="submit" name="registracija" id="registracija" value="Registruj se"></td>
                  </tr>
              </table>
          </form>
            <tr class="list-unstyled-item list-hours-item d-flex">
                <p>Imate nalog? </br>Možete se ulogovati <a href="index.php?page=login">ovde.</a></p>
            </tr>
        </div>
      </div>
    </div>
  </div>
</section>

