<?php
    session_start();
    
    // set some variables
    $erreur = "";

    if(isset($_POST["btnlogin"])) {
        
        // Drop a post
        $email_user=$_POST["email_user"];
        $password=$_POST["password"];
        
        // Include model
	    include('../../model/database_model.php');
        include('../../model/receptionist_model.php');

        // Database object
	    $db_info = DB_Connect($host, $dbname, $user_name, $pass);

	    // Class object
	    $receptionist = new receptionist();

        // Launch function to add 
        $CheckUser = $receptionist -> CheckUserRec($db_info,$email_user,$password,'2');

        if(count($CheckUser)>0){
            
            // Create a variable _SESSION
            $_SESSION["admin"]="true";
            $_SESSION["id_user"]=$$CheckUser[0]["id_user"];
            $_SESSION["nom_user"]=$CheckUser[0]["nom_user"];
            $_SESSION["prenom_user"]=$CheckUser[0]["prenom_user"];
            
            header("location:index_receptionist.php");
            exit();
        } else
        {   
            $erreur = "Incorrect email or password.";
        }
    }

    // Set some variables
    $Document_title = "Réceptionniste Login";
    $Label = "Réceptionniste";
    $message = "vérifiez vos informations et réessayez !";

    // include views
    include("../../view/_layouts/header_doctors.php");
    include("../../view/receptionist/login_receptionist.php");