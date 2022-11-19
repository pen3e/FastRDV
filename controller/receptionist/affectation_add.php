<?php
        session_start();

        if(isset($_GET['id_sent'])) {
            
            // Drop a get
            $id_user = $_GET['id_sent'];
            $specialite = $_GET['specialite'];
    
            // Include model
            include('../../model/database_model.php');
            include('../../model/receptionist_model.php');
            
            // Database object
            $db_info = DB_Connect($host, $dbname, $user_name, $pass);
    
            // Class object
            $receptionist = new receptionist();        
    
            // Launch function to add 
            $receptionist = $receptionist -> addaffect($db_info,$id_user,$specialite);
    
            header("location:man_affectation.php");
            exit();
            
        }