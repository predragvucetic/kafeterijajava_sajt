<div class="content">
        <div class="container-fluid">
          <div class="row">
          
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Posts</h4>
                    </div>
                    <div class="card-body table-responsive">

                    <table class="table table-hover">

                        <thead class="text-warning">
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>ID Photo</th>
                            <th>ID User</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>

                        <tbody id="products">

                          <?php
                            
                            include "models/admin/posts/functions.php";

                            $posts = dohvatiSvePostove();
                            foreach($posts as $post) :

                          ?>
                          <tr>
                            <td><?= $post->idPost ?></td>
                            <td><?= $post->naslov ?></td>
                            <td><?= $post->sadrzaj ?></td>
                            <td><?= $post->datumObjave ?></td>
                            <td><?= $post->idSlika ?></td>
                            <td><?= $post->idKorisnik ?></td>
                            <td><a href="#" class="update-product" data-id="<?= $post->idPost ?>">Edit</a></td>
                            <td><a href="#" class="delete-product" data-id="<?= $post->idPost ?>">Delete</a></td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title" id="form-title">Add Post</h4>
                    </div>
                    <div class="card-body table-responsive">

                    <form id="form" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="hdnId"/>

                        <div class="input-field">
                            <input type="text" id="title" name="title" placeholder="Title" class="validate">
                            <label for="title">Title</label>
                        </div>
                        <div class="input-field">
                            <input type="text" id="description" name="description" placeholder="Description" class="validate">
                            <label for="description">Description</label>
                        </div>
                        <div class="input-field">
                            <input type="date" id="price" name="date" placeholder="Date" class="validate">
                            <label for="date">Date</label>
                        </div>
                        <div class="input-field">
                            <input type="file" id="photo" name="photo">                            
                        </div>
                        <div class="input-field">
                            <select id="ddlUser" name="ddlUser">
                                <option value="0">Izaberite korisnika...</option>
                                <?php
                                    
                                    $users = dohvatiKorisnike();

                                    foreach($users as $user) :
                                ?>
                                <option value="<?= $user->id ?>"><?= $user->korisnickoIme ?></option>
                                <?php endforeach; ?>
                            </select>                           
                        </div>
                        <div class="input-field">
                            <input type="submit" value="Save" id="saveProduct" name="saveProduct" class="btn btn-success col s12"/>
                        </div>
                    </form>
                    </div>
                </div>               
            </div>                
          </div>
        </div>
      </div>