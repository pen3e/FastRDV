<?php
        // Include model
	include('../../model/database_model.php');
        include('../../model/patients_model.php');
        include('../../model/receptionist_model.php');

        // Database object
	$db_info = DB_Connect($host, $dbname, $user_name, $pass);

	// Class object
	$patients = new patients();
        $receptionist = new receptionist();

        $Document_title = "Manager - Planning";

        $Days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday");
        $arrlength = count($Days);

        // include views
        include("../../view/_layouts/header_boot.php");
        include("../../view/receptionist/man_planning.php");
        include("../../view/_layouts/footer_boot.php");
