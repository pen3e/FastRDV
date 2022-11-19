<body>
    <div id="head-cont"> 
       <a href="../mainpage_controller.php"> <img src="../../public/style/Pngtree—medical logo_3558939.png" id="logo" alt=""> </a>
        <h2>La plus grande richesse est d'avoir une bonne santé et une famille unie.</h2>
    </div>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="post" action="post_newpatient.php">
                <input type="text" placeholder="Nom" name="nom_patient" required/>
                <input type="text" placeholder="Prénom" name="prenom_patient" required/>
                <label for=""> Date naissance :</label>
                <input type="date" name="birth" required/>
                <input type="text" placeholder="Adresse postale" name="adresse_patient" required/>
                <input type="text" placeholder="Télephone" name="tel_patient" required/>
                <input type="email" placeholder="Email" name="email_patient" required/>
                <input type="password" placeholder="Mot de passe" name="password" required/>
                <button type="submit" name="btnregister">S'inscrire</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            
            <form method="post" action="post_login.php">
                <h1>Se connecter</h1>
                <h2 style="color: red;"><?php echo $message ?></h2>
                <input type="text" name="email_patient" placeholder="Email" required/>
                <input type="password" name="password" placeholder="Mot de passe" required/>
                
                <button type="submit" name="btnlogin">Se connecter</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Bonjour!</h1>
                    <p>veuillez remplire le formulaire pour vous inscrire..</p>
                    <button class="ghost" id="signIn">Se connecter</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Bienvenue,</h1>
                    <p>entrez vos informations pour connecter avec nous!</p>
                    <button class="ghost" id="signUp">S'inscrire</button>
                </div>
            </div>
        </div>
    </div>
    </body>
    <footer>
        <p>
            CDDS ALEM ABDERREZAK-Alger - 
        CDDS Abderrezak Allem Boulevard des Martyrs - 
            023 46 92 02
        </p>
    </footer>
<script >
    const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>
</html>