    
<?php
    include("include/header.php");
?>
<script src="js/inscriptionConnexion.js"></script>
</head>
<title>Connexion à l'application</title>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <h1>Planning des entraînements Roller Derby</h1>

        <!--Formulaire de connexion-->
        <form id="formConnect" class="formConnect" method="POST" action="#">
            <h2>Connexion</h2>
            <div class="uk-form-icon">
                <i class="uk-icon-user"></i>
                <input id="derbyName" name="derbyName" autofocus placeholder='Derby Name' required>
            </div>
            <div class="uk-form-icon">
                <i class="uk-icon-key"></i>
                <input id="password" type="password" name="password" placeholder="Mot de passe" required>
            </div>
            <button type="submit" id="submit" style="height: 50px;">Connexion</button>
            <a href="#" data-uk-modal="{center:true}" id="forgotPWD" style="color:white;">Mot de passe oublié ?</a>
            <br>
            <a href="inscription.php" style="color:white;">Pas encore de compte ? Inscrivez-vous ici !</a>
            <br>
            <!--<a href="main.html">ACCESS TO MAIN</a>-->
            <span id="erreur"></span>
            <br>
            <br>
        </form>
        
        <div id="connexion"></div>


        

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
