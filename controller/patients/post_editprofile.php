<?php
    session_start();
    
    // Include model
	include('../../model/database_model.php');
    include('../../model/patients_model.php');

    if(isset($_POST["btnregister"])) {
        
        // Drop a post
        $id_patient = $_POST["id_patient"];
        $nom_patient=$_POST["nom_patient"];
        $prenom_patient=$_POST["prenom_patient"];
        $dn_patient= date('Y-m-d', strtotime($_POST["birth"]));
        $adresse_patient=$_POST["adresse_patient"];
        $tel_patient=$_POST["tel_patient"];
        $email_patient=$_POST["email_patient"];
        $password=$_POST["password"];

        // Database object
	    $db_info = DB_Connect($host, $dbname, $user_name, $pass);

	    // Class object
	    $patients = new patients();        

        // Launch function to add 
        $edituser = $patients -> editpatient($db_info,$id_patient,$nom_patient,$prenom_patient,$dn_patient,$adresse_patient,$tel_patient,$email_patient,$password);

        // Refresh a variable _SESSION
        $_SESSION["Checked"]="true";
        $_SESSION["id_patient"]=$id_patient;
        $_SESSION["nom_patient"]=$nom_patient;
        $_SESSION["prenom_patient"]=$prenom_patient;

        header("location:index_patients.php");
        exit();
    }