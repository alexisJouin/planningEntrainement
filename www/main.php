<?php
    include("include/header.php");
    
    if (!isset($_SESSION['id'])) { // Si l'utilisateur n'a pas encore d'ID de session
            $_SESSION['id'] = $_SESSION['PHPSESSID']; // Bah on en recréer un
            $_SESSION['derby_name'] = $_COOKIE['derby_name']; // Bah on en recréer un
    }
    else { // Si l'ID de session de la barre d'adresse n'est pas le bon ID
        header('Location: index.php'); // Redirection powa !
        die(); // Et argh, on tue le script
    }
    
    echo(session_status());
    
?>
       
    <title>Menu Principal</title>
    </head>
    <body>
        
        <p>Bonjour <?php echo  $_SESSION['id']; ?></p>

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
                <button id="creationMove">Créer Groupe</button>
            </footer>
        </div>
        
        <div id='planning'>
            <p>Pour le prochain entraînement du ?? Serez-vous présent ?</p>
            <button>OUI</button>
            <button>PEUT-ÊTRE</button>
            <button>NON</button>
        </div>
    </body>
</html>
