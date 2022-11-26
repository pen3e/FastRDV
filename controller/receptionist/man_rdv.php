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
        $result_day = [];
        $result_futur = [];
        $result_past = [];
    }elseif(isset($_POST['searchbyp'])){
        $current_day = date("Y-m-d");
        $string = $_POST["string"];
        $result = $receptionist -> all_rdv_bys($db_info,$string);
        $result_day = [];
        $result_futur = [];
        $result_past = [];
    }elseif(isset($_POST['searchbyd'])){
        $current_day = date('Y-m-d', strtotime($_POST["date"]));
        $result = $receptionist -> all_rdv_bydate($db_info,$current_day);
        $result_day = [];
        $result_futur = [];
        $result_past = [];
    }else{
        $current_day = date("Y-m-d");
        $result = null; 
        $result_day = $receptionist -> all_rdv_day($db_info);
        $result_futur = $receptionist -> all_rdv_futur($db_info);
        $result_past = $receptionist -> all_rdv_past($db_info);
    }

    // include views
    include("../../view/_layouts/header_boot.php");
    include("../../view/receptionist/man_rdv.php");
    include("../../view/_layouts/footer_boot.php");
