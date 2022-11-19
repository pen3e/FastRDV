<?php
    session_start();

    if(isset($_GET['id_sent'])) {
        
        // Drop a get
        $specialite = $_GET['id_sent'];

        // Include model
	    include('../../model/database_model.php');
        include('../../model/receptionist_model.php');
        
        // Database object
	    $db_info = DB_Connect($host, $dbname, $user_name, $pass);

	    // Class object
	    $receptionist = new receptionist();        

        // Launch function to add 
        $receptionist = $receptionist -> deleteplanning($db_info,$specialite);

        header("location:man_planning.php");
        exit();
        
    }