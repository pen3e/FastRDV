<body>
    <div class="container">
        <div class="row my-3">
            <div class="col-sm">
            </div>
            <div class="col-12">
                <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                    <a class="navbar-brand" href="index_receptionist.php">
                        <img src="../../public/style/Pngtree—medical logo_3558939.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    </a>
                    <a href="index_medecins.php">
                        <button class="btn btn-outline-info my-2 my-sm-0" type="" name="">
                        <i class="fa fa-home" aria-hidden="true"></i> Dashboard
                        </button>
                    </a>
                    <form action="index_medecins.php" method="post" class="form-inline">
                        <input class="form-control mr-sm-2" name="date" type="date" value="<?php echo $current_day; ?>" placeholder="" aria-label="Search" required>
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="searchbyd">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </nav>
            </div>
            <div class="col-sm">
            </div>
        </div>
        <div class="row">
            <div class="col-3">

                <div class="card text-center w-4" >
                    <div class="card-body">
                            
                            <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <i class="fa fa-building" aria-hidden="true"></i> Par spécialite
                            </button>
                            <div class="dropdown-menu">
                                <?php
                                $spec = $patients -> allspec ($db_info);
                                if (!is_null($spec)){
                                    foreach ($spec as $key =>$value){
                                        echo"<a class='dropdown-item' href='index_medecins.php?spec=".$value["specialite"]."'>$value[specialite]</a>";
                                    }
                                }
                                ?>
                            </div>
                            </div>
                    </div>
                </div>


                <div class="card my-2">
                    <h5 class="card-header"><i class="fa fa-search" aria-hidden="true"></i></h5>
                    <div class="card-body">
                        <h5 class="card-title">Chercher par patient :</h5>
                        <p class="card-text">
                        <form action="index_medecins.php" method="POST">
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                        </div>
                        
                        <input name="string" type="text" class="form-control" value ="" placeholder="nom du patient" aria-describedby="basic-addon1">
                        </div>
                        </p>
                        <button name="searchbyp" class="btn btn-primary">Chercher <i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-9">
            <div class="card text-center w-4" >
                    <div class="card-body">
                            
                    <ul class="list-group">
                        
                        <?php 
                        
                        if (!is_null($result)){
                            foreach ($result as $key =>$value){
                                echo "<li class='list-group-item'>";
                                echo "<i class='fa fa-user-circle' aria-hidden='true'></i> $value[nom_patient] $value[prenom_patient]  ";
                                echo "<i class='fa fa-calendar' aria-hidden='true'></i>";
                                echo "<a href='connect_p.php?id_patient=" . $value["id_patient"] . "&nom_patient=" . $value["nom_patient"] . "&prenom_patient=" . $value["prenom_patient"] . "' class='text-danger'> $value[date_rdv] <i class='fa fa-pencil-square-o' aria-hidden='true'></i> </a>";
                                echo "<a href='mailto:".$value["email_patient"]."?subject = Admin-CDDS' class='text-info'><i class='fa fa-envelope' aria-hidden='true'></i> </a>";
                                echo "<a href='' class='text-success'><i class='fa fa-phone-square' aria-hidden='true'></i> $value[tel_patient] </a>";
                                echo "<i class='fa fa-building' aria-hidden='true'></i> $value[specialite]";
                                echo "</li>";
                            }
                        }
                        ?>
                        
                    </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>