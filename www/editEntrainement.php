<?php
include("include/header.php");
include("include/testConnect.php");
?>
<link rel="stylesheet" href="css/gestionPlanning.css">
<script src="js/editEntrainement.js" type="text/javascript"></script>
<title>Créer Planning</title>
</head>

<body>
    <h1>Edition des entraînements</h1>

    <div id="modalAddEntrainement" class="uk-modal">
        <div class="uk-modal-dialog"  style="min-height:0;">
            <div>
                <div class="uk-modal-content uk-form">Date de l'entraînement :</div>
                <div class="uk-margin-small-top uk-modal-content uk-form">
                    <p>
                        <input type="date" id="dateAdd" class="uk-width-1-1">
                    </p>
                </div>
                <div class="uk-modal-content uk-form">Horraire Début :</div>
                <div class="uk-margin-small-top uk-modal-content uk-form">
                    <p>
                        <input type="time" id="horraire_debutAdd" class="uk-width-1-1">
                    </p>
                </div>
                <div class="uk-modal-content uk-form">Horraire de Fin :</div>
                <div class="uk-margin-small-top uk-modal-content uk-form">
                    <p>
                        <input type="time" id="horraire_finAdd" class="uk-width-1-1">
                    </p>
                </div>
                <div class="uk-modal-content uk-form">Lieu:</div>
                <div class="uk-margin-small-top uk-modal-content uk-form">
                    <p>
                        <input type="text" id="lieuAdd" class="uk-width-1-1">
                    </p>
                </div>
                <div class="uk-modal-footer uk-text-right">
                    <button class="uk-button uk-modal-close" id="cancel">Annuler</button> 
                    <button class="uk-button uk-button-primary js-modal-ok" id="buttonAddEntrainement">Ajouter</button>
                </div>
            </div>
        </div>
    </div>

    <button id='addEntrainement'  data-uk-modal="{target:'#modalAddEntrainement'}">Ajouter un entraînement</button>
    <button id='backToMenuGestion' >Retour</button>
    <br><br><br><br>
    <p>Sélectionner une période pour afficher la liste des entraînement de cette période :</p>
    <div id="periode">
        <label for="dateDebut">Début</label>
        <input type="date" id="dateDebut"/>
        <label for="dateFin">Fin</label>
        <input type="date" id="dateFin"/>
    </div>
    <br>    
    <ul class="uk-list uk-list-striped" id="listEntrainement">

    </ul>

</body>
</html>