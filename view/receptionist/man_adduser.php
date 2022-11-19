<body>


    <div class="container">
        <div class="row my-1">
            <div class="col-sm"></div>
            <div class="col-8">
                <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                    <a class="navbar-brand" href="index_receptionist.php">
                        <img src="../../public/style/Pngtree—medical logo_3558939.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    </a>
                    <a href="man_medecins.php">
                        <button class="btn btn-outline-warning my-2 my-sm-0" type="" name="">
                        <i class="fa fa-user-md" aria-hidden="true"></i> Médecins list
                        </button>
                    </a>
                    <a href="man_adduser.php">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="" name="">
                        <i class="fa fa-user-md" aria-hidden="true"></i> Add user
                        </button>
                    </a>
                    <form action="search_m.php" method="POST" class="form-inline">
                        <input class="form-control mr-sm-2" name="nom_users" type="search" placeholder="Chercher le medecins" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" name="searchbtn" type="submit" >
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </nav>
            </div>
            <div class="col-sm"></div>
        </div>
        <div class="row">
            <div class="col-sm"></div>
            <div class="col-4">
            <div class="card my-2">
                    <h5 class="card-header"><i class="fa fa-user-plus" aria-hidden="true"></i> Ajouter un nouvel utilisateur</h5>
                    <div class="card-body">
                        <p class="card-text">

                        <form action="man_adduser.php" method="POST">
                        
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                        </div>
                        <input name="nom_user" type="text" class="form-control" value ="" placeholder="Nom" aria-describedby="basic-addon1" required>
                        </div>
                        </p>

                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                        </div>
                        <input name="prenom_user" type="text" class="form-control" value ="" placeholder="Prenom" aria-describedby="basic-addon1" required>
                        </div>

                        <div class="input-group mb-3">
                            <input class="form-control" type="date" name="birth" id="" required>
                        </div>
                        
                        <div class="input-group mb-3">
                        <select name="specialite_user" class="custom-select">
                            <option value="">Choisir spécialité</option>
                        <?php
                            $spec = $patients -> allspec ($db_info);
                            if (!is_null($spec)){
                                foreach ($spec as $key =>$value){
                                    echo "<option value='$value[specialite]'>$value[specialite]</option>";
                                }
                            }
                        ?>
                        </select>
                        </div>
                        
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Adresse</span>
                        </div>
                        <input name="adresse_user" type="text" class="form-control" value ="" placeholder="" aria-describedby="basic-addon1" required>
                        </div>

                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
                        </div>
                        <input name="tel_user" type="text" class="form-control" value ="" placeholder="" aria-describedby="basic-addon1" required>
                        </div>

                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        </div>
                        <input name="email_user" type="text" class="form-control" value ="" placeholder="" aria-describedby="basic-addon1" required>
                        </div>

                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        </div>
                        <input name="password" type="password" class="form-control" value ="" placeholder="" aria-describedby="basic-addon1" required>
                        </div>
                        
                        <div class="input-group mb-3">
                        <select name="type_user" class="custom-select">
                        <option value="1">Médecins</option>
                        <option value="2">Réceptionist</option>
                        </select>
                        </div>
                        
                        </p>
                        <div class="text-right">
                        <button name="btnadd" type="submit" class="btn btn-success">Ajouter</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm"></div>
        </div>
</body>