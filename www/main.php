<?php
    include("include/header.php");
?>
       
        <title>Menu Principal</title>
        <script src="js/main.js"></script>
    </head>
    <body>

        <!-- Cas où l'untilisateur n'a aucune affiliation -->
        <div id='firstUse'>

            <div><u>Liste des groupes :</u></div>
            <div id="listGroup">
                <span>Roller Derby Dunkerquois</span>
                <span>Roller Derby Calaisis</span>
                <span>ETC ....</span>
            </div>

            <footer>
                <p>
                    Vous êtes le coach ou le responsable de la gestion des
                    entrainements ? Créez votre groupe dès maintenant
                </p>
                <button id="creationMove" onClick="location.href='creationGroup.html';">Créer Groupe</button>
            </footer>
        </div>
        
        <div id='planning'>
            <p>Pour le prochain entraînement du ?? Serez-vous présent ?</p>
            <button>OUI</button>
            <button>PEUT-ÊTRE</button>
            <button>NON</button>
        </div>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="http://mysqljs.com/mysql.js"></script>
        <script src="js/antipub.js"></script>

    </body>
</html>
