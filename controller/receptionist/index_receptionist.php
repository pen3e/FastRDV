<?php
        session_start();
        // Check if sesssion exist
        if (!isset($_SESSION["admin"])) {
            header("location:login_receptionist.php");
            exit();
        }

        $id_user = $_SESSION['id_user'];
        $nom_user = $_SESSION['nom_user'];
        $prenom_user = $_SESSION['prenom_user'];

        $Document_title = "Receptionnist home";


        // include views
        include("../../view/_layouts/header_patients1.php");
        include("../../view/receptionist/index_receptionist.php");