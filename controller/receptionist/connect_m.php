<?php
    session_start();
    // Include model
	include('../../model/database_model.php');
    include('../../model/patients_model.php');
    include('../../model/receptionist_model.php');

    // Database object
	$db_info = DB_Connect($host, $dbname, $user_name, $pass);

	// Class object
	$patients = new patients();
    $receptionist = new receptionist();

    if(isset($_GET['id_user'])) {

        $id_user = $_GET['id_user'];
        $nom_user = $_GET['nom_user'];
        $prenom_user = $_GET['prenom_user'];
        $specialite_user = $_GET['specialite_user'];

        // destroy an admin session to connect
        
        //session_destroy();
        
        // Create a variable _SESSION
        $_SESSION["doctors"]="true";
        $_SESSION["id_user"]= $id_user;
        $_SESSION["nom_user"]= $nom_user;
        $_SESSION["prenom_user"]= $prenom_user;
        $_SESSION["specialite_user"] = $specialite_user;
               
        
        header("location:../doctors/index_medecins.php");
        exit();
    }

