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

    if(isset($_GET['id_sent'])){
        
        $current_day = date("Y-m-d");
        $id_rdv = $_GET['id_sent'];
        $info = $receptionist -> all_rdv_by_id($db_info,$id_rdv);
        $current_date = $info[0]["date_rdv"];
        $nom = $info[0]['nom_patient'];
        $prenom = $info[0]['prenom_patient'];
        $speca = $info[0]["specialite"];

    }elseif(isset($POST['editdate'])){
        $date_rdv = date('Y-m-d', strtotime($_POST["date"]));
        $id_rdv = $_POST["id_rdv"];
        
    }


    // include views
    include("../../view/_layouts/header_boot.php");
    include("../../view/receptionist/man_rdv_edit.php");
    include("../../view/_layouts/footer_boot.php");