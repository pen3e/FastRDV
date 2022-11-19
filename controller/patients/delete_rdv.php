<?php
    session_start();

    if(isset($_GET['id_sent'])) {
        
        // Drop a get
        $id_rdv = $_GET['id_sent'];

        // Include model
	    include('../../model/database_model.php');
        include('../../model/patients_model.php');
        
        // Database object
	    $db_info = DB_Connect($host, $dbname, $user_name, $pass);

	    // Class object
	    $patients = new patients();        

        // Launch function to add 
        $delrdv = $patients -> delrdv($db_info,$id_rdv);

        header("location:rdv_patients.php");
        exit();
    }