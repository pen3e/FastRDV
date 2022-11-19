<body>
    <div id="head-cont"> 
       <a href="index_patients.php"> <img src="../../public/style/Pngtree—medical logo_3558939.png" id="logo" alt=""> </a>
        <h2>La plus grande richesse est d'avoir une bonne santé et une famille unie.</h2>
    </div>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form method="post" action="post_editprofile.php">
                <input type="" name="id_patient" value="<?php echo $id_patient; ?>" hidden>
                <input type="text" placeholder="Nom" name="nom_patient" value="<?php echo $nom_patient; ?>"required/>
                <input type="text" placeholder="Prénom" name="prenom_patient" value="<?php echo $prenom_patient; ?>" required/>
                <label for=""> Date naissance :</label>
                <input type="date" name="birth" value="<?php echo $dn_patient; ?>" required/>
                <input type="text" placeholder="Adresse postale" name="adresse_patient" value="<?php echo $adresse_patient; ?>" required/>
                <input type="text" placeholder="Télephone" name="tel_patient" value="<?php echo $tel_patient; ?>" required/>
                <input type="email" placeholder="Email" name="email_patient" value="<?php echo $email_patient; ?>" required/>
                <input type="password" placeholder="Mot de passe" name="password" required/>
                <button type="submit" name="btnregister">Valider</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>
                        <i class="fa fa-address-book" aria-hidden="true"></i>
                    </h1>
                    <p>Modifier vos informations personnelles</p>
                    <a href="index_patients.php">
                        <button class="ghost" id="signIn">Accueil</button>
                    </a>
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