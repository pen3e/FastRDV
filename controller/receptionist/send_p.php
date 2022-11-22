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


    if(isset($_POST['sendmail'])){

        $email_p = $_POST["email_p"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        $sendmail = $receptionist -> send_bymail ($email_p,$subject,$message);

        echo "$sendmail";
        $mail = $email_p;

    }elseif(isset($_GET['id_patient'])){
        $id_patient = $_GET["id_patient"];
        $result = $receptionist -> search_p_byid ($db_info,$id_patient);
        $mail= $result[0]["email_patient"];
    }

    // include views
    include("../../view/_layouts/header_boot.php");
    include("../../view/receptionist/man_rdv_send.php");
    include("../../view/_layouts/footer_boot.php");