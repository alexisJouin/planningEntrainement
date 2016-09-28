<?php
include("include/header.php");
?>

<script src="js/editCompte.js"></script>
</head>
<title>Editez Votre compte</title>
<body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    <h1>Editez votre compte</h1>

    <!--Formulaire de connexion-->
    <form id="formEditionCompte" class="formConnect" method="POST" action="#">
        <h2>Edition</h2>
        <input type="text" id="nom" name="nom" placeholder='Nom' required>
        <input type="text" id="prenom" name="prenom" placeholder='Prénom' required> 
        <input type="email" id="mail" placeholder='Email' required>
        <input type="text" id="derby_name" name="derbyName" placeholder='Derby Name' style="margin-bottom: 10px;" required>
        <label for="photoPlayer">Choisir une photo pour votre profil</label>
        <input type="file" id="photoPlayer" accept="image/*;capture=camera" style="margin-top: 0px;">
        <input type="password" id="password" placeholder="Modifier le Mot de passe" required>
        <input type="password" id="password2" placeholder="Re-tapez le mot de passe" required>
        <button type="submit" id="submit">Modifier</button>
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
