<?php
    session_start();




    if(isset($_GET['id_user'])) {

        $id_user = $_GET['id_user'];
            // Include model
	include('../../model/database_model.php');
    include('../../model/patients_model.php');
    include('../../model/receptionist_model.php');
            // Database object
	    $db_info = DB_Connect($host, $dbname, $user_name, $pass);

	    // Class object
	    $patients = new patients();
        $receptionist = new receptionist();
               
        $del_p = $receptionist -> delete_m($db_info,$id_user);

        header("location:../receptionist/man_medecins.php");
        exit();

    }