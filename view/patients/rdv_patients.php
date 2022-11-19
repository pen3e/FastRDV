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
              <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
              Prenez un nouveau rendez-vous !
            </h1>

            <form action="post_newrdv.php" method="post">
                <div class='set'>
                  <div class='pets-breed'>
                    <label for='pets-breed'>Choisir la spécialité</label>
                    <select name="specialite" id='pets-breed' required> SPEC
                    <?php
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
                    <input id='pets-birthday' name="date" placeholder='MM/DD/YYYY' class="datein" 
                           type='date' min="<?php echo $current_day; ?>" required>
                  </div>
                </div>
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
                <button id='next' type="submit" name="btnaddrdv">Valider</button>
              </form>  
                  <a href="index_patients.php">
                  <button id='back'>Fermer</button>
                  </a>
                  
                </div>
              </footer>

            
        </div>
      </div>

      <script>
      $('.datepicker').datepicker({
        // dateFormat: "yy-mm-dd",
        // maxDate: new Date(2018, 10, 30),
        beforeShowDay: function(date) {
          var showDay = true;
          if (date.getDay() == 5 || date.getDay() == 6) {
            showDay = false;
          }
          // menggunakan fungsi jquery inArray

          return [showDay];
        }
      });
      </script>
      
</body>
</html>
