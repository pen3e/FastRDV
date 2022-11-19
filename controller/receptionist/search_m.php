<?php
    session_start();

    if(isset($_POST['searchbtn'])) {
        
        // Drop a post
        $nom_user = $_POST["nom_users"];
        
        // Include model
        include('../../model/database_model.php');
        include('../../model/patients_model.php');
        include('../../model/receptionist_model.php');

        // Database object
	    $db_info = DB_Connect($host, $dbname, $user_name, $pass);

	    // Class object
	    $patients = new patients();
        $receptionist = new receptionist();


        $Document_title = "Manager Médecins";

        // include views
        include("../../view/_layouts/header_boot.php");
        include("../../view/receptionist/man_medecins_search.php");
        include("../../view/_layouts/footer_boot.php");
        
    }