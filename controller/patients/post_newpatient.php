<?php
    session_start();
    
    // Include model
	include('../../model/database_model.php');
    include('../../model/patients_model.php');

    if(isset($_POST["btnregister"])) {
        
        // Drop a post
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
        $adduser = $patients -> AddNewPatient($db_info,$nom_patient,$prenom_patient,$dn_patient,$adresse_patient,$tel_patient,$email_patient,$password);

        // Set some variables
        $Document_title = "Patients Login";
        $Label = "Patient";
        $message = '<h3> compte crée avec succes! </h3> <h3>connectez-vous </h3>';
        
        // include views
        include("../../view/_layouts/header_doctors1.php");
        include("../../view/patients/login_patients.php");

    }