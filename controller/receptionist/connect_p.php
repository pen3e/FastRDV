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

    if(isset($_GET['id_patient'])) {

        $id_patient = $_GET['id_patient'];
        $nom_patient = $_GET['nom_patient'];
        $prenom_patient = $_GET['prenom_patient'];

        // destroy an admin session to connect
        
        //session_destroy();
        
        // Create a variable _SESSION
        $_SESSION["Checked"]="true";
        $_SESSION["id_patient"]= $id_patient;
        $_SESSION["nom_patient"]= $nom_patient;
        $_SESSION["prenom_patient"]= $prenom_patient;
               
        
        header("location:../patients/index_patients.php");
        exit();
    }

