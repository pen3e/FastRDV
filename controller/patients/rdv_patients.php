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

        $current_day = date("Y-m-d");

        $Document_title = "Patients FASTRDV";
        $message_erreur1 = "";
        $message_erreur2 = "";
        $message_erreur3 = "";
        $message_erreur4 = "";

        // Include model
	    include('../../model/database_model.php');
        include('../../model/patients_model.php');

        // Database object
	    $db_info = DB_Connect($host, $dbname, $user_name, $pass);

	    // Class object
	    $patients = new patients();

        // Launch function to fetch
        $rdv = $patients -> rdvbypatient($db_info,$id_patient);
        $spec = $patients -> spec ($db_info);
        
        // include views
        include("../../view/_layouts/header_rdv.php");
        include("../../view/patients/rdv_patients.php");
        