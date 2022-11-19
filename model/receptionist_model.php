<?php

    class receptionist 
    {
        // Check email_user & password
        function CheckUserRec ($db_info,$email_user,$password,$type_user)
        {
            $HASHED_PASSWORD = md5($password);
        
            $sql = ("SELECT * FROM users WHERE email_user = :email_user and password = :password and type_user = :type_user;");
        
            $query = $db_info -> prepare($sql);
                    
            $query -> bindValue(':email_user',$email_user);
            $query -> bindValue(':password',$HASHED_PASSWORD);   
            $query -> bindValue(':type_user',$type_user);     
                    
            $query -> execute();
        
            $row = $query -> fetchAll(PDO::FETCH_ASSOC);
        
            return $row;  
        }
        // Manager planning
        function checkbydate($db_info,$date,$specialite)
        {
            $sql = ("SELECT * FROM planning 
                    WHERE date_planning = :date_planning
                    AND specialite = :specialite ;");
            $query = $db_info -> prepare($sql);
            $query -> bindValue(':date_planning',$date);
            $query -> bindValue(':specialite',$specialite);
            $query -> execute();
            $row = $query -> fetchAll(PDO::FETCH_ASSOC);
            return $row; 
        }
        // enable day
        function enableday($db_info,$id_planning)
        {
            $sql = ("UPDATE planning SET
                    active = '1'
                    WHERE id_planning = :id_planning");
            $query = $db_info -> prepare ($sql);
            $query -> bindValue(':id_planning',$id_planning);
            $query -> execute();

            return $query;
        }
        // disable day
        function disableday($db_info,$id_planning)
        {
            $sql = ("UPDATE planning SET
                    active = '0'
                    WHERE id_planning = :id_planning");
            $query = $db_info -> prepare ($sql);
            $query -> bindValue(':id_planning',$id_planning);
            $query -> execute();

            return $query;
        }
        // insert new planning
        function addplanning($db_info,$date_planning,$specialite)
        {
            $sql = ("INSERT INTO planning (id_planning, id_user, date_planning, specialite, active) 
                    VALUES (NULL, '0', :date_planning, :specialite, '0');");
            $query = $db_info -> prepare($sql);

            $query -> bindValue(':date_planning' ,$date_planning);
            $query -> bindValue(':specialite' ,$specialite);

            $query -> execute();

            return $query;
        }
        // delete planning
        function deleteplanning($db_info,$specialite)
        {
            $sql = ("delete from planning where specialite = :specialite");
        
            $requete = $db_info->prepare($sql);
            $requete -> bindValue(':specialite',$specialite);
            $requete->execute();
        
            return $requete;
        }
        // all info specialité
        function allinfospec($db_info,$specialite)
        {
            $sql = ("SELECT * FROM planning WHERE specialite = :specialite;");
            $query = $db_info -> prepare($sql);
            $query -> bindValue(':specialite',$specialite);
            $query -> execute();
            $rows = $query -> fetchAll(PDO::FETCH_ASSOC);
            return $rows; 
        }
        // all medecins
        function allmedecins($db_info)
        {
            $sql = ("SELECT * FROM users 
                    WHERE type_user = '1';");
            $query = $db_info -> prepare($sql);
            $query -> execute();
            $rows = $query -> fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }
        // not all medecins
        function notallmedecins($db_info,$statusmedecin)
        {
            $sql = ("SELECT * FROM users 
                    WHERE NOT id_user = :id_user
                    AND type_user = '1';");
            $query = $db_info -> prepare($sql);
            $query -> bindValue(':id_user',$statusmedecin);
            $query -> execute();
            $rows = $query -> fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }
        // all info user by id
        function infouserbyid($db_info,$statusmedecin)
        {
            $sql = ("SELECT * FROM users WHERE id_user = :id_user;");
            $query = $db_info -> prepare($sql);
            $query -> bindValue(':id_user',$statusmedecin);
            $query -> execute();
            $row = $query -> fetchAll(PDO::FETCH_ASSOC);
            return $row; 
        }
        //enable affectation to spec
        function addaffect($db_info,$id_user,$specialite)
        {
            $sql = ("UPDATE planning SET
                    id_user = :id_user
                    WHERE specialite = :specialite");
            $query = $db_info -> prepare ($sql);
            $query -> bindValue(':id_user',$id_user);
            $query -> bindValue(':specialite',$specialite);
            $query -> execute();

            return $query;
        }
        //disable affectation to spec
        function deleaffect($db_info,$specialite)
        {
            $sql = ("UPDATE planning SET
                    id_user = '0'
                    WHERE specialite = :specialite");
            $query = $db_info -> prepare ($sql);
            $query -> bindValue(':id_user',$id_user);
            $query -> bindValue(':specialite',$specialite);
            $query -> execute();

            return $query;
        }
        // all patient
        function allpatient($db_info)
        {
            $sql = ("SELECT * FROM patient");

            $query = $db_info -> prepare($sql);

            $query -> execute();
            $rows = $query -> fetchAll(PDO::FETCH_ASSOC);
            return $rows; 
        }
        // search by nom patient
        function search_p($db_info,$nom_patient)
        {
            $sql = ("SELECT * FROM patient
                    WHERE (nom_patient LIKE '%$nom_patient%' OR prenom_patient LIKE '%$nom_patient%');");

            $query = $db_info -> prepare($sql);
            //$query -> bindValue(':nom_patient',$nom_patient);
            $query -> execute();
            $rows = $query -> fetchAll(PDO::FETCH_ASSOC);
            return $rows; 
        }
        // delt patient
        function delete_p($db_info,$id_patient)
        {
            $sql = 'delete from patient where id_patient = :id_patient';
        
            $requete = $db_info->prepare($sql);
            $requete -> bindValue(':id_patient',$id_patient);
            $requete->execute();
        
            return $requete;
        }
          // search by nom user
          function search_m($db_info,$nom_user)
          {
              $sql = ("SELECT * FROM users
                      WHERE (nom_user LIKE '%$nom_user%' OR prenom_user LIKE '%$nom_user%')
                      AND type_user = '1';");
  
              $query = $db_info -> prepare($sql);
              //$query -> bindValue(':nom_user',$nom_user);
              $query -> execute();
              $rows = $query -> fetchAll(PDO::FETCH_ASSOC);
              return $rows; 
          }
          // delt user
          function delete_m($db_info,$id_user)
          {
              $sql = 'delete from users where id_user = :id_user';
          
              $requete = $db_info->prepare($sql);
              $requete -> bindValue(':id_user',$id_user);
              $requete->execute();
          
              return $requete;
          }   
          // all rdv
          function all_rdv($db_info)
          {
              $sql = ("SELECT * FROM rdv
                        INNER JOIN patient ON patient.id_patient = rdv.id_patient
                        INNER JOIN planning ON planning.id_planning = rdv.id_planning
                        WHERE rdv.date_rdv >= CURRENT_DATE;");
  
              $query = $db_info -> prepare($sql);
              $query -> execute();
              $rows = $query -> fetchAll(PDO::FETCH_ASSOC);
              return $rows; 
          }
            // all rdv by spec
          function all_rdv_byspec($db_info,$spec)
          {
              $sql = ("SELECT * FROM rdv
                        INNER JOIN patient ON patient.id_patient = rdv.id_patient
                        INNER JOIN planning ON planning.id_planning = rdv.id_planning
                        WHERE planning.specialite = :spec
                        AND rdv.date_rdv >= CURRENT_DATE;");
  
              $query = $db_info -> prepare($sql);
              $query -> bindValue(':spec',$spec);
              $query -> execute();
              $rows = $query -> fetchAll(PDO::FETCH_ASSOC);
              return $rows; 
          }
          // all rdv by date
          function all_rdv_bydate($db_info,$date_rdv)
          {
              $sql = ("SELECT * FROM rdv
                        INNER JOIN patient ON patient.id_patient = rdv.id_patient
                        INNER JOIN planning ON planning.id_planning = rdv.id_planning
                        WHERE rdv.date_rdv = :date;");
  
              $query = $db_info -> prepare($sql);
              $query -> bindValue(':date',$date_rdv);
              $query -> execute();
              $rows = $query -> fetchAll(PDO::FETCH_ASSOC);
              return $rows; 
          }
          // all rdv by search string
          function all_rdv_bys($db_info,$string)
          {
              $sql = ("SELECT * FROM rdv
                        INNER JOIN patient ON patient.id_patient = rdv.id_patient
                        INNER JOIN planning ON planning.id_planning = rdv.id_planning
                        WHERE (patient.nom_patient LIKE '%$string%' OR patient.prenom_patient LIKE '%$string%')");
  
              $query = $db_info -> prepare($sql);
              //$query -> bindValue(':date',$date_rdv);
              $query -> execute();
              $rows = $query -> fetchAll(PDO::FETCH_ASSOC);
              return $rows; 
          }
          // COUNT RDV BY SPEC
          function count_rdvbyspec($db_info,$spe)
          {
              $sql = ("SELECT COUNT(*) AS countday FROM rdv
                        INNER JOIN patient ON patient.id_patient = rdv.id_patient
                        INNER JOIN planning ON planning.id_planning = rdv.id_planning
                        WHERE rdv.date_rdv >= CURRENT_DATE
                        AND planning.specialite = :specialite;");
  
              $query = $db_info -> prepare($sql);
              $query -> bindValue(':specialite',$spe);
              $query -> execute();
              $rows = $query -> fetchAll(PDO::FETCH_ASSOC);
              return $rows; 
          }
        // Create a new account
        function AddNewUser ($db_info,$nom_user,$prenom_user,$dn_user,$adresse_user,$tel_user,$email_user,$password,$type_user)
        {
            $HASHED_PASSWORD = md5($password);

            $sql = ("INSERT INTO users (nom_user,prenom_user,dn_user,adresse_user,tel_user,email_user,password,type_user) 
                    values (:nom_user,:prenom_user,:dn_user,:adresse_user,:tel_user,:email_user,:password,:type_user)");
            $query = $db_info -> prepare($sql);

            $query -> bindValue(':nom_user' ,$nom_user);
            $query -> bindValue(':prenom_user' ,$prenom_user);
            $query -> bindValue(':dn_user' ,$dn_user);
            $query -> bindValue(':adresse_user' ,$adresse_user);
            $query -> bindValue(':tel_user' ,$tel_user);
            $query -> bindValue(':email_user' ,$email_user);
            $query -> bindValue(':password' ,$HASHED_PASSWORD);
            $query -> bindValue(':type_user' ,$type_user);

            $query -> execute();

            return $query;
        }

    }