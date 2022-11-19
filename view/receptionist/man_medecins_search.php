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
                    <a href="man_medecins.php">
                        <button class="btn btn-outline-warning my-2 my-sm-0" type="" name="">
                        <i class="fa fa-user-md" aria-hidden="true"></i> Médecins list
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
                    <th scope="col">Nom et Prénom</th>
                    <th scope="col">Contact</th>
                    <th scope="col">actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $search_m = $receptionist -> search_m ($db_info,$nom_user);
                if (!is_null($search_m)){
                    foreach ($search_m as $key =>$value){
                    echo"<tr>";
                        echo"<td>Dr $value[nom_user] $value[prenom_user]</td>";
                        echo"<td>";
                            echo"<a href='mailto:".$value["email_user"]."?subject = Admin-CDDS'><i class='fa fa-envelope' aria-hidden='true'></i></a>";
                            echo "&nbsp;";
                            echo"<a class='text-success' href='#'><i class='fa fa-phone' aria-hidden='true'></i> $value[tel_user]</a>";
                        echo"</td>";
                        echo"<td>";
                            echo"<div class='dropdown'>";
                                echo"<button class='btn btn-warning dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                                    echo"<i class='fa fa-id-card' aria-hidden='true'></i>";
                                echo"</button>";
                                echo"<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
                                    echo"<a class='dropdown-item' href='connect_m.php?id_user=" . $value["id_user"] . "&nom_user=" . $value["nom_user"] . "&prenom_user=" . $value["prenom_user"] . "'>";
                                        echo"<i class='fa fa-plug' aria-hidden='true'></i> Connect";
                                    echo"</a>";
                                    echo"<a class='dropdown-item' href='del_m.php?id_user=" . $value["id_user"] . "'>";
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