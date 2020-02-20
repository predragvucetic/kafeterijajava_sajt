<div class="content">
        <div class="container-fluid">
          <div class="row">
          
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Gallery</h4>
                    </div>
                    <div class="card-body table-responsive">

                    <table class="table table-hover">

                        <tbody id="gallery">

                          <?php

                            include "models/admin/gallery/functions.php";
                           
                            $photos = dohvatiSlike();
                            foreach($photos as $photo) :

                          ?>
                          
                            <th><img src="<?= $photo->putanjaMala ?>"></img>
                                <button class="btn"><i class="fa fa-trash" data-id="<?= $photo->idGalerija ?>"></i></button>
                                <button class="btn"><i class="fa fa-edit" data-id="<?= $photo->idGalerija ?>"></i></button>
                            </th>
                          
                          <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title" id="form-title">Add Photo</h4>
                    </div>
                    <div class="card-body table-responsive">

                    <form id="form" action="models/admin/gallery/insert.php" method="POST" enctype="multipart/form-data">

                        <div class="input-field">
                        <div id="slike">
                          <button type="button" onclick="document.getElementById('profilePhoto').click()" class="btn btn-info">Add photo</button>
                          <span id="profilePhotoValue"></span>

                          <input type="file" name="slika" id="profilePhoto" style="display:none;" onchange="document.getElementById('profilePhotoValue').innerHTML=this.value;"/>
                        </div>
                        <div class="input-field">
                            <input type="submit" value="Save" id="savePhoto" name="savePhoto" class="btn btn-success col s12"/>
                        </div>
                        </div>
                    </form>

                    </div>
                </div>              
            </div>                
          </div>
        </div>
      </div>