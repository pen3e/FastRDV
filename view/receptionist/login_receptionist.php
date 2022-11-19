<body>
  <div class="session">

    <a href="../mainpage_controller.php">
    <div class="lefttwo"></div>
    </a>
        <!-- BEGIN OF FORM -->  
        <form action="post_login.php" method="post" class="log-in">
        
            <h4><span><?php echo $Label; ?></span></h4>
            
            <h4> <?php echo $message ?> </h4>
            <div class="floating-label">
                
                <!-- USERNAME input -->
                <input placeholder="Email" type="email" name="email_user" id="email" required>
                <label for="email">Email:</label>

            
            </div>

            <div class="floating-label">
                
                <!-- PASSWD input -->
                <input placeholder="Password" type="password" name="password" id="password" required>
                <label for="password">Password:</label>

        
            </div>

                <button type="submit" name="btnlogin">Log in</button>

        </form>
        <!-- END of form-->
    
    </div>
</body>

</html>

<!-- EOF -->