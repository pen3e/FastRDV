<?php
        session_start();

        // Check if sesssion exist
        if (!isset($_SESSION["Checked"])) {
            header("location:login_patients.php");
            exit();
        }

        $id_patient = $_SESSION['id_patient'];
        $nom_patient = $_SESSION['nom_patient'];
        $prenom_patient = $_SESSION['prenom_patient'];

        $Document_title = "Patients RDV";

        // Include model
	    include('../../model/database_model.php');
        include('../../model/patients_model.php');

        // Database object
	    $db_info = DB_Connect($host, $dbname, $user_name, $pass);

	    // Class object
	    $patients = new patients();

        // Launch function to add 
        $profile = $patients -> profilepatient($db_info,$id_patient);
        
        // Set some variables
        $id_patient = $profile[0]["id_patient"];
        $nom_patient = $profile[0]["nom_patient"];
        $prenom_patient = $profile[0]["prenom_patient"];
        $dn_patient = $profile[0]["dn_patient"];
        $adresse_patient = $profile[0]["adresse_patient"];
        $tel_patient = $profile[0]["tel_patient"];
        $email_patient = $profile[0]["email_patient"];

        $Document_title = "Edit Profile";
        
        // include views
        include("../../view/_layouts/header_doctors1.php");
        include("../../view/patients/login_edit.php");