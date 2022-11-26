<?php
    session_start();

    if(isset($_POST["btnaddrdv"])) {
        
        // Drop a post
        $id_patient = $_SESSION['id_patient'];
        $specialite = $_POST["specialite"];
        $date_rdv = date('Y-m-d', strtotime($_POST["date"]));
        
        // Include model
	    include('../../model/database_model.php');
        include('../../model/patients_model.php');
        
        // Database object
	    $db_info = DB_Connect($host, $dbname, $user_name, $pass);

	    // Class object
	    $patients = new patients();      

        // Weekname of sended date
        $date_send_timestamp = strtotime($_POST["date"]);
        $date_send_week = date ('l', $date_send_timestamp);

        // Set something variable
        $current_day = date("Y-m-d");
        $Document_title = "Patients FASTRDV";

        $CheckWeek = $patients -> CheckWeek($db_info,$date_send_week,$specialite);
        
        if(count($CheckWeek)>0){
            // Launch function to convert specialite to id_planning (min)
            $search_spec = $patients -> convertspec ($db_info,$specialite);
            // Blind specialite id_planning
            $id_planning = $search_spec[0]["id_planning"];
            // Launch function to add 
            $newrdv = $patients -> newrdv($db_info,$id_patient,$id_planning,$date_rdv);
            
            header("location:rdv_patients.php");
            exit();
        } else
        {   
            $message_erreur1 = " <i class='fa fa-exclamation-circle' aria-hidden='true'></i> ";
            $message_erreur2 = " Le medécin ne sera pas disponible * ";
            $message_erreur3 = " <a href='index_patients.php'><i class='fa fa-calendar' aria-hidden='true'></i> ";
            $message_erreur4 = " Consulter le planning <a> ";
            
            // Launch function to fetch
            $rdv = $patients -> rdvbypatient($db_info,$id_patient);
            $spec = $patients -> spec ($db_info);
        
            // include views
            include("../../view/_layouts/header_rdv.php");
            include("../../view/patients/rdv_patients.php");
        }

    }