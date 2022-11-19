<body>
    <div>
        <div class="header-dark">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                
                <div class="container">
                    <a class="navbar-brand" href="index_receptionist.php">
                    <img src="../../public/style/Pngtree—medical logo_3558939.png" alt="" class="pic">
                    </a>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">    
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse ml-3" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a class="dropdown-toggle nav-link dropdown-toggle btn btn-success" data-toggle="dropdown" aria-expanded="false" href="#">
                                <i class="fa fa-cogs" aria-hidden="true"></i> FAST RDV MANAGER</a>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" role="presentation" href="man_patients.php"><i class="fa fa-user" aria-hidden="true"></i>  Gestions des patients</a>
                                    <a class="dropdown-item" role="presentation" href="man_medecins.php"><i class="fa fa-user-md" aria-hidden="true"></i>  Gestions des médecins</a>
                                    <a class="dropdown-item" role="presentation" href="man_planning.php"><i class="fa fa-calendar" aria-hidden="true"></i> Gestion du planning / spécialité</a>
                                    <a class="dropdown-item" role="presentation" href="man_rdv.php"><i class="fa fa-address-book" aria-hidden="true"></i> Prise de rdv </a>
                                    <a class="dropdown-item" role="presentation" href="edit_profile.php"><i class="fa fa-cog" aria-hidden="true"></i> Modifier mes informations</a>
                                </div>
                            </li>
                            <li class="ml-5">
                                <h2>
                                    <i class="fa fa-bolt" aria-hidden="true"></i>
                                    <?php echo $prenom_user, " ", $nom_user; ?>
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
     
        </div>
    </div>

 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>