    
<?php
include("include/header.php");
?>

</head>
<title>Connexion à l'application</title>
<body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    <h1>Planning des entraînements Roller Derby</h1>

    <div id='formConnect'>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s8">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="derbyNameConnect" type="text" class="validate" required>
                        <label for="derbyNameConnect">Derby Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8">
                        <i class="material-icons prefix">vpn_key</i>
                        <input id="passwordConnect" type="password" class="validate" required>
                        <label for="passwordConnect">Mot de passe</label>
                    </div>
                </div>
                <div class="row" id="formButton">
                    <button class="btn waves-effect waves-light blue" action='#' type="submit">Se connecter
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
            <!-- Modal Structure Inscription confirmation -->
            <div id="erreurConnection" class="modal">
                <div class="modal-content">
                    <h4>Erreur de connection !</h4>
                    <p>Erreur ! Veuillez vérifier votre login et votre mot de passe</p>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">OK</a>
                </div>
            </div>
        </div>

    </div>




    <div id="connexion"></div>

    <!--
        ***********************************************************************
        *****************************// INSCRIPTION //*************************
        ***********************************************************************
    -->
    <div id="formInscription" >
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="prenom" type="text" class="validate" required>
                        <label for="prenom">Prénom</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="nom" type="text" class="validate" required>
                        <label for="nom">Nom</label>
                    </div>
                </div>
                <div class="row">
                    <div class="radioSexe">
                        <input id="homme" type="radio" name="sexe" value=0 required>
                        <label for="homme">Homme</label>
                        <input id="femme" type="radio" name="sexe" value=1 required>
                        <label for="femme">Femme</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="derby_name" type="text" class="validate">
                        <label for="derby_name">Derby Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="password" type="password" class="validate" required>
                        <label for="password">Mot de passe</label>
                    </div>
                    <div class="input-field col s6 right">
                        <input type="password" id="password2" class="validate" required>
                        <label for="password">Re-tapez le mot de passe</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="mail" type="email" class="validate">
                        <label for="mail">Email</label>
                    </div>
                </div>

                <div class="row" id="formButton">
                    <button class="btn waves-effect waves-light blue" type="submit" name="action">Créer le compte
                        <i class="material-icons right">person_add</i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Modal Structure Inscription confirmation -->
        <div id="confirmInsctiption" class="modal">
            <div class="modal-content">
                <h4>Inscription confirmée !</h4>
                <p>Vous pouvez maintenant vous connecter.</p>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">OK</a>
            </div>
        </div>

        <!-- Modal Structure Erreur -->
        <div id="erreurInsctiption" class="modal">
            <div class="modal-content">
                <h4>Erreur lors de l'inscription !</h4>
                <p>Vérifier la saisie dans le formulaire, ne pas remplir de 
                    caractères interdit ...</p>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">OK</a>
            </div>
        </div>

    </div>

    <br>
    <a href="#" data-uk-modal="{center:true}" id="forgotPWD">Mot de passe oublié ?</a>
    <br>
    <a href="#" id="displayInscription">Pas encore de compte ? Inscrivez-vous ici !</a>
    <br>
    <a href="#" id="displayConnection">Déjà inscrit ? Connectez-vous ici !</a>




    <!--<label for="photoPlayer">Choisir une photo pour votre profil</label>-->
    <!--<input type="file" id="photoPlayer" accept="image/*;capture=camera" style="margin-top: 0px;">-->



    <script src="js/inscriptionConnexion.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
        (function (d, t) {
            var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
            g.src = '//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g, s)
        }(document, 'script'));
    </script>
</body>
</html>
