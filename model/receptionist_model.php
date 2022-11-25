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
        // Search patient by id
          function search_p_byid($db_info,$id_patient)
          {
              $sql = ("SELECT * FROM patient WHERE id_patient = :id_patient");
              $query = $db_info -> prepare($sql);
              $query -> bindValue(':id_patient',$id_patient);
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
            // all rdv by id
          function all_rdv_by_id($db_info,$id_rdv)
          {
              $sql = ("SELECT * FROM rdv
                        INNER JOIN patient ON patient.id_patient = rdv.id_patient
                        INNER JOIN planning ON planning.id_planning = rdv.id_planning
                        WHERE rdv.id_rdv = :id_rdv");
  
              $query = $db_info -> prepare($sql);
              $query -> bindValue(':id_rdv',$id_rdv);
              $query -> execute();
              $rows = $query -> fetchAll(PDO::FETCH_ASSOC);
              return $rows; 
          }
          // COUNT RDV BY SPEC
          function count_rdvbyfutur($db_info,$spe)
          {
              $sql = ("SELECT COUNT(*) AS countfutur FROM rdv
                        INNER JOIN patient ON patient.id_patient = rdv.id_patient
                        INNER JOIN planning ON planning.id_planning = rdv.id_planning
                        WHERE rdv.date_rdv > CURRENT_DATE
                        AND planning.specialite = :specialite;");
  
              $query = $db_info -> prepare($sql);
              $query -> bindValue(':specialite',$spe);
              $query -> execute();
              $rows = $query -> fetchAll(PDO::FETCH_ASSOC);
              return $rows; 
          }
          // COUNT RDV BY SPEC
          function count_rdvbyday($db_info,$spe)
          {
              $sql = ("SELECT COUNT(*) AS countday FROM rdv
                        INNER JOIN patient ON patient.id_patient = rdv.id_patient
                        INNER JOIN planning ON planning.id_planning = rdv.id_planning
                        WHERE rdv.date_rdv = CURRENT_DATE
                        AND planning.specialite = :specialite;");
  
              $query = $db_info -> prepare($sql);
              $query -> bindValue(':specialite',$spe);
              $query -> execute();
              $rows = $query -> fetchAll(PDO::FETCH_ASSOC);
              return $rows; 
          }
          // COUNT RDV BY SPEC
          function count_rdvbypast($db_info,$spe)
          {
              $sql = ("SELECT COUNT(*) AS countpast FROM rdv
                        INNER JOIN patient ON patient.id_patient = rdv.id_patient
                        INNER JOIN planning ON planning.id_planning = rdv.id_planning
                        WHERE rdv.date_rdv < CURRENT_DATE
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

        // send mail to patient
        function send_bymail ($email_p,$subject,$message)
        {
            $to = $email_p;
            // *** Subject Email ***
            $subject = $subject;
            $signature = "</br></br><table cellpadding='0' cellspacing='0' class='table__StyledTable-sc-1avdl6r-0 iasblw' style='vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Arial;'><tbody><tr><td><table cellpadding='0' cellspacing='0' class='table__StyledTable-sc-1avdl6r-0 iasblw' style='vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Arial;'><tbody><tr><td width='150' style='vertical-align: middle;'><span class='template3__ImageContainer-sc-vj949k-0 iAZHDN' style='margin-right: 20px; display: block;'><img src='https://cdn-icons-png.flaticon.com/512/4974/4974208.png' role='presentation' width='130' class='image__StyledImage-sc-hupvqm-0 eLouvR' style='max-width: 130px;'></span></td><td style='vertical-align: middle;'><h2 color='#000000' class='name__NameContainer-sc-1m457h3-0 jCjfGD' style='margin: 0px; font-size: 18px; color: rgb(0, 0, 0); font-weight: 600;'><span>Admin</span><span>&nbsp;</span><span>FastRdv</span></h2><p color='#000000' font-size='medium' class='job-title__Container-sc-1hmtp73-0 ibpiyI' style='margin: 0px; color: rgb(0, 0, 0); font-size: 14px; line-height: 22px;'><span>Réceptionniste.</span></p><p color='#000000' font-size='medium' class='company-details__CompanyContainer-sc-j5pyy8-0 haLCeu' style='margin: 0px; font-weight: 500; color: rgb(0, 0, 0); font-size: 14px; line-height: 22px;'><span>CDDS ALEM ABDERREZAK-Alger.</span></p></td><td width='30'><div style='width: 30px;'></div></td><td color='#f2547d' direction='vertical' width='1' height='auto' class='color-divider__Divider-sc-1h38qjv-0 dVPycS' style='width: 1px; border-bottom: none; border-left: 1px solid rgb(242, 84, 125);'></td><td width='30'><div style='width: 30px;'></div></td><td style='vertical-align: middle;'><table cellpadding='0' cellspacing='0' class='table__StyledTable-sc-1avdl6r-0 iasblw' style='vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Arial;'><tbody><tr height='25' style='vertical-align: middle;'><td width='30' style='vertical-align: middle;'><table cellpadding='0' cellspacing='0' class='table__StyledTable-sc-1avdl6r-0 iasblw' style='vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Arial;'><tbody><tr><td style='vertical-align: bottom;'><span color='#f2547d' width='11' class='contact-info__IconWrapper-sc-mmkjr6-1 eOlNoC' style='display: inline-block; background-color: rgb(242, 84, 125);'><img src='https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/phone-icon-2x.png' color='#f2547d' alt='mobilePhone' width='13' class='contact-info__ContactLabelIcon-sc-mmkjr6-0 glcxte' style='display: block; background-color: rgb(242, 84, 125);'></span></td></tr></tbody></table></td><td style='padding: 0px; color: rgb(0, 0, 0);'><a href='tel:0 23 46 92 02' color='#000000' class='contact-info__ExternalLink-sc-mmkjr6-2 dwaWtg' style='text-decoration: none; color: rgb(0, 0, 0); font-size: 12px;'><span>0 23 46 92 02</span></a></td></tr><tr height='25' style='vertical-align: middle;'><td width='30' style='vertical-align: middle;'><table cellpadding='0' cellspacing='0' class='table__StyledTable-sc-1avdl6r-0 iasblw' style='vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Arial;'><tbody><tr><td style='vertical-align: bottom;'><span color='#f2547d' width='11' class='contact-info__IconWrapper-sc-mmkjr6-1 eOlNoC' style='display: inline-block; background-color: rgb(242, 84, 125);'><img src='https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/email-icon-2x.png' color='#f2547d' alt='emailAddress' width='13' class='contact-info__ContactLabelIcon-sc-mmkjr6-0 glcxte' style='display: block; background-color: rgb(242, 84, 125);'></span></td></tr></tbody></table></td><td style='padding: 0px;'><a href='mailto:fastrdv.root@gmail.com' color='#000000' class='contact-info__ExternalLink-sc-mmkjr6-2 dwaWtg' style='text-decoration: none; color: rgb(0, 0, 0); font-size: 12px;'><span>fastrdv.root@gmail.com</span></a></td></tr><tr height='25' style='vertical-align: middle;'><td width='30' style='vertical-align: middle;'><table cellpadding='0' cellspacing='0' class='table__StyledTable-sc-1avdl6r-0 iasblw' style='vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Arial;'><tbody><tr><td style='vertical-align: bottom;'><span color='#f2547d' width='11' class='contact-info__IconWrapper-sc-mmkjr6-1 eOlNoC' style='display: inline-block; background-color: rgb(242, 84, 125);'><img src='https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/link-icon-2x.png' color='#f2547d' alt='website' width='13' class='contact-info__ContactLabelIcon-sc-mmkjr6-0 glcxte' style='display: block; background-color: rgb(242, 84, 125);'></span></td></tr></tbody></table></td><td style='padding: 0px;'><a href='//www.fastrdv-cdds.dz' color='#000000' class='contact-info__ExternalLink-sc-mmkjr6-2 dwaWtg' style='text-decoration: none; color: rgb(0, 0, 0); font-size: 12px;'><span>www.fastrdv-cdds.dz</span></a></td></tr><tr height='25' style='vertical-align: middle;'><td width='30' style='vertical-align: middle;'><table cellpadding='0' cellspacing='0' class='table__StyledTable-sc-1avdl6r-0 iasblw' style='vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Arial;'><tbody><tr><td style='vertical-align: bottom;'><span color='#f2547d' width='11' class='contact-info__IconWrapper-sc-mmkjr6-1 eOlNoC' style='display: inline-block; background-color: rgb(242, 84, 125);'><img src='https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/address-icon-2x.png' color='#f2547d' alt='address' width='13' class='contact-info__ContactLabelIcon-sc-mmkjr6-0 glcxte' style='display: block; background-color: rgb(242, 84, 125);'></span></td></tr></tbody></table></td><td style='padding: 0px;'><span color='#000000' class='contact-info__Address-sc-mmkjr6-3 ikFVIq' style='font-size: 12px; color: rgb(0, 0, 0);'><span>CDDS Abderrezak Allem Boulevard des Martyrs.</span></span></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td><table cellpadding='0' cellspacing='0' class='table__StyledTable-sc-1avdl6r-0 iasblw' style='width: 100%; vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Arial;'><tbody><tr><td height='30'></td></tr><tr><td color='#f2547d' direction='horizontal' width='auto' height='1' class='color-divider__Divider-sc-1h38qjv-0 dVPycS' style='width: 100%; border-bottom: 1px solid rgb(242, 84, 125); border-left: none; display: block;'></td></tr><tr><td height='30'></td></tr></tbody></table></td></tr><tr><td><table cellpadding='0' cellspacing='0' class='table__StyledTable-sc-1avdl6r-0 iasblw' style='width: 100%; vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Arial;'><tbody><tr><td style='vertical-align: top;'></td></tr></tbody>";
            // *** Content Email ***
            $content = ("<h1 style='color: #191970;'>$message</h1>
            <hr style='border-top: 1px ;'>
            $signature");
            //
            //*** Head Email ***
            $headers = "From: Your-Email\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html\r\n";

            //*** Show the result... ***
                if (mail($to, $subject, $content, $headers))
                {
                     $log= "Mail envoyer";
                } 
                else 
                {
                    $log= "Echec de l'envoi";
                }
            return $log;
        }

    }