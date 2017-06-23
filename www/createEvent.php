<?php
include("include/header.php");
include("include/testConnect.php");
?>
    <link rel="stylesheet" href="css/gestionPlanning.css">
    <script src="js/specialEvent.js" type='text/javascript'></script> 

    <title>Evénement Spécial</title>
    </head>

    <body>
        <h1>Création d'un événement spécial</h1>
        <label for="listEvent" style='position:inherit;'>Sélectionner le type d'événement</label>
        <select id='listEvent'>            
            <option id='#'>Sélectionner un type</option>
            <option id='match'>Match</option>
            <option id='special'>Journée spéciale</option>
            <option id='balade'>Balade</option>
        </select>
        <div id='theEvent' hidden="true">
            <label for='dateEvent'>Date de l'événement</label>
            <input id='dateEvent' type='date'/>
            <label for='heureEvent'>Heure de l'événement</label>
            <input id='heureEvent' type='time'/>
            
        </div>
    </body>

</html>