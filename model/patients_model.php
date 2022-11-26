<?php

    class patients 
    {
        // Create a new account
        function AddNewPatient ($db_info,$nom_patient,$prenom_patient,$dn_patient,$adresse_patient,$tel_patient,$email_patient,$password)
        {
            $HASHED_PASSWORD = md5($password);

            $sql = ("INSERT INTO patient (nom_patient,prenom_patient,dn_patient,adresse_patient,tel_patient,email_patient,password) values (:nom_patient,:prenom_patient,:dn_patient,:adresse_patient,:tel_patient,:email_patient,:password)");
            $query = $db_info -> prepare($sql);

            $query -> bindValue(':nom_patient' ,$nom_patient);
            $query -> bindValue(':prenom_patient' ,$prenom_patient);
            $query -> bindValue(':dn_patient' ,$dn_patient);
            $query -> bindValue(':adresse_patient' ,$adresse_patient);
            $query -> bindValue(':tel_patient' ,$tel_patient);
            $query -> bindValue(':email_patient' ,$email_patient);
            $query -> bindValue(':password' ,$HASHED_PASSWORD);

            $query -> execute();

            return $query;
        }

        // Check email_patient & password
        function CheckUser ($db_info,$email_patient,$password)
        {
            $HASHED_PASSWORD = md5($password);

            $sql = ("SELECT * FROM patient WHERE email_patient = :email_patient and password = :password");

            $query = $db_info -> prepare($sql);
            
            $query -> bindValue(':email_patient',$email_patient);
            $query -> bindValue(':password',$HASHED_PASSWORD);        
            
            $query -> execute();

            $row = $query -> fetchAll(PDO::FETCH_ASSOC);

            return $row;  
        }

        // fetch rdv
        function rdvbypatient ($db_info,$id_patient)
        {
            $sql = ("SELECT rdv.id_rdv, planning.specialite, rdv.date_rdv
                    FROM rdv
                    INNER JOIN planning ON planning.id_planning = rdv.id_planning
                    INNER JOIN users ON users.id_user = planning.id_user
                    WHERE rdv.id_patient = :id_patient");

            $query = $db_info -> prepare ($sql);
            $query -> bindValue(':id_patient',$id_patient);
            $query -> execute();

            $rows = $query -> fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }

        // specialité disponibble 
        function spec ($db_info)
        {
            $sql = ("SELECT DISTINCT specialite FROM planning
                    WHERE active = '1';");
            
            $query = $db_info -> prepare($sql);
            $query -> execute();
            $rows = $query -> fetchAll();

            return $rows;           
        }
        // specialité disponibble 
        function spec_avaible ($db_info)
        {
            $sql = ("SELECT DISTINCT specialite FROM planning
                    WHERE active = '1' AND id_user > 0;");
            
            $query = $db_info -> prepare($sql);
            $query -> execute();
            $rows = $query -> fetchAll();

            return $rows;           
        }
        // all specialité
        function allspec ($db_info)
        {
            $sql = ("SELECT DISTINCT specialite FROM planning;");
            
            $query = $db_info -> prepare($sql);
            $query -> execute();
            $rows = $query -> fetchAll();

            return $rows;           
        }
        // convert specialite to an id_planning min value 
        function convertspec ($db_info,$specialite)
        {
            $sql = ("SELECT MIN(id_planning) AS id_planning 
                    FROM planning WHERE specialite = :specialite;");
            
            $query = $db_info -> prepare ($sql);
            $query -> bindValue(':specialite',$specialite);
            $query -> execute();

            $rows = $query -> fetchAll(PDO::FETCH_ASSOC);
            return $rows;          
        }
        // insert a new rdv
        function newrdv ($db_info,$id_patient,$id_planning,$date_rdv)
        {
            $sql = ("INSERT INTO rdv (date_rdv,id_patient,id_planning) 
                    VALUES (:date_rdv, :id_patient, :id_planning)");
            
            $query = $db_info -> prepare($sql);

            $query -> bindValue(':date_rdv' ,$date_rdv);
            $query -> bindValue(':id_patient' ,$id_patient);
            $query -> bindValue(':id_planning' ,$id_planning);

            $query -> execute();

            return $query;
        }
        // delet rdv by id
        function delrdv($db,$id_rdv) 
        {
            $sql = 'delete from rdv where id_rdv = :id_rdv';
        
            $requete = $db->prepare($sql);
            $requete -> bindValue(':id_rdv',$id_rdv);
            $requete->execute();
        
            return $requete;
        }
        // rdv by id
        function rdvid($db,$id_rdv)
        {
            $sql = ("SELECT rdv.id_rdv, planning.specialite, rdv.date_rdv
                    FROM rdv
                    INNER JOIN planning ON planning.id_planning = rdv.id_planning
                    WHERE rdv.id_rdv = :id_rdv;");

            $query = $db -> prepare ($sql);
            $query -> bindValue(':id_rdv',$id_rdv);
            $query -> execute();

            $rows = $query -> fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }
        // check if medecin is avaible
        function CheckWeek ($db_info,$date_send_week,$specialite)
        {
            $sql = ("SELECT * FROM planning 
                    WHERE date_planning = :date_planning 
                    and specialite = :specialite
                    and active = '1';");

            $query = $db_info -> prepare($sql);
            
            $query -> bindValue(':date_planning',$date_send_week);
            $query -> bindValue(':specialite',$specialite);        
            
            $query -> execute();

            $row = $query -> fetchAll(PDO::FETCH_ASSOC);

            return $row;  
        }

        // edit rdv
        function editrdv($db,$id_rdv,$id_planning,$date_rdv)
        {
            $sql = ("UPDATE rdv SET 
                        id_planning = :id_planning,
                        date_rdv = :date_rdv
                    WHERE id_rdv = :id_rdv");
            $query = $db -> prepare ($sql);
            $query -> bindValue(':id_rdv',$id_rdv);
            $query -> bindValue(':id_planning',$id_planning);
            $query -> bindValue(':date_rdv',$date_rdv);
            $query -> execute();

            return $query;
        }
        // profile info
        function profilepatient($db_info,$id_patient)
        {
            $sql = ("SELECT * FROM patient WHERE id_patient = :id_patient");
            $query = $db_info -> prepare ($sql);
            $query -> bindValue(':id_patient',$id_patient);
            $query -> execute();
            
            $row = $query -> fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        // edit profile
        function editpatient($db_info,$id_patient,$nom_patient,$prenom_patient,$dn_patient,$adresse_patient,$tel_patient,$email_patient,$password)
        {
            $HASHED_PASSWORD = md5($password);

            $sql = ("UPDATE patient SET 
                        nom_patient = :nom_patient, 
                        prenom_patient = :prenom_patient,
                        dn_patient = :dn_patient,
                        adresse_patient = :adresse_patient,
                        tel_patient = :tel_patient,
                        email_patient = :email_patient,
                    password = :password
                    WHERE id_patient = :id_patient");
            
            $query = $db_info -> prepare ($sql);
            
            $query -> bindValue(':nom_patient' ,$nom_patient);
            $query -> bindValue(':prenom_patient' ,$prenom_patient);
            $query -> bindValue(':dn_patient' ,$dn_patient);
            $query -> bindValue(':adresse_patient' ,$adresse_patient);
            $query -> bindValue(':tel_patient' ,$tel_patient);
            $query -> bindValue(':email_patient' ,$email_patient);
            $query -> bindValue(':password' ,$HASHED_PASSWORD);
            $query -> bindValue(':id_patient' ,$id_patient);
            
            $query -> execute();

            return $query;
        } 
    }