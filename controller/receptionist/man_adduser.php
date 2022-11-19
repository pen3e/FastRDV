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


    $Document_title = "Manager Médecins";

    if(isset($_POST['btnadd'])) {
        // Drop a post
        $nom_user=$_POST["nom_user"];
        $prenom_user=$_POST["prenom_user"];
        $dn_user= date('Y-m-d', strtotime($_POST["birth"]));
        $adresse_user=$_POST["adresse_user"];
        $tel_user=$_POST["tel_user"];
        $email_user=$_POST["email_user"];
        $password=$_POST["password"];
        $type_user=$_POST["type_user"];

        $result = $receptionist -> AddNewUser ($db_info,$nom_user,$prenom_user,$dn_user,$adresse_user,$tel_user,$email_user,$password,$type_user);
    }
    // include views
    include("../../view/_layouts/header_boot.php");
    include("../../view/receptionist/man_adduser.php");
    include("../../view/_layouts/footer_boot.php");