<?php
    include("include/header.php");
    include("include/testConnect.php");  
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
        <div id="menuMain">
            <p>Bienvenue <u><b><?php echo  utf8_encode($_SESSION['derby_name']); ?></b></u>, vous êtes connecté</p>
            <a href="#" id="logOff">Se déconnecter</a>
            <button id="EditProfilMove">Votre Porfil</button>
            <p>Vous êtes le coach ou le responsable de la gestion des entrainements ?</p>
            <a href="creationGroup.php">Créez votre groupe dès maintenant</a>
        </div>
        <img src="img/direction_arrow_blue_down.png" class="arrowToHide" id="arrowDownToHide" alt="Cacher le menu" ></img>
        <img src="img/direction_arrow_blue_up.png" class="arrowToHide" id="arrowUpToHide" alt="Cacher le menu" ></img>
              
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
        
    </body>
</html>
