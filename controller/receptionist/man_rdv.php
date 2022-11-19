<?php
    session_start();
        
    // Include model
	include('../../model/database_model.php');
    include('../../model/patients_model.php');
    include('../../model/receptionist_model.php');

    // Database object
	$db_info = DB_Connect($host, $dbname, $user_name, $pass);

	// Class object
	$patients = new patients();
    $receptionist = new receptionist();


    $Document_title = "Prise de rdv";
    
    if(isset($_GET['spec'])){
        $current_day = date("Y-m-d");
        $spec = $_GET['spec'];
        $result = $receptionist -> all_rdv_byspec($db_info,$spec);
    }elseif(isset($_POST['searchbyp'])){
        $current_day = date("Y-m-d");
        $string = $_POST["string"];
        $result = $receptionist -> all_rdv_bys($db_info,$string);
    }elseif(isset($_POST['searchbyd'])){
        $current_day = date('Y-m-d', strtotime($_POST["date"]));
        $result = $receptionist -> all_rdv_bydate($db_info,$current_day);
    }else{
        $current_day = date("Y-m-d");
        $result = $receptionist -> all_rdv ($db_info);
    }

    // include views
    include("../../view/_layouts/header_boot.php");
    include("../../view/receptionist/man_rdv.php");
    include("../../view/_layouts/footer_boot.php");
