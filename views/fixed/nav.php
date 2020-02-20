<?php

  include "models/navigation/functions.php";

  $navigation = getAll();
  
?>

<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
  <div class="container">
    <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav mx-auto">
        <?php foreach($navigation as $nav) : ?>
        <li class="nav-item px-lg-4">
          <a class="nav-link text-uppercase text-expanded" href="<?php echo $nav->putanja; ?>"><?php echo $nav->naziv; ?></a>
        </li>
        <?php endforeach; ?>
        
        <?php if(isset($_SESSION['korisnik'])):?>
				<li class="nav-item px-lg-4">
          <a class="nav-link text-uppercase text-expanded" href="models/users/logout.php">Odjavi se</a></li>
        <?php endif; ?>
        <?php if(isset($_SESSION['korisnik']) && ($_SESSION['korisnik']->naziv == "administrator")) : ?>
				<li class="nav-item px-lg-4">
          <a class="nav-link text-uppercase text-expanded" href="admin.php?page=users">Admin Panel</a></li>
        <?php endif; ?>
      </ul>
    </div>   
  </div>
</nav>
