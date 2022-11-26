<?php
        session_start();

        if(isset($_POST["btneditrdv"])) {
            
            // Drop a post
            $id_patient = $_SESSION['id_patient'];
            $id_rdv = $_POST["id_rdv"];
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
            
            //Check if medecin is avaible
            $CheckWeek = $patients -> CheckWeek($db_info,$date_send_week,$specialite);
         
            if(count($CheckWeek)>0){
                // Launch function to convert specialite to id_planning (min)
                $search_spec = $patients -> convertspec ($db_info,$specialite);
                // Blind specialite id_planning
                $id_planning = $search_spec[0]["id_planning"];
                // Launch function to edit 
                $editrdv = $patients -> editrdv($db_info,$id_rdv,$id_planning,$date_rdv);
                
                $var = "3";
                header("location:rdv_patients.php");
                exit();
            } else
            {
                $message_erreur1 = "<i class='fa fa-exclamation-circle' aria-hidden='true'></i> ";
                $message_erreur2 = " Le medécin ne sera pas disponible * ";
                $message_erreur3 = " <a href='index_patients.php'><i class='fa fa-calendar' aria-hidden='true'></i> ";
                $message_erreur4 = " Consulter le planning <a> ";    
                $current_day = date("Y-m-d");
                
                // Launch function to fetch
                $rdv = $patients -> rdvbypatient($db_info,$id_patient);
                $spec = $patients -> spec ($db_info);
                $rdvid = $patients -> rdvid($db_info,$id_rdv);

                $id_rdv = $rdvid[0]["id_rdv"];
                $specialite = $rdvid[0]["specialite"];
                $date = $rdvid[0]["date_rdv"];
                
                // include views
                include("../../view/_layouts/header_rdv.php");
                include("../../view/patients/rdv_edit.php");
            }
        }