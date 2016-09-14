<?php
include("include/header.php");
?>

<title>Inscription</title>


<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

<script src="js/inscriptionConnexion.js"></script>
</head>
<body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    <h1>Planning des entrainements Roller Derby</h1>

    <!--Formulaire d' inscription -->
    <form id="formInscription" class="formConnect" method="POST" action="#">
        <h2>Inscription</h2>
        <input id="nom" name="nom" placeholder='Nom' required>
        <input id="prenom" name="prenom" placeholder='Prénom' required>
        <input type="email" id="mail" placeholder='Email' required>
        <input id="derby_name" name="derbyName" placeholder='Derby Name' required>
        <input type="password" id="password" placeholder="Mot de passe" required>
        <input type="password" id="password2" placeholder="Re-tapez le mot de passe" required>
        <button type="submit" id="submit">Inscription</button>
        <a href="index.php">Déjà inscrit ? Connectez-vous ici !</a>
        <br>
        <span id="erreur"></span>
        <br>
    </form>





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
