<div class="content">
        <div class="container-fluid">
          <div class="row">
          
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Users</h4>
                    </div>
                    <div class="card-body table-responsive">

                    <table class="table table-hover">

                        <thead class="text-warning">
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Active</th>
                            <th>ID Role</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>

                        <tbody id="users">

                          <?php
                            
                            include "models/admin/users/functions.php";

                            $users = dohvatiKorisnike();
                            foreach($users as $user) :

                          ?>
                          <tr>
                            <td><?= $user->idKorisnik ?></td>
                            <td><?= $user->ime ?></td>
                            <td><?= $user->prezime ?></td>
                            <td><?= $user->korisnickoIme ?></td>
                            <td><?= $user->email ?></td>
                            <td><?= $user->lozinka ?></td>
                            <td><?= $user->aktivan ?></td>
                            <td><?= $user->idUloga ?></td>
                            <td><a href="#" class="update-user" data-id="<?= $user->idKorisnik ?>">Edit</a></td>
                            <td><a href="#" class="delete-user" data-id="<?= $user->idKorisnik ?>">Delete</a></td>
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
                        <h4 class="card-title" id="form-title">Add User</h4>
                    </div>
                    <div class="card-body table-responsive">

                    <form id="form">
                        <input type="hidden" id="hdnId"/>

                        <div class="input-field">
                            <input type="text" id="first_name" name="first_name" placeholder="First Name" class="validate">
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field">
                            <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="validate">
                            <label for="last_name">Last Name</label>
                        </div>
                        <div class="input-field">
                            <input type="text" id="username" name="username" placeholder="Username" class="validate">
                            <label for="username">Username</label>
                        </div>
                        <div class="input-field">
                            <input type="text" id="email" name="email" placeholder="Email" class="validate">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field">
                            <input type="text" id="password" name="password" placeholder="Password" class="validate">
                            <label for="password">Password</label>
                        </div>                
                        <div class="input-field">
                            <select id="ddlRole" name="ddlRole">
                                <option value="0">Izaberite ulogu...</option>
                                <?php
                                    
                                    $roles = dohvatiUloge();

                                    foreach($roles as $role) :
                                ?>
                                <option value="<?= $role->idUloga ?>"><?= $role->naziv ?></option>
                                <?php endforeach; ?>
                            </select>                           
                        </div>
                        <div class="input-field">                                                       
                            <label for="active">Active (Yes/No):<input type="checkbox" style="opacity: 1;" id="active" name="active" class="validate"></label>
                        </div>
                        
                        <br/><br/>
                       
                        <div class="input-field">
                            <input type="button" value="Save" id="saveUser" class="btn btn-success col s12"/>
                        </div>   
                    </form>

                    </div>
                </div>
                
            </div>                
          </div>
        </div>
      </div>