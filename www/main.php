<?php
include("include/header.php");
include("include/testConnect.php");
?>


<script type="text/javascript" src="js/uikit/demos.js"></script>
<script type="text/javascript" src="js/uikit/jqxcore.js"></script>
<script type="text/javascript" src="js/uikit/jqxscrollview.js"></script>
<script type="text/javascript" src="js/uikit/jqxnotification.js"></script>
<link rel="stylesheet" href="css/uikit/jqx.base.css" type="text/css" />
<script type="text/javascript" src="js/uikit/jqxdata.js"></script>
<script type="text/javascript" src="js/uikit/jqxbuttons.js"></script>
<script type="text/javascript" src="js/uikit/jqxscrollbar.js"></script>
<script type="text/javascript" src="js/uikit/jqxmenu.js"></script>
<script type="text/javascript" src="js/uikit/jqxlistbox.js"></script>
<script type="text/javascript" src="js/uikit/jqxdropdownlist.js"></script>
<script type="text/javascript" src="js/uikit/jqxgrid.js"></script>
<script type="text/javascript" src="js/uikit/jqxgrid.selection.js"></script> 
<script type="text/javascript" src="js/uikit/jqxgrid.columnsresize.js"></script> 
<script type="text/javascript" src="js/uikit/jqxgrid.filter.js"></script> 
<script type="text/javascript" src="js/uikit/jqxgrid.sort.js"></script> 
<script type="text/javascript" src="js/uikit/jqxgrid.pager.js"></script> 
<script type="text/javascript" src="js/uikit/jqxgrid.grouping.js"></script> 

<script src="js/main.js"></script>

<title>Menu Principal</title>
</head>



<body>
    <div id="param" class="uk-offcanvas">
        <div class="uk-offcanvas-bar">
            <div id="menuMain">
                <p>Bienvenue <u><b><?php echo utf8_encode($_SESSION['derby_name']); ?></b></u>, vous êtes connecté</p>
                <a href="#" id="logOff">Se déconnecter</a>
                <br>
                <button id="EditProfilMove">Votre Porfil</button>
                <button id="EditGroupeMove">Votre Groupe</button>
                <br>
                <p>Vous êtes le coach ou le responsable de la gestion des entrainements ?</p>
                <a href="creationGroup.php">Créez votre groupe dès maintenant</a>
            </div>
            <div id="notification">
                <h2><u>Notification</u> :</h2>
                <ul class="uk-list uk-list-striped">
                    
                </ul>
            </div>
        </div>
    </div>
    
<!--    TODO ! => add class tm-icon-menu pour bouton <a href="#overlay-menu" class="tm-overlay-toggle tm-icon uk-float-right" data-uk-modal="{target: '#overlay-menu', center: true}">
                           <div class="tm-icon-menu"></div>
                       </a>-->
    <img src="img/param.png" id="paramButton" alt="Cacher le menu" class="uk-button" data-uk-offcanvas="{target:'#param'}"></img>

    <!-- Cas où l'untilisateur n'a aucune affiliation -->
    <div id='firstUse'>

        <div><u>Liste des groupes :</u></div>
        <div id="listGroup">
            <div id="listGroupTot">
                <ul class="uk-list uk-list-striped" id="listLiGroup">
                </ul>
            </div>
        </div>

    </div>

    <!-- Cas où l'untilisateur possède un groupe -->
    <div id='planning'>
        <div id="dateScrolling">
            <!--Exemple a la con-->
            <div><h1>Jeudi 22</h1><h1>Septembre 2016</h1><h2>Entrainement à 18h30</h2></div>
            <div><h1>Samedi 30</h1><h1> Septembre 2016</h1><h2>Entrainement à 15h30</h2></div>
            <div><h1>Jeudi 05</h1><h1> Octobre 2016</h1><h2>Entrainement à 18h30</h2></h1></div>
        </div>
        <div style='margin-top: 20px;'></div>
        <div style='margin-top: 20px;'></div>
        <br />
        <div id="buttonReponse">
            <button value="Oui" id="yes" data-message="Super !">Oui</button>
            <button value="YN" id="yes" data-message="Super !" >Peut-être</button>
            <button value="Non" id="no" data-message="Oh non !">Non</button>
        </div>
    </div>

</body>
<script type="text/javascript" src="js/gestionMain.js"></script>
</html>
