<body>


    <div class="container">
        <div class="row my-3">
            <div class="col-sm">
            </div>
            <div class="col-8">
                <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                    <a class="navbar-brand" href="index_receptionist.php">
                        <img src="../../public/style/Pngtree—medical logo_3558939.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    </a>
                    <a href="man_patients.php">
                        <button class="btn btn-outline-warning my-2 my-sm-0" type="" name="">
                        <i class="fa fa-users" aria-hidden="true"></i> Patients list
                        </button>
                    </a>
                    <form action="search_p.php" method="POST" class="form-inline">
                        <input class="form-control mr-sm-2" name="nom_patient" type="search" placeholder="Chercher le patient" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" name="searchbtn" type="submit" >
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </nav>
            </div>
            <div class="col-sm">
            </div>
        </div>

        <div class="row my-4">
            <div class="col-sm">
            </div>
            <div class="col-8">

            <table class="table text-center">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom et Prénom</th>
                    <th scope="col">Tel</th>
                    <th scope="col">actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $alluser = $receptionist -> allpatient ($db_info);
                if (!is_null($alluser)){
                    foreach ($alluser as $key =>$value){
                    echo"<tr>";
                        echo"<th scope='row'>$value[id_patient]</th>";
                        echo"<td>$value[nom_patient] $value[prenom_patient]</td>";
                        echo"<td>";
                            echo"<a href='mailto:".$value["email_patient"]."?subject = Admin-CDDS'><i class='fa fa-envelope' aria-hidden='true'></i></a>";
                            echo "&nbsp;";
                            echo"<a class='text-success' href='#'><i class='fa fa-phone' aria-hidden='true'></i> $value[tel_patient]</a>";
                        echo"</td>";
                        echo"<td>";
                            echo"<div class='dropdown'>";
                                echo"<button class='btn btn-warning dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                                    echo"<i class='fa fa-id-card' aria-hidden='true'></i>";
                                echo"</button>";
                                echo"<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
                                    echo"<a class='dropdown-item' href='connect_p.php?id_patient=" . $value["id_patient"] . "&nom_patient=" . $value["nom_patient"] . "&prenom_patient=" . $value["prenom_patient"] . "'>";
                                        echo"<i class='fa fa-plug' aria-hidden='true'></i> Connect";
                                    echo"</a>";
                                    echo"<a class='dropdown-item' href='del_p.php?id_patient=" . $value["id_patient"] . "'>";
                                        echo"<i class='fa fa-trash' aria-hidden='true'></i> Supprimé";
                                    echo"</a>";
                                echo"</div>";
                            echo"</div>";
                        echo"</td>";
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