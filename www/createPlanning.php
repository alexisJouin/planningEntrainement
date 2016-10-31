<?php
include("include/header.php");
include("include/testConnect.php");
?>
<link rel="stylesheet" href="css/gestionPlanning.css">
<script type="text/javascript" src="js/gestionPlanning.js"></script>
<title>Créer Planning</title>
</head>

<body>
    <h1>Gestion des planning d'entrainements</h1>
    <p>Selectionner les jours d'entrainement pour l'année entière en précisant l'heure de l'entrainement.</p>
    <p>Il y a possibilité de modifier le planning plus tard et les entrainements sur le menu précédent</p>
    <form id='formGestionPlanning' action='#' type='POST'>
        <ul id='weekList'>
            <li id='lundi'>
                <b>Lundi</b>
                <div>
                    <label for='lundiHD' hidden="true">Horraire de début : </label>
                    <input id='lundiHD' type='time' placeholder="Heure" hidden="true" select=0/>
                    <label for='lundiHF' hidden="true">Horraire de fin : </label>
                    <input id='lundiHF' type='time' placeholder="Heure" hidden="true" select=0/>
                </div>
            </li>
            <li id='mardi'>
                <b>Mardi</b>
                <div>
                    <label for='mardiHD' hidden="true">Horraire de début : </label>
                    <input id='mardiHD' type='time' placeholder="Heure" hidden="true" select=0/>
                    <label for='mardiHF' hidden="true">Horraire de fin : </label>
                    <input id='mardiHF' type='time' placeholder="Heure" hidden="true" select=0/>
                </div>
            </li>
            <li id='mercredi'>
                <b>Mercredi</b>
                <div>
                    <label for='mercrediHD' hidden="true">Horraire de début : </label>
                    <input id='mercrediHD' type='time' placeholder="Heure" hidden="true" select=0/>
                    <label for='mercrediHF' hidden="true">Horraire de fin : </label>
                    <input id='mercrediHF' type='time' placeholder="Heure" hidden="true" select=0/>
                </div>
            </li>
            <li id='jeudi'>
                <b>Jeudi</b>
                <div>
                    <label for='jeudiHD' hidden="true">Horraire de début : </label>
                    <input id='jeudiHD' type='time' placeholder="Heure" hidden="true" select=0/>
                    <label for='jeudiHF' hidden="true">Horraire de fin : </label>
                    <input id='jeudiHF' type='time' placeholder="Heure" hidden="true" select=0/>
                </div>
            </li>
            <li id='vendredi'>
                <b>Vendredi</b>
                <div>
                    <label for='vendrediHD' hidden="true">Horraire de début : </label>
                    <input id='vendrediHD' type='time' placeholder="Heure" hidden="true" select=0/>
                    <label for='vendrediHF' hidden="true">Horraire de fin : </label>
                    <input id='vendrediHF' type='time' placeholder="Heure" hidden="true" select=0/>
                </div>
            </li>
            <li id='samedi'>
                <b>Samedi</b>
                <div>
                    <label for='samediHD' hidden="true">Horraire de début : </label>
                    <input id='samediHD' type='time' placeholder="Heure" hidden="true" select=0/>
                    <label for='samediHF' hidden="true">Horraire de fin : </label>
                    <input id='samediHF' type='time' placeholder="Heure" hidden="true" select=0/>
                </div>
            </li>
            <li id='dimanche'>
                <b>Dimanche</b>
                <div>
                    <label for='dimancheHD' hidden="true">Horraire de début : </label>
                    <input id='dimancheHD' type='time' placeholder="Heure" hidden="true" select=0/>
                    <label for='dimancheHF' hidden="true">Horraire de fin : </label>
                    <input id='dimancheHF' type='time' placeholder="Heure" hidden="true" select=0/>
                </div>
            </li>
        </ul>
    
    
        <p style="margin-bottom: -10px;">Sélectionner les dates de début et de fin d'année de la saison :</p>
        <label for='dateDebut'>Date du début de l'année</label>
        <input type='date' id='dateDebut' required/>
        <label for='dateFin'>Date de la fin de l'année</label>
        <input type='date' id='dateFin' required/>
        <input type="text" id='lieu' placeholder="Adresse de l'entrainement" required></input>
        
        <button id="submitPlanning" type='submit'>Créer le planning</button>
        <div class="modal"></div>
    </form>
    

    <script>
        

    </script>



</body>
</html>