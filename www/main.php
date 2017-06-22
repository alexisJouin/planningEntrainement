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
<script type="text/javascript" src="js/jquery.li-scroller.1.0.js"></script>
<link rel="stylesheet" href="plugins/materialize/css/materialize.css" />
<script type="text/javascript" src="plugins/materialize/js/materialize.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<!--Import Google Icon Font-->
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script src="js/main.js"></script>

<title>Menu Principal</title>
</head>
<body>    
    <!-- Loader ... -->
    <div class="se-pre-con"></div>
    <!-- Ends -->

<!--    <img src="img/param.png" id="paramButton" alt="Cacher le menu" data-uk-offcanvas="{target:'#param'}"></img>
    <img src="img/update.png" id="updateButton" class="update" alt="Mise à jour"></img>-->

    <div id="newParamButton" class="fixed-action-btn horizontal right click-to-toggle">
        <a class="btn-floating btn-large waves-effect waves-light blue">
            <i class="material-icons">menu</i>
        </a>
        <ul>
            <li id="logOff"><a class="btn-floating red"  href = "index.php"><i class="material-icons">cancel</i></a></li>
            <li id="ExportMove" ><a class="btn-floating yellow darken-1" href="exportPresence.php"><i class="material-icons">assessment</i></a></li>
            <li id="PlannningMove"><a class="btn-floating green" href="gestionPlanning.php"><i class="material-icons">settings_applications</i></a></li>
            <li id="EditProfilMove"><a class="btn-floating blue" href="EditionCompte.php"><i class="material-icons">edit</i></a></li>
            <li id="EditGroupeMove"><a class="btn-floating blue" href="editionGroupe.php"><i class="material-icons">group</i></a></li>
            <li id="creationMove"><a class="btn-floating green" href="creationGroup.php"><i class="material-icons">add</i></a></li>
        </ul>
    </div>

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
</body>

<footer style="font-size: 8px;">
    <!--©-->
    <p>Développé par Alexis Jouin. Pour toute question contactez-moi par mail : alexis.jouin@live.fr</p>
    <!--<img src="img/logo_sirene_hurlante.png" alt="Sirènes Hurlantes" class="logo"/>-->
</footer>
</html>
