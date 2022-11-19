<body>
  <div class="session">
    
    <a href="../mainpage_controller.php">
    <div class="lefttwo"></div>
    </a>
    
        <!-- BEGIN OF FORM -->  
        <form action="login_doctors.php" method="POST" class="log-in" autocomplete="off">
        
            <h4><span><?php echo $Label; ?></span></h4>
            
            <h4> <?php echo $message ?> </h4>
            
            <div class="floating-label">
                
                <!-- USERNAME input -->
                <input placeholder="Email" type="email" name="email" id="email" autocomplete="off">
                <label for="email">Email:</label>
            
            </div>

            <div class="floating-label">
                
                <!-- PASSWD input -->
                <input placeholder="Password" type="password" name="password" id="password" autocomplete="off">
                <label for="password">Password:</label>

            </div>

                <button name="btnlogin" type="submit">Log in</button>

        </form>
        <!-- END of form-->
    
    </div>
</body>

</html>

<!-- EOF -->