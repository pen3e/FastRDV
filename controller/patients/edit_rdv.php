<?php
        session_start();

        if(isset($_GET['id_sent'])) {
            
            //
            $id_rdv = $_GET['id_sent'];
            $id_patient = $_SESSION['id_patient'];
    
            // Include model
            include('../../model/database_model.php');
            include('../../model/patients_model.php');
            
            // Database object
            $db_info = DB_Connect($host, $dbname, $user_name, $pass);
            
            // Class object
            $patients = new patients();        
    
            // Launch function to add 
            $rdv = $patients -> rdvbypatient($db_info,$id_patient);
            $spec = $patients -> spec($db_info);
            $rdvid = $patients -> rdvid($db_info,$id_rdv);

            $id_rdv = $rdvid[0]["id_rdv"];
            $specialite = $rdvid[0]["specialite"];
            $date = $rdvid[0]["date_rdv"];
            

            $test_date = $rdvid[0]["date_rdv"];
            
            $Document_title = "Patients RDV";
            $current_day = date("Y-m-d");
            $message_erreur1 = "";
            $message_erreur2 = "";
            $message_erreur3 = "";
            $message_erreur4 = "";

            // include views
            include("../../view/_layouts/header_rdv.php");
            include("../../view/patients/rdv_edit.php");
        }