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
                    <a href="man_planning.php">
                        <button class="btn btn-outline-info my-2 my-sm-0" type="" name="">
                        <i class="fa fa-calendar" aria-hidden="true"></i> Planning
                        </button>
                    </a>
                    <a href="man_affectation.php">
                        <button class="btn btn-outline-warning my-2 my-sm-0" type="" name="">
                        <i class="fa fa-users" aria-hidden="true"></i> Affectations
                        </button>
                    </a>
                    <form action="addspec.php" method="post" class="form-inline">
                        <input class="form-control mr-sm-2" name="specialite" type="text" placeholder="Nouvelle spécialité" aria-label="Search" required>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="addspec">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                        </button>
                    </form>
                </nav>
            </div>
            <div class="col-sm">
            </div>
        </div>


        <div class="row my-5">
            <div class="col-sm">

            </div>
            <div class="col-sm">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">Spécialité</th>
                        <th scope="col">Médecin</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $spec = $patients -> allspec ($db_info);
                if (!is_null($spec)){
                    foreach ($spec as $key =>$value){
                        echo "<tr>";
                            echo "<th>$value[specialite]</th>";
                                echo "<td>";
                                    echo "<div class='btn-group'>";
                            // Check if affected to medecin
                            $specialite = $value["specialite"];
                            $checkmedecin = $receptionist -> allinfospec($db_info,$specialite);
                            $statusmedecin = $checkmedecin[0]["id_user"];
                            if ($statusmedecin > 0) {
                                    $info_user = $receptionist -> infouserbyid($db_info,$statusmedecin);
                                    $Nom_user = $info_user[0]["nom_user"];
                                    $Prenom_user = $info_user[0]["prenom_user"];
                                        echo "<button class='btn btn-primary btn-sm dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                                            echo "<i class='fa fa-user-md' aria-hidden='true'></i> $Nom_user $Prenom_user ";
                                        echo "</button>";
                            }else{
                                echo "<button class='btn btn-secondary btn-sm dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                                    echo "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Aucun";
                                echo "</button>";
                            }
                                echo "<div class='dropdown-menu'>";
                                    $allmedecins = $receptionist -> notallmedecins($db_info,$statusmedecin);
                                    foreach ($allmedecins as $key =>$value){
                                        echo "<a class='dropdown-item' href='affectation_add.php?id_sent=" . $value["id_user"] . "&specialite=" .$specialite."'>";
                                            echo "<i class='fa fa-user-md' aria-hidden='true'></i> $value[nom_user] $value[prenom_user]";
                                        echo "</a>";
                                    }
                                    echo "<a class='dropdown-item' href='affectation_add.php?id_sent=0&specialite=" .$specialite."'>";
                                        echo "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Aucun";
                                    echo "</a>";
                                echo "</div>";
                            echo "</div>";
                        echo"</tr>";
                    }
                }
                ?>

                </tbody>
                </table>
            </div>
            <div class="col-sm">

            </div>
        </div>
    </div>
</body>