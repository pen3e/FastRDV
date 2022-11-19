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

    if(isset($_POST["btnlogin"])) {
        
        // Drop a post
        $email_user=$_POST["email"];
        $password=$_POST["password"];

        // Launch function to add 
        $CheckUser = $receptionist -> CheckUserRec($db_info,$email_user,$password,'1');

        if(count($CheckUser)>0){
            
            // Create a variable _SESSION
            $_SESSION["doctors"]="true";
            $_SESSION["id_user"]=$$CheckUser[0]["id_user"];
            $_SESSION["nom_user"]=$CheckUser[0]["nom_user"];
            $_SESSION["prenom_user"]=$CheckUser[0]["prenom_user"];
            $_SESSION["specialite_user"]=$CheckUser[0]["specialite_user"];
            
            header("location:index_medecins.php");
            exit();
        } else
        {   
            // Set some variables
            $Document_title = "Doctors Login";
            $Label = "Doctors";
            $message = "vérifiez vos informations et réessayez !";
            // include views
            include("../../view/_layouts/header_doctors.php");
            include("../../view/doctors/login_doctors.php");
        }

    }else{
        
        // Set some variables
        $Document_title = "Doctors Login";
        $Label = "Doctors";
        $message = "";
        
        // include views
        include("../../view/_layouts/header_doctors.php");
        include("../../view/doctors/login_doctors.php");
    }

