<body>
    <div class='signup-container'>
        <div class='left-container'>
          <h1>Mes rendez-vous:</h1>

          <div></div>
          
          <table style="width: 90%; font-size: larger; padding-top: 20px; border-bottom:20px;">
            
          <?php
            if (!is_null($rdv)){
              // begin of loop
              foreach ($rdv as $key =>$value){
            echo "<tr>";
              echo "<td>$value[specialite]</td>";
              echo "<td>$value[date_rdv]</td>";
              echo "<td>";
                echo "<a href='edit_rdv.php?id_sent=".$value['id_rdv']."' style='color: white;'>";
                  echo "<i class='fa fa-pencil' aria-hidden='true'></i>";
                echo "</a>";
              echo "</td>";
              echo "<td> ";
                echo "<a href='delete_rdv.php?id_sent=".$value['id_rdv']."' style='color: white;'>";
                  echo "<i class='fa fa-trash' aria-hidden='true'></i>";
                echo "</a>";
              echo "</td>";
            echo "</tr>";
              }
            }

            ?>
          </table>

          <div class='puppy'>
            </div>
        </div>
        <div class='right-container'>
          <header>
            <h1>
            <i class='fa fa-pencil' aria-hidden='true'></i>
              Modifier votre rendez-vous
            </h1>
            <div class='set'>
              <div class='pets-name'>
                
              </div>
              <div class='pets-photo'>
               
              </div>
            </div>
            <form action="post_editrdv.php" method="post">
                <div class='set'>
                  <div class='pets-breed'>  
                    <label for='pets-breed'>Choisir la spécialité</label>
                    <select name="specialite" id='pets-breed' required> SPEC
                    <?php
                        echo "<option value='$specialite'> $specialite </option>";
                        if (!is_null($spec)){
                          // begin of loop
                          foreach ($spec as $key =>$value){
                        echo "<option value='$value[specialite]'> $value[specialite] </option>";
                          }
                        }
                    ?>
                    </select>
                  </div>

                  <div class='pets-birthday'>
                    <?php
                    echo "<input id='pets-birthday' name='date' class='datein' type='date' value='$date' min='$current_day' required>";
                    echo "<input name='id_rdv' value='$id_rdv' type='hidden'>";
                    
                    ?>
                  </div>
                </div>
                
                <?php 
                /*if (!is_null($message_erreur1)){
                  echo"<div class='alert alert-danger lead text-center' role='alert'>";
                  echo"<p style='color : red;'>  $message_erreur1 $message_erreur2 </h3>";
                  echo"</div>";
                }
                */?>
                <div class="set">
                  <h3 style="color : red;"> <?php echo $message_erreur1; ?> <?php echo $message_erreur2; ?> </h3>
                </div>
                <div class="set">
                  <a style="color : lightseagreen;" href="http://">
                    <h3> <?php echo $message_erreur3; ?> <?php echo $message_erreur4; ?> </h3>
                  </a>
                </div>
              </header>
              <footer>
                <div class='set'>
                <button id='next' type="submit" name="btneditrdv">Modifier</button>
              </form>  
                  <a href="rdv_patients.php">
                  <button id='back'>Retour</button>
                  </a>
                  
                </div>
              </footer>

            
        </div>
      </div>
      
</body>
</html>
