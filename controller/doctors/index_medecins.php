<?php
        session_start();
        // Check if sesssion exist
        if (!isset($_SESSION["doctors"])) {
            header("location:login_doctors.php");
            exit();
        }
        
    // Include model
	include('../../model/database_model.php');
    include('../../model/patients_model.php');
    include('../../model/receptionist_model.php');

    // Database object
	$db_info = DB_Connect($host, $dbname, $user_name, $pass);

	// Class object
	$patients = new patients();
    $receptionist = new receptionist();
    
    $Document_title = "Doctors dashboard";
    $nom =$_SESSION["nom_user"];
    $prenom = $_SESSION["prenom_user"];
    $specialite = $_SESSION["specialite_user"];
        
    if(isset($specialite)) {
        $current_day = date("Y-m-d");
        $result = $receptionist -> all_rdv_byspec($db_info,$specialite);
    }elseif(isset($_POST['searchbyp'])) {
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
    include("../../view/doctors/index_medecins.php");
    include("../../view/_layouts/footer_boot.php");