<?php
    session_start();
    
    // set some variables
    $erreur = "";

    if(isset($_POST["btnlogin"])) {
        
        // Drop a post
        $email_patient=$_POST["email_patient"];
        $password=$_POST["password"];
        
        // Include model
	    include('../../model/database_model.php');
        include('../../model/patients_model.php');

        // Database object
	    $db_info = DB_Connect($host, $dbname, $user_name, $pass);

	    // Class object
	    $patients = new patients();

        // Launch function to add 
        $CheckUser = $patients -> CheckUser($db_info,$email_patient,$password);

        if(count($CheckUser)>0){
            
            // Create a variable _SESSION
            $_SESSION["Checked"]="true";
            $_SESSION['id_patient']=$CheckUser[0]["id_patient"];
            $_SESSION["nom_patient"]=$CheckUser[0]["nom_patient"];
            $_SESSION["prenom_patient"]=$CheckUser[0]["prenom_patient"];
            
            header("location:index_patients.php");
            exit();
        } else
        {   
            $erreur = "Incorrect email or password.";
        }
    }

    // Set some variables
    $Document_title = "Patients Login";
    $message = 'vérifiez vos informations et réessayez ! ';

    // include views
    include("../../view/_layouts/header_doctors1.php");
    include("../../view/patients/login_patients.php");