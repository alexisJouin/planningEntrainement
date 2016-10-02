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

    <h1>Mettre à jour votre compte</h1>

    <!--Formulaire de connexion-->
    <form id="formEditionCompte" class="formConnect" method="POST" action="#">
        <h2>Edition</h2>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" placeholder='Nom' required>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" placeholder='Prénom' required> 
        <label for="mail">Email :</label>
        <input type="email" id="mail" placeholder='Email' required>
        <label for="derby_name">Derby Name :</label>
        <input type="text" id="derby_name" name="derbyName" placeholder='Derby Name' style="margin-bottom: 10px;" required>
        <label for="photoPlayer">Vous pouvez modifier votre photo pour votre profil :</label>
        <input type="file" name="image" id="photoPlayer" accept="image/*;capture=camera" style="margin-top: 0px;">
        <br>
        <label for="password">Rentrez votre ancien mot de passe pour le changer :</label>
        <input type="password" id="password" placeholder="Ancien mot de passe" required style="margin-top: 10px">
        <input type="password" id="password2" placeholder="Nouveau mot de passe" required style="margin-top: 10px">
        <input type="password" id="password3" placeholder="Re-tapez le mot de passe" required style="margin-top: 10px">
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
