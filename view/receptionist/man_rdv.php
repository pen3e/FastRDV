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
                    <a href="man_rdv.php">
                        <button class="btn btn-outline-info my-2 my-sm-0" type="" name="">
                        <i class="fa fa-search" aria-hidden="true"></i> Gestionnaire de rendez-vous
                        </button>
                    </a>
                    <form action="man_rdv.php" method="post" class="form-inline">
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
                                        echo"<a class='dropdown-item' href='man_rdv.php?spec=".$value["specialite"]."'> $value[specialite] ";
                                        $spe = $value["specialite"];
                                        $count_day = $receptionist -> count_rdvbyday($db_info,$spe);
                                        $count_past = $receptionist -> count_rdvbypast($db_info,$spe);
                                        $count_futur = $receptionist -> count_rdvbyfutur($db_info,$spe);
                                        $cd_futur= $count_futur[0]["countfutur"];
                                        $cd_past= $count_past[0]["countpast"];
                                        $cd_today= $count_day[0]["countday"];
                                        echo "<span class='badge badge-warning d-inline'>$cd_today</span>";
                                        echo " <span class='badge badge-success d-inline'>$cd_futur</span>";
                                        echo" <span class='badge badge-secondary d-inline'>$cd_past</span>";
                                        
                                        echo "</a>";
                                    }
                                }
                                ?>
                            </div>
                            </div>
                    </div>
                </div>


                <div class="card my-2 ">
                    <h5 class="card-header"><i class="fa fa-search" aria-hidden="true"></i></h5>
                    <div class="card-body">
                        <h5 class="card-title">Chercher par patient :</h5>
                        <p class="card-text">
                        <form action="man_rdv.php" method="POST">
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                        </div>
                        
                        <input name="string" type="text" class="form-control" value ="" placeholder="nom du patient" aria-describedby="basic-addon1">
                        </div>
                        </p>
                        <button name="searchbyp" class="btn btn-primary float-right">Chercher <i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-9">
            <div class="card text-center w-4" >
                    <div class="card-body">
                    <?php
                    if(!is_null($result)){
                        foreach ($result as $key =>$value){
                            echo "<span class='badge badge-primary'> votre recherche :</span>";
                            echo "<ul class='list-group'>";
                                echo "<li class='list-group-item'>";
                                echo "<i class='fa fa-user-circle' aria-hidden='true'></i> $value[nom_patient] $value[prenom_patient]  ";
                                echo "<i class='fa fa-calendar' aria-hidden='true'></i>";
                                echo "<a href='man_rdv_edit.php?id_sent=".$value['id_rdv']."' class='text-danger'> $value[date_rdv] <i class='fa fa-pencil-square-o' aria-hidden='true'></i> </a>";
                                echo "<a href='send_p.php?id_patient=" .$value["id_patient"]."' class='text-info'><i class='fa fa-envelope' aria-hidden='true'></i> </a>";
                                echo "<a href='' class='text-success'><i class='fa fa-phone-square' aria-hidden='true'></i> $value[tel_patient] </a>";
                                echo "<i class='fa fa-building' aria-hidden='true'></i> $value[specialite]";
                                echo "</li>";
                            echo "</ul>";
                        }
                    }
                    ?>
                    <span class='badge badge-warning'> Aujourd'hui</span>
                    <ul class="list-group">
                        <?php 
                        if (count($result_day)>0){
                            foreach ($result_day as $key =>$value){
                                echo "<li class='list-group-item'>";
                                echo "<i class='fa fa-user-circle' aria-hidden='true'></i> $value[nom_patient] $value[prenom_patient]  ";
                                echo "<i class='fa fa-calendar' aria-hidden='true'></i>";
                                echo "<a href='man_rdv_edit.php?id_sent=".$value['id_rdv']."' class='text-danger'> $value[date_rdv] <i class='fa fa-pencil-square-o' aria-hidden='true'></i> </a>";
                                echo "<a href='send_p.php?id_patient=" .$value["id_patient"]."' class='text-info'><i class='fa fa-envelope' aria-hidden='true'></i> </a>";
                                echo "<a href='' class='text-success'><i class='fa fa-phone-square' aria-hidden='true'></i> $value[tel_patient] </a>";
                                echo "<i class='fa fa-building' aria-hidden='true'></i> $value[specialite]";
                                echo "</li>";
                            }
                        }else{
                            echo "<li class='list-group-item'> Aucun rdv enregistré pour aujourd'hui ..</li>";
                        }
                        ?>
                    </ul>
                    <span class='badge badge-success'> Prochain </span>
                    <ul class="list-group">
                        <?php 
                        if (count($result_futur)>0){
                            foreach ($result_futur as $key =>$value){
                                echo "<li class='list-group-item'>";
                                echo "<i class='fa fa-user-circle' aria-hidden='true'></i> $value[nom_patient] $value[prenom_patient]  ";
                                echo "<i class='fa fa-calendar' aria-hidden='true'></i>";
                                echo "<a href='man_rdv_edit.php?id_sent=".$value['id_rdv']."' class='text-danger'> $value[date_rdv] <i class='fa fa-pencil-square-o' aria-hidden='true'></i> </a>";
                                echo "<a href='send_p.php?id_patient=" .$value["id_patient"]."' class='text-info'><i class='fa fa-envelope' aria-hidden='true'></i> </a>";
                                echo "<a href='' class='text-success'><i class='fa fa-phone-square' aria-hidden='true'></i> $value[tel_patient] </a>";
                                echo "<i class='fa fa-building' aria-hidden='true'></i> $value[specialite]";
                                echo "</li>";
                            }
                        }else{
                            echo "<li class='list-group-item'> Aucun rdv enregistré au futur ..</li>";
                        }
                        ?>
                    </ul>
                    <span class='badge badge-secondary'>Anciens rdv </span>
                    <ul class="list-group">
                        <?php 
                        if (count($result_past)>0){
                            foreach ($result_past as $key =>$value){
                                echo "<li class='list-group-item'>";
                                echo "<i class='fa fa-user-circle' aria-hidden='true'></i> $value[nom_patient] $value[prenom_patient]  ";
                                echo "<i class='fa fa-calendar' aria-hidden='true'></i>";
                                echo "<a href='man_rdv_edit.php?id_sent=".$value['id_rdv']."' class='text-danger'> $value[date_rdv] <i class='fa fa-pencil-square-o' aria-hidden='true'></i> </a>";
                                echo "<a href='send_p.php?id_patient=" .$value["id_patient"]."' class='text-info'><i class='fa fa-envelope' aria-hidden='true'></i> </a>";
                                echo "<a href='' class='text-success'><i class='fa fa-phone-square' aria-hidden='true'></i> $value[tel_patient] </a>";
                                echo "<i class='fa fa-building' aria-hidden='true'></i> $value[specialite]";
                                echo "</li>";
                            }
                        }else{
                            echo "<li class='list-group-item'> Aucun rdv enregistré au futur ..</li>";
                        }
                        ?>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>