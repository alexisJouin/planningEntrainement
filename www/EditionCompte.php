<?php
include("include/header.php");
include("include/testConnect.php");
?>

<script src="js/editCompte.js"></script>
</head>
<title>Editez Votre compte</title>
<body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    <h1>Mettre à jour votre compte</h1>

    <!--Formulaire de connexion-->
    <form id="formEditionCompte" class="formConnect" method="POST" action="#">
        <h2>Vos infos <?php echo utf8_encode($_SESSION['derby_name']); ?> </h2>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" placeholder='Nom' required>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" placeholder='Prénom' required> 
        <label for="mail">Email :</label>
        <input type="email" id="mail" placeholder='Email' required>
        <label for="derby_name">Derby Name :</label>
        <input type="text" id="derby_name" name="derbyName" placeholder='Derby Name' style="margin-bottom: 10px;" required>
        <br>
        <label for="password"><u><b>Rentrez votre ancien mot de passe valider les changement ! :</b></u></label>
        <input type="password" id="password1" placeholder="Ancien mot de passe" required style="margin-top: 10px">
        <input type="password" id="password2" placeholder="Nouveau mot de passe"  style="margin-top: 10px">
        <input type="password" id="password3" placeholder="Re-tapez le mot de passe" style="margin-top: 10px">
        <button type="submit" id="submitEditCompte">Modifier</button>
        <button id="back">Retour</button>
        <br>
        <span id="erreur"></span>
        <br>
    </form>

    <script src="js/updCompte.js"></script>
</body>
</html>
