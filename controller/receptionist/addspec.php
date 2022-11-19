<?php
    session_start();

    if(isset($_POST["addspec"])) {
        // Drop a post
        $specialite = $_POST["specialite"];

        $Days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday");
        $arrlength = count($Days);

        // Include model
	    include('../../model/database_model.php');
        include('../../model/receptionist_model.php');
        
        // Database object
	    $db_info = DB_Connect($host, $dbname, $user_name, $pass);

        $receptionist = new receptionist();

        for($x = 0; $x < $arrlength; $x++) {
            $date_planning = $Days[$x];
            $add = $receptionist ->addplanning($db_info,$date_planning,$specialite);
        }
        
        header("location:man_planning.php");
        exit();
    }