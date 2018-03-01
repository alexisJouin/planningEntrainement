<?php
include("include/header.php");
include("include/testConnect.php");
?>

<link rel="stylesheet" href="css/monCompte.css">
<script src="js/editCompte.js"></script>
</head>
<title>Editez Votre compte</title>
<body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    <h1>Mon Compte  <?php echo utf8_encode($_SESSION['derby_name']); ?></h1>

    <!--Formulaire de connexion-->
    <form id="formEditionCompte" class="col s12" method="POST" action="#">
        <div class="row">
            <div class="input-field col s6">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Nom" required>
            </div>             
            <div class="input-field col s6">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" placeholder="Prénom" required> 
            </div>             
        </div>

        <div class="row">
            <div class="input-field col s12">
                <label for="mail">Email</label>
                <input type="email" id="mail" placeholder="Email" required>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <label for="derby_name">Derby Name</label>
                <input type="text" id="derby_name" name="derbyName" placeholder="Derby Name" required>
            </div>
        </div>
        <div class="buttons">
            <a class="waves-effect waves-light btn blue" id="submitEditCompte"><i class="material-icons left">check</i>Modifier</a>
            <a class="waves-effect waves-light btn modal-trigger" href="#changePassword"><i class="material-icons left">vpn_key </i>Changer mot de passe</a>
            <a class="waves-effect waves-light btn red" id="back"><i class="material-icons left">cancel</i>Retour</a>
        </div>
        <br>
        <span id="erreur"></span>
        <br>
    </form>



    <!-- Modal Structure -->
    <div id="changePassword" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Changement du mot de passe</h4>

            <form id="formChangePassword" class="col s10" method="POST" action="#">
                <div class="row">
                    <div class="input-field col s10">
                        <input type="password"  id="password1" placeholder="Ancien MDP"required>
                        <label for="password">Ancien mot de passe</label>
                    </div>
                </div>
                <div class="row col s10">
                    <div class="input-field col s5">
                        <input type="password" id="password2" placeholder="Nouveau MDP">
                        <label for="password2">Nouveau mot de passe</label>
                    </div>
                    <div class="input-field col s5">
                        <input type="password" id="password3" placeholder="Re-taper MDP">
                        <label for="password3">Re-tapez le nouveau mot de passe</label>
                    </div>
                </div>
            </form>

        </div>
        <div class="modal-footer">
            <a href="#!" id="savePWD" class="modal-action modal-close waves-effect waves-green btn-flat "><i class="material-icons left">check</i>Sauvegarder</a>
        </div>
    </div>

    <div id="changePassword">

    </div>

    <script src="js/updCompte.js"></script>
</body>
</html>
