<?php
    session_start();
    // Include model
	include('../../model/database_model.php');
    include('../../model/patients_model.php');
    include('../../model/receptionist_model.php');



    if(isset($_GET['id_patient'])) {

        $id_patient = $_GET['id_patient'];
            // Database object
	    $db_info = DB_Connect($host, $dbname, $user_name, $pass);

	    // Class object
	    $patients = new patients();
        $receptionist = new receptionist();
               
        $del_p = $receptionist -> delete_p($db_info,$id_patient);

        header("location:../receptionist/man_patients.php");
        exit();
    }