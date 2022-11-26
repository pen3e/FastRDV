<body style="background-color: #e3f2fd;">
    <div>
        <div class="header-dark">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                
                <div class="container">
                    <a class="navbar-brand" href="index_patients.php">
                    <img src="../../public/style/Pngtree—medical logo_3558939.png" alt="" class="pic">
                    </a>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">    
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse ml-3" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a class="dropdown-toggle nav-link dropdown-toggle btn btn-success" data-toggle="dropdown" aria-expanded="false" href="#">
                                <i class="fa fa-calendar" aria-hidden="true"></i> FAST RDV 
                                </a>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" role="presentation" href="rdv_patients.php"><i class="fa fa-address-card-o" aria-hidden="true"></i> Mes rendez-vous</a>
                                    <a class="dropdown-item" role="presentation" href="edit_profile.php"><i class="fa fa-cog" aria-hidden="true"></i> Modifier mes informations</a>                                </div>
                            </li>
                            <li class="ml-5">
                                <h2 class="ml-2">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <?php echo $prenom_patient, " ", $nom_patient; ?>
                                </h2>
                            </li>
                        </ul>
                        <form class="form-inline mr-auto" target="_self">
                            
                        </form>
                        
                        <a class="btn btn-light action-button" role="button" href="disconnect.php">
                            Déconnexion
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </nav>
            <div class="row ml-3" style="font-size : 12px;">
                <div class="col4 my-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Dimanche</th>
                            <th scope="col">Lundi</th>
                            <th scope="col">Mardi</th>
                            <th scope="col">Mercredi</th>
                            <th scope="col">Jeudi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $spec = $patients -> spec_avaible ($db_info);
                    if (!is_null($spec)){
                        foreach ($spec as $key =>$value){
                            echo"<tr>";
                            $specialite = $value["specialite"];
                                echo"<th scope='row'>$value[specialite]";
                            echo"</th>";
                            for($x = 0; $x < $arrlength; $x++) {  
                                // FOR DAY
                                $date = $Days[$x];
                                $check = $receptionist ->checkbydate($db_info,$date,$specialite);
                                
                                if(count($check)>0){
                                    $active = $check[0]["active"];
                                    if($active > 0) 
                                    {
                                        echo "<td class='text-success text-center'>";
                                            echo "<i class='fa fa-check' aria-hidden='true'></i>";
                                        echo "</td>";
                                    } else {
                                        echo "<td class='text-danger text-center'>";
                                            echo "<i class='fa fa-times' aria-hidden='true'></i>";
                                        echo "</td>";
                                    }
                                }
                            }
                            echo"</tr>";
                        }
                    }
                    ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>


    </div>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>