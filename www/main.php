<?php
include("include/header.php");
include("include/testConnect.php");
?>


<script type="text/javascript" src="js/uikit/demos.js"></script>
<script type="text/javascript" src="js/uikit/jqxcore.js"></script>
<script type="text/javascript" src="js/uikit/jqxscrollview.js"></script>
<script type="text/javascript" src="js/uikit/jqxnotification.js"></script>
<link rel="stylesheet" href="css/uikit/jqx.base.css" type="text/css" />
<link rel="stylesheet" href="css/li-scroller.css" />
<script type="text/javascript" src="js/uikit/jqxdata.js"></script>
<script type="text/javascript" src="js/uikit/jqxbuttons.js"></script>
<script type="text/javascript" src="js/uikit/jqxscrollbar.js"></script>
<script type="text/javascript" src="js/uikit/jqxmenu.js"></script>
<script type="text/javascript" src="js/uikit/jqxlistbox.js"></script>
<script type="text/javascript" src="js/uikit/jqxdropdownlist.js"></script>
<!--<script type="text/javascript" src="js/uikit/jqxgrid.js"></script>-->
<script type="text/javascript" src="js/uikit/jqxgrid.selection.js"></script> 
<script type="text/javascript" src="js/uikit/jqxgrid.columnsresize.js"></script> 
<script type="text/javascript" src="js/uikit/jqxgrid.filter.js"></script> 
<script type="text/javascript" src="js/uikit/jqxgrid.sort.js"></script> 
<script type="text/javascript" src="js/uikit/jqxgrid.pager.js"></script> 
<script type="text/javascript" src="js/uikit/jqxgrid.grouping.js"></script> 

<script type="text/javascript" src="js/jquery.li-scroller.1.0.js"></script>

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
                <button id="EditProfilMove">Votre Profil</button>
                <button id="EditGroupeMove">Votre Groupe</button>
                <button id="PlannningMove">Gestion du planning</button>
                <button id="ExportMove">Exportation des présences</button>
                <br>
                <div id="linkToCreateGroup">
                    <p>Vous êtes le coach ou le responsable de la gestion des entraînements ?</p>
                    <a href="creationGroup.php">Créez votre groupe dès maintenant</a>
                </div>
            </div>
            <hr>
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
    <img src="img/param.png" id="paramButton" alt="Cacher le menu" data-uk-offcanvas="{target:'#param'}"></img>
    <img src="img/update.png" id="updateButton" class="update" alt="Cacher le menu"></img>

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
        <h3 style="text-align: center"><?php echo utf8_encode($_SESSION['nom_groupe']); ?></h3>
        <h4 style="text-align: center">Liste des prochains entraînements</h4>
        <br>
        <img src="img/direction_arrow_blue_left.png" id="arrowLeft"/>
        <img src="img/direction_arrow_blue_right.png" id="arrowRight"/>
        <div id="dateScrolling">
            
        </div>
    </div>
    <div id="modalEntrainement"></div>
    
    <footer style="font-size: 8px;">
        <!--©-->
        <p>Développé par Alexis Jouin. Pour toute question contactez-moi par mail : alexis.jouin@live.fr</p>
        <!--<img src="img/logo_sirene_hurlante.png" alt="Sirènes Hurlantes" class="logo"/>-->
    </footer>

</body>
</html>
