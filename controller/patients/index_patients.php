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
        
        // Include model
	    include('../../model/database_model.php');
        include('../../model/patients_model.php');
        include('../../model/receptionist_model.php');

        // Database object
	    $db_info = DB_Connect($host, $dbname, $user_name, $pass);

	    // Class object
	    $patients = new patients();
        $receptionist = new receptionist();

        $Days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday");
        $arrlength = count($Days);

        $Document_title = "Patients home";


        // include views
        include("../../view/_layouts/header_patients.php");
        include("../../view/patients/index_patients.php");