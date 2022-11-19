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
    </div>
    <div class="container">
        
        <table class="table table-bordered text-center">
            <thead>
                <tr class="row m-0">
                    <th class="d-inline-block col-2">#</th>
                    <th class="d-inline-block col-2">Dimanche</th>
                    <th class="d-inline-block col-2">Lundi</th>
                    <th class="d-inline-block col-2">Mardi</th>
                    <th class="d-inline-block col-2">Mercredi</th>
                    <th class="d-inline-block col-2">Jeudi</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $spec = $patients -> allspec ($db_info);
                if (!is_null($spec)){
                    foreach ($spec as $key =>$value){
                        echo "<tr class='row m-0'>";
                            echo "<th class='d-inline-block col-2'> ";
                            // Check if affected to medecin
                            $specialite = $value["specialite"];
                            $checkmedecin = $receptionist -> allinfospec($db_info,$specialite);
                            $statusmedecin = $checkmedecin[0]["id_user"];
                            if ($statusmedecin > 0) { 
                                echo "<a class='text-primary' href='man_affectation.php?id_sent=".$value["specialite"]."'><i class='fa fa-user' aria-hidden='true'></i></i></a>";
                            }else{
                                echo "<a class='text-warning' href='man_affectation.php?id_sent=".$value["specialite"]."'><i class='fa fa-user' aria-hidden='true'></i></i></a>";
                            }
                                echo " $value[specialite] <a class='text-danger' href='delete_planning.php?id_sent=".$value["specialite"]."'><i class='fa fa-trash-o' aria-hidden='true'></i></a>";
                            echo "</th>";
                        for($x = 0; $x < $arrlength; $x++) {  
                            // FOR DAY
                            $date = $Days[$x];
                            $check = $receptionist ->checkbydate($db_info,$date,$specialite);
                            
                            if(count($check)>0){
                                $active = $check[0]["active"];
                                if($active > 0) 
                                {
                                echo "<td class='d-inline-block col-2'>";
                                    echo "<div class='dropdown'>";
                                        echo "<button type='button' class='btn btn-success btn-sm dropdown-toggle' data-toggle='dropdown'>";
                                            echo "<i class='fa fa-check-square' aria-hidden='true'></i>";
                                        echo "</button>";
                                        echo "<div class='dropdown-menu'>";
                                            echo "<a class='dropdown-item' href='disable_planning.php?id_sent=".$check[0]["id_planning"]."'>";
                                                echo "<i class='fa fa-window-close' aria-hidden='true'></i> Disable";
                                            echo "</a>";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</td>";
                                } else {
                                    echo "<td class='d-inline-block col-2'>";
                                        echo "<div class='dropdown'>";
                                            echo "<button type='button' class='btn btn-secondery btn-sm dropdown-toggle' data-toggle='dropdown'>";
                                                echo "<i class='fa fa-window-close' aria-hidden='true'></i>";
                                            echo "</button>";
                                            echo "<div class='dropdown-menu'>";
                                                echo "<a class='dropdown-item' href='enable_planning.php?id_sent=".$check[0]["id_planning"]."'>";
                                                    echo "<i class='fa fa fa-check-square' aria-hidden='true'></i> Enable";
                                                echo "</a>";
                                            echo "</div>";
                                        echo "</div>";
                                    echo "</td>";  
                                }
                            } else
                            {   

                            }
                        };
                            // END FOR DAY


                        echo "</tr>";
                    }
                  } 
                ?>

            </tbody>
        </table>
        

    </div>
</body>