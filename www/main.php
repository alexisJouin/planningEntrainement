<?php
    include("include/header.php");
    session_start();
    if(!isset($_SESSION['id'])) { // Si l'utilisateur n'a pas encore d'ID de session
        header('Location: index.php'); // Redirection powa !
        die(); // Et argh, on tue le script
    }  
    
?>

    
    <script type="text/javascript" src="js/uikit/demos.js"></script>
    <script type="text/javascript" src="js/uikit/jqxcore.js"></script>
    <script type="text/javascript" src="js/uikit/jqxscrollview.js"></script>
    <script type="text/javascript" src="js/uikit/jqxbuttons.js"></script>
    <script type="text/javascript" src="js/uikit/jqxnotification.js"></script>
    <script type="text/javascript" src="js/uikit/jqxlistbox.js"></script>
    
    <title>Menu Principal</title>
    </head>
    <body>
        
        <p>Bonjour <?php echo  $_SESSION['derby_name']; ?></p>
        <p>id : <?php echo  $_SESSION['id']; ?></p>
        <a href="script.php?sid=<?php echo $_SESSION['sid']; ?>">lien</a>
        <button id="EditProfilMove">Votre Porfil</button>
        
        <!-- Cas où l'untilisateur n'a aucune affiliation -->
        <div id='firstUse'>

            <div><u>Liste des groupes :</u></div>
            <div id="listGroup">
                <span>Roller Derby Dunkerquois</span>
                <span>Roller Derby Calaisis</span>
                <span>ETC ....</span>
            </div>

        </div>
        
        <!-- Cas où l'untilisateur possède un groupe -->
        <div id='planning'>
            <div id="dateScrolling">
                <!--Exemple a la con-->
                <div><h1>Jeudi 22 Septembre 2016</h1><h2>Entrainement à 18h30</h2></div>
                <div><h1>Samedi 30 Septembre 2016</h1><h2>Entrainement à 15h30</h2></div>
                <div><h1>Jeudi 05 Octobre 2016</h1><h2>Entrainement à 18h30</h2></h1></div>
            </div>
            <div style='margin-top: 20px;'></div>
            <div style='margin-top: 20px;'></div>
            <br />
            <div style="display: inline-block">
                <button value="Oui" id="yes" data-message="Super !">Oui</button>
                <button value="YN" id="yes" data-message="Super !" >Peut-être</button>
                <button value="Non" id="no" data-message="Oh non !">Non</button>
            </div>
        </div>
        
        <footer>
            <p>
                Vous êtes le coach ou le responsable de la gestion des
                entrainements ? Créez votre groupe dès maintenant
            </p>
            <button id="creationMove">Créer Groupe</button>
        </footer>
    </body>
</html>
