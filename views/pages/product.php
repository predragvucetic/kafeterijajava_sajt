<?php

    include "models/posts/functions.php";

    $posts = getAllPosts();
    
    if(count($posts) > 0) :
        foreach($posts as $post) :
    
?>

    <section class="page-section">
      <div class="container">
        <div class="product-item">
        <?php if(isset($_SESSION['korisnik']) && ($_SESSION['korisnik']->naziv == "administrator")) : ?>
          <!--<a href="admin.php?page=insert_post" class="insert-post">Dodaj post</a>
          <a href="admin.php?page=edit_post&id=<?php echo $post->idPost ?>" data-id="<?php echo $post->idPost ?>" class="update-post">Izmeni</a>
          <a href="" data-id="<?php echo $post->idPost ?>" class="delete-post">Obriši</a>-->
        <?php endif; ?>
          <div class="product-item-title d-flex">
            <div class="bg-faded p-5 d-flex ml-auto rounded">
              <h2 class="section-heading mb-0">
                <span class="section-heading-lower" name="naslov" id="naslov"><?php echo $post->naslov ?></span>
              </h2>
            </div>
          </div>
          <img style="height:600px;width:600px;" class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" name="putanja" id="putanja" 
          src="<?php echo $post->putanja ?>" alt="<?php echo $post->alt ?>">
          <div class="product-item-description d-flex mr-auto">
            <div class="bg-faded1 p-5 rounded">
              <p class="mb-0" name="sadrzaj" id="sadrzaj"><?php echo $post->sadrzaj ?></p>
            </div>
            <input type="hidden" name="hiddenPostID" name="hiddenPostID" value="<?php echo $post->idPost ?>">
          </div>
        </div>
      </div>
    </section>

<?php

    endforeach;
    endif;

?>